@extends('layouts.main')

@section('title', 'Projects')

@section('content')


 <div class="mt-4"></div>

  <div id="app">

      <div class="container">
         <div class="row">
          <div class="col-12 text-center mt-5">
            <h1 class="bold">Our Projects</h1>
            <p class="text-justify">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
          </div>
        </div>

      </div>
        

       <div class="cdivider"></div> 

       <div class="container">
         <div class="row">
          <div class="col-12 text-center mb-3 mt-4">
            <h2>Project Overview</h2>
            <div class="cdivider"></div> 
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-4 text-center p-3">
            <a href="">
              <img class="img-fluid mb-3" src="img/pimage.jpg">
              <h4 class="text-bold">Project Name 1 are many variations of passages of Lorem</h4>
            </a>
          </div>
          <div class="col-4 text-center p-3">
            <img class="img-fluid mb-3" src="img/pimage.jpg">
            <h4>Project Name 1</h4>
          </div>
          <div class="col-4 text-center p-3">
            <img class="img-fluid mb-3" src="img/pimage.jpg">
            <h4>Project Name 1</h4>
          </div>
        </div>

        <div class="row">
          <div class="col-4 text-center p-3">
            <img class="img-fluid mb-3" src="img/pimage.jpg">
            <h4>Project Name 1</h4>
          </div>
          <div class="col-4 text-center p-3">
            <img class="img-fluid mb-3" src="img/pimage.jpg">
            <p>Project Name 1 are many variations of passages of Lorem</p>
          </div>
          <div class="col-4 text-center p-3">
            <img class="img-fluid mb-3" src="img/pimage.jpg">
            <h4>Project Name 1</h4>
          </div>
        </div> -->

        <!-- <div class="row">
          @for( $i = 0; $i <10; $i++)

            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-6 text-center p-3">
              <a href="">
                <img class="img-fluid mb-3" src="img/pimage.jpg">
                <h4>Project Name 1</h4>
              </a>
            </div>
          
          @endfor
        </div> -->
      
        <!-- <div class="row">
          @if($projects->count() > 0)
            @foreach( $projects as $project)

              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 text-center p-3">
                <a href="{{ route('projects.single', $project->slug) }}">
                  <img class="img-fluid mb-3" src="img/pimage.jpg">
                  <h4>{{ $project->name }}</h4>
                </a>
              </div>
            
            @endforeach
          @endif
        </div> -->


        

        
        <div class="row" >
          @if($categories->count() > 0)
            @foreach($categories as $category)

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 text-center p-3 project-category-txt">
              <a href="{{{ route('projects.category',$category->slug) }}}">
                <img class="img-fluid mb-3" alt="{{ $category->name }}" title="{{ $category->name }}"
                src="{{ asset('backend/img/category_photos/thumb_'.$category->photo->photo_path) }}">
                <h4>{{ $category->name }}</h4>
              </a>
            </div>
           
            @endforeach

        @endif

      </div>




       </div>

    </div> 


       
@endsection

      