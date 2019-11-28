<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Photo;
use App\Category;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $projects = Project::orderBy('id','desc')->paginate(2);
    	return view('backend.projects.index', compact('projects'));
    }

    public function create(){
        $categories = Category::pluck('name','id')->all();
    	return view('backend.projects.create', compact('categories'));
    }

    public function store(Request $request){

        $this->validate($request,[
          'name' => 'required|max:255|unique:projects',
          'description' => 'required',
          'category_id' => 'required',
          'photo' => 'required|mimes:jpg,jpeg,png'
        ]);

        

        $input = $request->all();
        $cleanSlug = preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", $request->name);
        $input['slug'] = Str::lower($cleanSlug);


        $file = $request->file('photo');
        $fileName = time() .'_'.$file->getClientOriginalName();
        $successUpload = $file->move('backend/img/project_photos/', $fileName);

        if($successUpload){

            Image::make('backend/img/project_photos/'.$fileName)->resize(350,250)->save('backend/img/project_photos/'."thumb_".$fileName);


        }
            
        $photo = Photo::create(['photo_path'=>$fileName]);
        $input['photo_id'] = $photo->id;
            
        
        Project::create($input);

        return redirect(route('project.index'))->with('message-success','New Project has been created successfully.');

    }

    public function show($id){

        $project = Project::findOrFail($id);
    	return view('backend.projects.show', compact('project'));
    }

    
    public function edit($id){

        $project = Project::findOrFail($id);
        $categories = Category::pluck('name','id')->all();
    	return view('backend.projects.edit', compact('project','categories'));
    }

    
    public function update(Request $request, $id){
        
        $this->validate($request,[

          'name' => 'required|max:255|unique:projects,name,'.$id,
          'slug' => 'required|unique:projects,slug,'.$id,
          'description' => 'required',
          'category_id' => 'required',
          'photo' => 'mimes:jpg,jpeg,png'
        ]);



        $input = $request->all();
        $cleanSlug = preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", $request->name);
        $input['slug'] = Str::lower($cleanSlug);
        
        $project = Project::findOrFail($id);
        $photo = Photo::findOrFail($project->photo_id);
        

        if($request->file('photo') ){
            
            $file = $request->file('photo');
            $fileName = time() .'_'.$file->getClientOriginalName();
            $successUpload = $file->move('backend/img/project_photos/', $fileName);

            if($successUpload){

                Image::make('backend/img/project_photos/'.$fileName)->resize(350,250)->save('backend/img/project_photos/'."thumb_".$fileName);
            }
            
             unlink('backend/img/project_photos/'. $project->photo->photo_path);
             unlink('backend/img/project_photos/'. "thumb_".$project->photo->photo_path);
             $photo->photo_path = $fileName;
             $photo->save();
             $input['photo_id'] = $photo->id; 
                        
        }
          
          $project->update($input);

          return redirect(route('project.index'))->with('message-success','Project has been Updated successfully.');  
    }

    
    public function destroy($id){
    	
        $project = Project::findOrFail($id);
        $photo = Photo::findOrFail($project->photo_id);

        unlink('backend/img/project_photos/'. $project->photo->photo_path);
        unlink('backend/img/project_photos/'. "thumb_".$project->photo->photo_path);
        $photo->delete();         
        $project->delete();

        return redirect(route('project.index'))->with('message-danger','Project has been Deleted successfully.');   

    }
}
