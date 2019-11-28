@extends('layouts.main')

@section('title', 'Contact')

@section('content')

    <div id="app">
      <div class="container pt-5">
         <div class="row">
          <div class="col-12 text-center">
            <h1 class="mt-1 mb-3">Our Contact Page</h1>
            <p class="text-justify">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin.</p>
          </div>
        </div>

        <div class="cdivider"></div> 
      </div>
        

       

       <div class="container mt-5 mb-5">
         <div class="row mb-3">
          <div class="col-md-6 text-center">
            <h3>Send Mail here</h3>
            <p>There are many variations of passages of Lorem Ipsum available.</p>
             
             <!-- <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Message</label>
                <textarea class="form-control"></textarea> 
              </div>
              
              <button type="submit" class="btn btn-primary">Send</button>
            </form> -->

             @include('layouts.message')

            {{ Form::open([
                  'method' => 'POST',
                  'route' => 'sendMail'

                ]) }} 


                <div class="form-group {{ $errors->has('name' ? 'is-invalid' : '') }}">
                  {{ Form::label('Name:') }}
                  {{ Form::text('name', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</sapn>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('email' ? 'has-error' : '') }}">
                  {{ Form::label('email', 'E-Mail Address', ['class' => 'col-form-label']) }}
                  {{ Form::text('email', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</sapn>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('message' ? 'is-invalid' : '') }}">
                  {{ Form::label('Description:') }}
                  {{ Form::textarea('message', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('message'))
                      <span class="text-danger">{{ $errors->first('message') }}</sapn>
                    @endif
                </div>

                
                <div class="form-group d-flex justify-content-center">              
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                  <br><span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                </div>

               
                {{ Form::submit('Send ', ['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}


           </div> 
           <div class="col-md-6 text-center">
            <h2>Visit Us</h2>
            <p>Company Name.</p>
            <p>Address: New Work City, USA</p>
            <h4>Call Us</h4>
            Phone:-01716046937<br>
            Mobile:+88019046937
            <h5 class="mt-2">Email Us</h5>
            <p>info@meteorainterior.com</p>
            <h6>Social Media</h6>
            <p>We are available here.</p>
              <img src="{{ asset('img/icon/facebook-s.png') }}" alt="facebook link">
              <img src="{{ asset('img/icon/instagram-s.png') }}" alt="instagram link">
              <img src="{{ asset('img/icon/twitter-s.png') }}" alt="twitter link">
              <img src="{{ asset('img/icon/youtube-s.png') }}" alt="youtube link">
           </div>         
         </div>
       </div>

       <div class="cdivider"></div>

       <div class="container">
         <div class="row">
          <div class="col-12 text-center">
           <h3>Find Us On Maps</h3>
          </div>
         </div>
       </div>

       <div class="cdivider"></div>  

       <div class="container-fluid">
          
         <div class="row  mb-5">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.7646219344897!2d89.12652628580106!3d23.897963854269076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe9653e99eab91%3A0xe788ddbb8536f20!2sIslamic%20University%20Club!5e0!3m2!1sen!2sbd!4v1569936278859!5m2!1sen!2sbd" width="100%" height="500px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
         </div>

         </div>
       </div>
    

       
@endsection

      