@extends('layouts.main')

@section('title', 'Services')

@section('content')

    <div id="app">
      <div class="container">
         <div class="row">
          <div class="col-12 text-center mt-5">
            <h1>Our Company</h1>
            
            <p class="text-justify">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
          </div>
        </div>
      </div>
        
      <div class="cdivider mb-4"></div>

      @if(isset($categories) && $categories->count() >0)

        @foreach($categories as $category)

         <div class="container">
           <div class="row mt-5 mb-4">
             <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12 col-xs-12  text-justify">
              <h2>{{ $category->name }}</h2>
              <p>{{ $category->description }}</p>                        
             </div>
             <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-xs-12  text-center">
              <img class="img-fluid mt-5 mb-3" src="{{asset('backend/img/category_photos/thumb_'.$category->photo->photo_path)}}" alt="{{$category->name}}" title="{{$category->name}}">
             </div>          
           </div>
           <div class="cdivider mb-4"></div>
         </div>

         @endforeach

      @endif

       <!-- <div class="cdivider mt-4 mb-4"></div> 

       <div class="container">
         <div class="row mt-5 mb-4">
           <div class="col-md-8 text-justify">
            <h2>Why Company</h2>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage. here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage.</p><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage.</p>
           </div>
           <div class="col-md-4 text-center">
            <img class="img-fluid" src="{{asset('img/pimage.jpg')}}">
           </div>          
         </div>
       </div> -->

           
       
    </div>   

       
@endsection

      