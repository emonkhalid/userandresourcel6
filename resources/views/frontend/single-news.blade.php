@extends('layouts.main')

@section('title', 'Single News')

@section('content')

    <div id="app">
      <div class="container">
         <div class="row">
          <div class="col-12 text-center mt-5 mb-5">
            @if($singleNews !== null)
              <h1 class="mb-3">{{ $singleNews->title }}</h1>

                @if($singleNews->photo_id !== null)
                <img class="img-fluid" alt="{{$singleNews->title}}" title="{{$singleNews->title}}"
                src="{{ asset('/backend/img/news_photos/'.$singleNews->photo->photo_path) }}">
                @endif

              <p class="text-justify mt-5 mb-5">{{ $singleNews->description }}</p>
            @else
              <div class="alert alert-info mt-5 mb-5 pb-5 pt-5">
                <h3>There is no record here!</h3>
              </div>
            @endif
          </div>
        </div>

        <div class="cdivider mb-5"></div> 

      </div>
        

    </div>  

       
@endsection

      