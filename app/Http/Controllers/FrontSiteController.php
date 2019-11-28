<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\News;
use App\Category;
use App\Album;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class FrontSiteController extends Controller
{
    
    public function index(){
        $categories = Category::where('name','!=','others')->get();
    	return view('frontend.index', compact('categories'));
    }

    /*public function index(){
       
        return view('frontend.index');
    }*/

    public function aboutus(){
    	return view('frontend.aboutus');
    }

    public function services(){
        $categories = Category::where('name','!=','others')->get();
    	return view('frontend.services',compact('categories'));
    }

    public function projects(){
        $categories = Category::where('name','!=','others')->get();
        $projects = Project::all();
    	return view('frontend.projects',compact('projects','categories'));
    }

    public function singleProject($projectSlug){
        $singleProject = Project::where('slug', $projectSlug)->first();
        return view('frontend.single-project',compact('singleProject')); 
    }

    public function categoryWiseProject($projectCategorySlug){
        $projectCategory = Category::where('slug',$projectCategorySlug)->first();
        return view('frontend.category-wise-project',compact('projectCategory')); 
    }

    public function singleAlbum($albumSlug){
        $singleAlbum = Album::where('slug', $albumSlug)->first();
        return view('frontend.albums',compact('singleAlbum')); 
        //return "singleProject";
    }

    public function news(){

        $newslist = News::orderBy('id','DESC')->paginate(3);
    	return view('frontend.news', compact('newslist'));
    }

    public function singleNews($singleNewsSlug){

        $singleNews = News::where('slug', $singleNewsSlug)->first();
        return view('frontend.single-news', compact('singleNews'));
        
    }

    public function contact(){
        return view('frontend.contact');
    }

    /*public function project2(){
        return view('frontend.projects');
    }*/

    public function sendMail(Request $request){
        //return "Send Mail";
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);


        $data = $request->all();

        Mail::to('underlinelab@gmail.com')->send(new SendMail($data));

        return redirect(route('contact'))->with('message-success','Your Message has been sent successfully.'.'Thanks for contacting us!');
    }

    public function projectShow($projectSlug){
       //return view('frontend.projects');

        $project = Project::where('slug', $projectSlug)->get();
        return $project;
    }


    public function sitemap()
    {
      $projects = Project::all();
      $albums = Album::all();
      $categories = Project::all();
      $newslist = News::all();
         
      return response()->view('frontend.sitemap', [
          'newslist' => $newslist,
          'projects' => $projects,
          'albums' => $projects,
          'categories' => $categories,
     
      ])->header('Content-Type', 'text/xml');
    }
}
