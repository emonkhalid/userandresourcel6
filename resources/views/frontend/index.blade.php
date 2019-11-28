@extends('layouts.main')

@section('title', 'Home')

@section('content')

  <div class="mt-4"></div>

  <div id="app">

    <section class="slider">
      <div class="slider">
        <div class="container-fluid">
            <div class="row">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img src="{{ asset('img/slider-1.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('img/slider-2.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('img/slider-1.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <br>
      </div>
    </section>

    
      <div class="container">
         <div class="row">
          <div class="col-12 text-center mt-5">
            <h1 class="bold">Our Company</h1>
            <p class="text-info font-weight-bold">Our Company's Tagline.</p>
            <p class="text-justify">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
          </div>
        </div>

        <div class="cdivider"></div> 
      </div>
        

       

       <div class="container">
         <div class="row">
           <div class="col-sm-4 text-center">
            <img class="mt-3 mb-3" src="{{asset('img/icon/square-icon.png') }}">
            <h2 >Why Company</h2>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage.</p>
           </div>
           <div class="col-sm-4 text-center">
             <img class="mt-3 mb-3" src="{{asset('img/icon/square-icon.png') }}">
            <h2>Why Company</h2>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage.</p>
           </div>
           <div class="col-sm-4 text-center">
             <img class="mt-3 mb-3" src="{{asset('img/icon/square-icon.png') }}">
            <h2>Why Company</h2>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage.</p>
           </div>           
            
      
         </div>
       </div>

       <div class="cdivider"></div> 

       <div class="container">
         <div class="row">
          <div class="col-12 text-center mb-3 mt-4">
            <h3>Project Overview</h3>
            <div class="cdivider"></div> 
          </div>
        </div>

        <!-- <div class="row">
          @for($i = 1; $i<7; $i++)

          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <img class="img-fluid mb-3" src="img/pimage.jpg" style="width:350px;height:250px;">
            <h4>Project Name 1</h4>
          </div>
         
          @endfor

        </div> -->

       <!--  <div class="row">
          <div class="col-4 text-center p-3">
            <img class="img-fluid mb-3" src="img/pimage.jpg">
            <h4>Project Name 1</h4>
          </div>
          <div class="col-4 text-center p-3">
            <img class="img-fluid mb-3" src="img/pimage.jpg">
            <h4>Project Name 1</h4>
          </div>
          <div class="col-4 text-center p-3">
            <img class="img-fluid mb-3" src="img/pimage.jpg">
            <h4>Project Name 1</h4>
          </div>
        </div> -->

        @if($categories->count() > 0)

          <div class="row" >
            @foreach($categories as $category)

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 text-center p-3 project-category-txt">
              <a href="{{ route('projects.category',$category->slug) }}">
                <img class="img-fluid mb-3" alt="{{ $category->name }}" title="{{ $category->name }}"
                src="{{ asset('backend/img/category_photos/thumb_'.$category->photo->photo_path) }}">
                <h4>{{ $category->name }}</h4>
              </a>
            </div>
           
            @endforeach

          </div>

        @endif

       </div>

    </div>    

       
@endsection

      