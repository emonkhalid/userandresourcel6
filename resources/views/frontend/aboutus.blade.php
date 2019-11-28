@extends('layouts.main')

@section('title', 'About US')

@section('content')

    <div id="app">
      <div class="container">
         <div class="row">
          <div class="col-12 text-center mt-5">
            <h1>About US</h1>
            <p class="text-justify">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
          </div>
        </div>

        <div class="cdivider"></div> 

        <div class="row">
          <div class="col-12 text-center mt-5">
            <h2>OWNER'S Information</h2>
            <div class="cdivider mt-3"></div> 
            <h3 class="mb-4">OWNER'S Name Here</h3>
            <img class="rounded-circle mb-4" src="{{asset('img/owner.jpg')}}" alt="Company Owner" >
            <p class="text-justify">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</div>
        </div>

        <div class="cdivider"></div>
         
      </div>
        

       

       <div class="container">
         <div class="row">
           <div class="col-sm-4 text-center">
            <img src="{{asset('img/icon/square-icon.png')}}" alt="squre icon">
            <h2>Why Company</h2>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage.</p>
           </div>
           <div class="col-sm-4 text-center">
            <img src="{{asset('img/icon/square-icon.png')}}" alt="squre icon">
            <h2>Why Company</h2>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage.</p>
           </div>
           <div class="col-sm-4 text-center">
            <img src="{{asset('img/icon/square-icon.png')}}" alt="squre icon">
            <h2>Why Company</h2>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage.</p>
           </div>           
            
      
         </div>
       </div>

       <div class="cdivider"></div> 

       <div class="container">
         <div class="row">
          <div class="col-12 text-center">
            <h3>Our Clients</h3>
            <div class="cdivider"></div> 
          </div>
        </div>
        <div class="row">
          <div class="col-2"><img class="img-responsive" src="{{asset('img/owner.jpg')}}"></div>
        </div>
      </div>

     
    </div>  

       
@endsection

      