@extends('layouts.app')

@section('content')


    <!-- Sidebar -->
    @include('layouts.backend_sidebar')
    <!-- End of Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Navbar -->
        @include('layouts.backend_navbar')
        <!-- End of Navbar -->

        <!-- Begin Page Content -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          

          <!-- DataTales Example -->
          <div class="card shadow mb-4 ">
            <div class="card-header py-3">
              <div class="float-left">
                <h3 class="m-0 font-weight-bold text-primary">View User</h3>
             </div>
              <div class="float-right">
                  <a href="{{ route('user.create') }}" class="float-right btn btn-sm btn-primary">Create User</a>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
      
		          <div class="col-lg-8 ">

		        <!-- <form>
						  <div class="form-group">
						    <label for="exampleInputEmail1">User Name</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Project Name">
						    
						  </div>

              <div class="form-group">
                <label for="exampleInputEmail1">User Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Project Name"><small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">User Role</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Project Name">
              </div>
						  
						  
						  <div class="form-group">
						    <label for="exampleFormControlFile1">User Profile Photo</label>
						    <input type="file" class="form-control-file" id="exampleFormControlFile1">
						  </div>
						  <button type="submit" class="btn btn-primary btn-lg">Submit</button>
						</form> -->

            <!-- {{  Form::model($user, [
                'method' => 'GET',
                'route' => ['user.index']
                ]) 
            }} -->



                <div class="form-group {{ $errors->has('name' ? 'has-error' : '') }}">
                  {{ Form::label('Profile Photo:') }}
                  
                  <img class="img-fluid img-thumbnail" style="display:block;width:250px;height:250px;" src="{{ asset('backend/img/profile/'.$photo->photo_path) }}">                 

                </div>

                <div class="form-group {{ $errors->has('name' ? 'has-error' : '') }}">
                  {{ Form::label('Full Name:') }}
                  {{ Form::text('name', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</sapn>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('email' ? 'has-error' : '') }}">
                  {{ Form::label('Email:') }}
                  {{ Form::text('email', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</sapn>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password' ? 'has-error' : '') }}">
                  {{ Form::label('Password:') }}
                  {{ Form::password('password', ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('password'))
                      <span class="text-danger">{{ $errors->first('password') }}</sapn>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password_confirmation' ? 'has-error' : '') }}">
                  {{ Form::label('Confirm Password') }}
                  {{ Form::password('password_confirmation', ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirm') }}</sapn>
                    @endif
                </div>

                <div class="form-group">
                  {{ Form::label('is_active', 'Status:') }}
                  {{ Form::radio('is_active', '1' , true) }} Active
                  {{ Form::radio('is_active', '0' , false) }} Deactivate
                </div> 

                <!-- {{ Form::submit('OK', ['class' => 'btn btn-primary']) }} -->
                <a class="btn btn-primary" href="{{ route('user.index') }}">OK</a>

            <!-- {!! Form::close() !!} -->
		              
		              
		          </div>
        		</div>
            </div>
          </div>

        </div>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
        @include('layouts.backend_footer')
      <!-- End of Footer -->

@endsection
