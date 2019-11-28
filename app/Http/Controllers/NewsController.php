<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Photo;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newslist = News::orderBy('id','DESC')->paginate(2);
        return view('backend.news.index', compact('newslist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
          'title' => 'required|max:255|unique:news',
          'description' => 'required',
          'status' => 'required',
          'photo' => 'mimes:jpg,jpeg,png',
        ]);

        $input = $request->all();
        $cleanSlug = preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", $request->title);
        $input['slug'] = Str::lower($cleanSlug);


        if($request->file('photo') ){
            
            $file = $request->file('photo');
            $fileName = time() .'_'.$file->getClientOriginalName();
            $successUpload = $file->move('backend/img/news_photos/', $fileName);

            if($successUpload){

            Image::make('backend/img/news_photos/'.$fileName)->resize(350,250)->save('backend/img/news_photos/'."thumb_".$fileName);
            }
            
            $photo = Photo::create(['photo_path'=>$fileName]);
            $input['photo_id'] = $photo->id;
            
        }
        
        News::create($input);

        return redirect(route('news.index'))->with('message-success','News has been created successfully.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $news = News::findOrFail($id);
       return view('backend.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $news = News::findOrFail($id);
        //$photo = Photo::findOrFail($news->photo_id);
        return view('backend.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $this->validate($request,[

          'title' => 'required|unique:news,title,'.$id,
          'slug' => 'required|unique:news,slug,'.$id,
          //'slug' => 'required|unique:news',
          'description' => 'required',
          'status' => 'required',
          'photo' => 'mimes:jpg,jpeg,png',
        ]);

 

        $input = $request->all();
        $cleanSlug = preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", $request->title);
        $input['slug'] = Str::lower($cleanSlug);
        
        
        $news = News::findOrFail($id);
        //$photo = Photo::findOrFail($news->photo_id);


        if($request->file('photo') ){
            
            $file = $request->file('photo');
            $fileName = time() .'_'.$file->getClientOriginalName();
            $successUpload = $file->move('backend/img/news_photos/', $fileName);

            if($successUpload){

                Image::make('backend/img/news_photos/'.$fileName)->resize(350,250)->save('backend/img/news_photos/'."thumb_".$fileName);
            }

            
            if( $news->photo_id == null ){
             
             $photo_create = Photo::create(['photo_path'=>$fileName]);
             $input['photo_id'] = $photo_create->id;            
            }
            
            if( $news->photo_id !== null){
            
             unlink('backend/img/news_photos/'. $news->photo->photo_path);
             unlink('backend/img/news_photos/'."thumb_".$news->photo->photo_path);
             $photo = Photo::findOrFail($news->photo_id);
             $photo->photo_path = $fileName;
             $photo->save();
             $input['photo_id'] = $photo->id; 
              
            }
          
        }

          
        $news->update($input);

        return redirect(route('news.index'))->with('message-success','News  has been Updated successfully.');           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if($news->photo_id !== null){
            unlink('backend/img/news_photos/'.$news->photo->photo_path);
            unlink('backend/img/news_photos/'."thumb_".$news->photo->photo_path);
            $photo = Photo::findOrFail($news->photo_id);
            $photo->delete();

        }
        $news->delete();

        return redirect(route('news.index'))->with('message-danger','News  has been Deleted successfully.'); 

    }
}

