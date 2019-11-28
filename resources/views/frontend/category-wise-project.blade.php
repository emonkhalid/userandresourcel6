@extends('layouts.main')

@section('title', 'Projects')

@section('content')


    <div id="app">
      <div class="container">
         <div class="row mt-5">
          @if($projectCategory !== null)

          <div class="col-12 text-center mt-5">
            <h1>{{ $projectCategory->name }}</h1>
            <p class="text-justify">{{ $projectCategory->description }}</p>
          </div>
        </div>
      </div>   

       <div class="cdivider"></div> 

       <div class="container">

        <div class="row">
          
            @foreach($projectCategory->projects as $project)
            <div class="col-4 text-center p-3 project-category-txt">
              <a href="{{ route('projects.single', $project->slug) }}">
                <img class="img-fluid" alt="{{$project->name }}" title="{{$project->name }}"  src="{{ asset('backend/img/project_photos/thumb_'.$project->photo->photo_path) }}">
              
              <h4 class="mt-2 mb-2">{{ $project->name }}</h4>
              </a>
            </div>
            @endforeach
        
        </div>  

          @else       
          
            <div class="col-12 alert alert-info mt-5 mb-5 pb-5 pt-5">
                <h3>There is no record here!</h3>           
            </div>

          </div>
          
          @endif

       </div>

    </div>    


       
@endsection

      