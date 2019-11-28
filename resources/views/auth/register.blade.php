@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
          <div class="col-12 card o-hidden border-0 shadow-lg my-5">
            <div class="p-5">
              <div class="text-center">
                <img src="{{ asset('backend/logo.png') }}" class="img-fluid mb-4">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
                    @csrf

                <div class="form-group row">
                    <div class="col-12">
                        <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Full Name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                

                <div class="form-group">
                  <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>


                <div class="form-group row">

                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                  </div>

                  <div class="col-sm-6">
                    <input id="password-confirm" type="password" class="form-control form-control-user" placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
                  </div>

                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Register') }}
                </button>


                
                
                <!-- <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->

              </form>
              <hr>
              <div class="text-center">
                <a class="small btn btn-sm btn-outline-danger" href="{{  route('password.request') }}">Forgot Password?</a>
                <a class="small btn btn-sm btn-outline-success" href="{{ route('login') }}">Already have an account? Login!</a>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
