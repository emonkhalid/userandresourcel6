@extends('layouts.main')

@section('title', 'News')

@section('content')

    <div id="app">
      <div class="container">
         <div class="row">
          <div class="col-12 text-center mt-5">
            <h1>News</h1>
            <p class="text-justify">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. injected humour, or non-characteristic words etc.</p>
          </div>
        </div>

        <div class="cdivider"></div> 

      </div>
        
      <div class="container">
        <div class="row">

          @if( !$newslist->count() > 0)
          <div class="col-12 text-center">
            <div class="alert alert-info">
              <p>There is no record here!</p>
            </div>
          </div>
          @else

            @foreach($newslist as $news)

            <div class="col-4">
              <div class="card">
                @if($news->photo_id !== null)
                <img src="{{asset('backend/img/news_photos/thumb_'.$news->photo->photo_path)}}" class="card-img-top" alt="{{$news->title}}" title="{{$news->title}}">
                @endif
                <div class="card-body">
                  <h3 class="card-title">{{$news->title}}</h3>
                  <p class="card-text">{{ Str::limit($news->description, 100) }}</p>
                  <a href="{{ route('news.single', $news->slug) }}" class="btn btn-primary">Details</a>
                </div>
              </div>
            </div>

            @endforeach

          @endif

        </div>
      </div>

      <div class="container">
        <div class="paginator mt-2">
            {{ $newslist->links() }}
          </div>
      </div>


       
       <div class="cdivider"></div> 

    </div>  

       
@endsection

      