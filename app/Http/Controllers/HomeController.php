<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Category;
use App\Album;
use App\News;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $projects       = Project::orderBy('id','DESC')->take(5)->get();
        $albums         = Album::orderBy('id','DESC')->take(5)->get();
        $categorytCount   = Category::count();
        $albumCount        = Album::count();
        $newsCount      = News::count();

        return view('backend.home', compact('projects','albums','categorytCount','albumCount','newsCount',));
    }
}
