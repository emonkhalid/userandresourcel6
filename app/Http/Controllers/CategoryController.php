<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Photo;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{   

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $categories = Category::orderBy('id','DESC')->paginate(3);
        return view('backend.categories.index', compact('categories'));  	
    }

    
    public function create(){
    	return view('backend.categories.create');
    }

    
    public function store(Request $request){

        $this->validate($request,[
          'name' => 'required|unique:categories',
          'description' => 'required',
          'photo' => 'required|mimes:jpg,jpeg,png'
        ]);


        $input = $request->all();
        $cleanSlug = preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", $request->name);
        $input['slug'] = Str::lower($cleanSlug);

        $file = $request->file('photo');
        $fileName = time() .'_'.$file->getClientOriginalName();
        $successUpload = $file->move('backend/img/category_photos/', $fileName);

        if($successUpload){

            Image::make('backend/img/category_photos/'.$fileName)->resize(350,250)->save('backend/img/category_photos/'."thumb_".$fileName);
        }
            
        $photo = Photo::create(['photo_path'=>$fileName]);
        $input['photo_id'] = $photo->id;
             

        Category::create($input);

        return redirect(route('category.index'))->with('message-success','Category has been created successfully.'); 
    }

    
    public function show($id){

        $category = Category::findOrFail($id);
        return view('backend.categories.show', compact('category'));
    }

    public function edit($id){
        $category = Category::findOrFail($id);
    	return view('backend.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            //'name' => 'required|unique:categories',
          'name' => 'required|unique:categories,name,'.$id,
          'slug' => 'required|unique:categories,slug,'.$id,
          'description' => 'required',
          'photo' => 'mimes:jpg,jpeg,png'
        ]);

               

        $input = $request->all();
        $cleanSlug = preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", $request->name);
        $input['slug'] = Str::lower($cleanSlug);

        $category = Category::findOrFail($id);
        $photo = Photo::findOrFail($category->photo_id);
       

        if($request->file('photo') ){
            
            $file = $request->file('photo');
            $fileName = time() .'_'.$file->getClientOriginalName();
            $successUpload = $file->move('backend/img/category_photos/', $fileName);

            if($successUpload){

                Image::make('backend/img/category_photos/'.$fileName)->resize(350,250)->save('backend/img/category_photos/'."thumb_".$fileName);
            }
            
            unlink('backend/img/category_photos/'.$category->photo->photo_path);
            unlink('backend/img/category_photos/'."thumb_".$category->photo->photo_path);
            $photo->photo_path = $fileName;
            $photo->save();
            $input['photo_id'] = $photo->id; 
                        
        }
           
        
        $category->update($input);

        return redirect(route('category.index'))->with('message-success','Category has been Updated successfully.');           
    }

    public function destroy($id){
    	
        $category = Category::findOrFail($id);
        $photo = Photo::findOrFail($category->photo_id);
        
        if($category->name == 'others'){
            
            return redirect(route('category.index'))->with('message-danger','Others Category  will not be Deleted !'); 
        }
        else{
            unlink('backend/img/category_photos/'. $category->photo->photo_path);
            unlink('backend/img/category_photos/'."thumb_".$category->photo->photo_path);
            $photo->delete();         
            $category->delete();

            return redirect(route('category.index'))->with('message-danger','Category  has been Deleted successfully.');
        }
        
    }
}

