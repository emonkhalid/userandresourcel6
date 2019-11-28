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
              <h3 class="m-0 font-weight-bold text-primary">Create Project</h3>
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
                <label for="exampleInputEmail1">User Password</label>
                <input type="password" class="form-control" id="exampleInputPassword" aria-describedby="emailHelp" placeholder="Project Name"><small id="emailHelp" class="form-text text-muted">Minimum 8 Length password</small>
                
              </div>

            
              <div class="form-group">
                <label for="exampleFormControlSelect1">User Status</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Activate</option>
                  <option>Deactivate</option>
                </select>
              </div>
              
              
              <div class="form-group">
                <label for="exampleFormControlFile1">User Profile Photo</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
              </div>
              <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </form> -->
                  
              {{ Form::open([
                  'method' => 'POST',
                  'route' => 'project.store',
                  'files' => 'true'

                ]) }} 


                <div class="form-group {{ $errors->has('name' ? 'has-error' : '') }}">
                  {{ Form::label('Project Name:') }}
                  {{ Form::text('name', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</sapn>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('description' ? 'has-error' : '') }}">
                  {{ Form::label('Description:') }}
                  {{ Form::textarea('description', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('description'))
                      <span class="text-danger">{{ $errors->first('description') }}</sapn>
                    @endif
                </div>

               
              <div class="form-group {{ $errors->has('category_id' ? 'has-error' : '') }}">
                  {{ Form::label('category_id', 'Category:') }}
                   {{ Form::select('category_id', ['' => 'Choose Option'] + $categories, null, ['class' => 'form-control']) }}
                    @if($errors->has('category_id'))
                      <div class="row">
                        <span class="text-danger">{{ $errors->first('category_id') }}</sapn>
                      </div>
                        
                    @endif
                </div> 

                <div class="form-group {{ $errors->has('photo' ? 'has-error' : '') }}">
                  {{ Form::label('photo', 'Project Cover Photo:') }}
                  {{ Form::file('photo') }}
                    @if($errors->has('photo'))
                      <div class="row">
                        <span class="text-danger">{{ $errors->first('photo') }}</sapn>
                      </div>
                        
                    @endif
                </div> 


                {{ Form::submit('Create Project', ['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}



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
