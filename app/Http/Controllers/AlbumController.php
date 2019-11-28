<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AlbumController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
       $albums = Album::orderBy('id','DESC')->paginate(2);
       return view('backend.albums.index', compact('albums'));
        
    }

    
    public function create()
    {
        $projects = Project::orderBy('id','desc')->pluck('name','id')->all();
        return view('backend.albums.create', compact('projects'));
    }

    
    public function store(Request $request)
    {


        $this->validate($request, [
            'name' => 'required|unique:albums',
            'description' => 'required',
            'project_id' => 'required',
            'photos' => 'required',
            'photos.*' => 'mimes:png,jpg,jpeg'
        ]);

        $input = $request->all();

       if($request->hasFile('photos')){
        
        $count = 1;
        $album = new Album();
        $album->name = $request->name;


        $cleanSlug = preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", $request->name);
        $album->slug= Str::lower($cleanSlug);
        
       /* $convToUnicode = preg_replace('/\s+/u', '-', trim($request->name));
        $album->slug = $convToUnicode;*/
        
        $album->description = $request->description;
        $album ->project_id = $request->project_id;
        $album->save();

        foreach( $request->photos as $photo){
           
            $file = $photo;
            $fileName = $count . '_' . time() .'_'.$file->getClientOriginalName();
                
            $successUpload = $photo->move('backend/img/albums/', $fileName);

            if($successUpload){

                Image::make('backend/img/albums/'.$fileName)->resize(350,250)->save('backend/img/albums/'."thumb_".$fileName);
            }
                         
            $photo = new Photo();
            $photo->photo_path = $fileName;
            $photo->album_id = $album->id;
            $photo->save();
                
            $count++;
        }

       }
      

        return redirect(route('albums.index'))->with('message-success','New Album has been created successfully.');

    }

    
    public function show(Album $album)
    {
        $album = Album::findOrFail($album->id);
        return view('backend.albums.show', compact('album'));

    }

    
    public function edit(Album $album)
    {
        $album = Album::findOrFail($album->id);
        $projects = Project::orderBy('id','desc')->pluck('name','id')->all();
        return view('backend.albums.edit', compact('album','projects'));
    }

    
    public function update(Request $request, Album $album)
    {
         $this->validate($request,[
          'name' => 'required|unique:albums,name,'.$album->id,
          'slug' => 'required|unique:albums,slug,'.$album->id,
          'description' => 'required',
          'project_id' => 'required'
        ]);

        $input = $request->all();

        $cleanSlug = preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", $request->name);
        $input['slug'] = Str::lower($cleanSlug);

        /*$convToUnicode = preg_replace('/\s+/u', '-', trim($request->name));
        $input['slug'] = $convToUnicode*/; 
               
        $album = Album::findOrFail($album->id);

        $album->update($input);

        return redirect(route('albums.index'))->with('message-success','Album Information has been Updated successfully.');  

    }

    
    public function destroy(Album $album)
    {
        $album = Album::findOrFail($album->id);

        $photos = Photo::where('album_id',$album->id)->get();
     
       /* foreach ($photos as $photo) {
           echo $photo->photo_path;
        }*/
        //dd($a);

        foreach ($photos as $photo) {
            unlink('backend/img/albums/'.$photo->photo_path);
            unlink('backend/img/albums/'."thumb_".$photo->photo_path);
            $photo->delete();
        }

        $album->delete();

        return redirect(route('albums.index'))->with('message-danger','Album has been added successfully.');

    }

    public function editGallery($albumId){
        //return "editGallery";
        $album = Album::findOrFail($albumId);
        return view('backend.albums.editGallery', compact('album'));
    }

    public function addPhoto($albumId){
       
        $album = Album::findOrFail($albumId);
        return view('backend.albums.addPhoto', compact('album'));
    }

    public function storePhoto(Request $request, $albumId){
        //return "Store Photo";

        $this->validate($request, [
            'photos' => 'required',
            'photos.*' => 'mimes:png,jpg,jpeg'
        ]);

        $album = Album::findOrFail($albumId);   
        $input = $request->all();

       if($request->hasFile('photos')){
        
        $count = 1;
        /*$album = new Album();
        $album->name = $request->name;
        $album->description = $request->description;
        $album ->project_id = $request->project_id;
        $album->save();*/

        foreach( $request->photos as $photo){
           
            $file = $photo;
            $fileName = $count . '_' . time() .'_'.$file->getClientOriginalName();
                
            $successUpload = $photo->move('backend/img/albums/', $fileName);

            if($successUpload){

            Image::make('backend/img/albums/'.$fileName)->resize(350,250)->save('backend/img/albums/'."thumb_".$fileName);
            }
                         
            $photo = new Photo();
            $photo->photo_path = $fileName;
            $photo->album_id = $album->id;
            $photo->save();
                
            $count++;
        }

       }
      

        return redirect(route('albums.index'))->with('message-success','New Photos  has been added successfully.');

    }

    public function editPhoto($photoId){

        $photo = Photo::findOrFail($photoId);
        return view('backend.albums.editPhoto', compact('photo'));
    }

    
    public function updatePhoto(Request $request, $photoId){

        $this->validate($request, [
            'photo' => 'required|mimes:png,jpg,jpeg'
        ]);
        
        $photo = Photo::findOrFail($photoId);
        

        if($request->file('photo') ){
            
            $file = $request->file('photo');
            $fileName = time() .'_'.$file->getClientOriginalName();
            $successUpload = $file->move('backend/img/albums/', $fileName);

            if($successUpload){

            Image::make('backend/img/albums/'.$fileName)->resize(350,250)->save('backend/img/albums/'."thumb_".$fileName);
            }

            unlink('backend/img/albums/'. $photo->photo_path);
            unlink('backend/img/albums/'."thumb_".$photo->photo_path);
            $photo->photo_path = $fileName;
            $photo->save();    
          
        }


          return redirect(route('albums.index'))->with('message-success','Album\'s Photo has been Updated successfully.');  
    }

    
    public function destroyPhoto($photoId){
        
        $photo = Photo::findOrFail($photoId);
        unlink('backend/img/albums/'.$photo->photo_path);
        unlink('backend/img/albums/'."thumb_".$photo->photo_path);
        $photo->delete();

        return redirect(route('albums.index'))->with('message-danger','Album\'s photo has been Updated successfully.');  

    }
}
