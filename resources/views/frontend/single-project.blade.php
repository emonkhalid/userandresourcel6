@extends('layouts.main')

@section('title', 'Projects')

@section('content')


    <div id="app">
      <div class="container">
         <div class="row mt-5">
          <div class="col-12 text-center mt-5">
            @if($singleProject !== null)
              <h1>{{ $singleProject->name }}</h1>
              @if( $singleProject->photo_id !== null)
                <img class="img-fluid mt-3 mb-4" alt="{{ $singleProject->name }}" title="{{ $singleProject->name }}" src="{{ asset('backend/img/project_photos/'.$singleProject->photo->photo_path) }}">
              @endif
              <p class="text-justify">{{ $singleProject->description }}</p>
            @else
            <div class="alert alert-info mt-5 mb-5 pb-5 pt-5">
                <h3>There is no record here!</h3>
            </div>
            @endif
          </div>
        </div>
      </div>
        
    

       <div class="cdivider"></div> 

       <div class="container text-center">
        
        
        @if(isset($singleProject->album))

          <a href="{{ route('albums.single', $singleProject->album->slug) }}" class="btn btn-primary btn-lg">{{ $singleProject->album->name }} Gallery-{{ $singleProject->album->id }}</a>

        @endif

       </div>

    </div>    


       
@endsection

      