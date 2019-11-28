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
                <h3 class="m-0 font-weight-bold text-primary">Edit Project</h3>
             </div>
              <div class="float-right">
                  <a href="{{ route('project.create') }}" class="float-right btn btn-sm btn-primary">Create Project</a>
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

            

              {{  Form::model($project, [
                'method' => 'PUT',
                'files' => 'true',
                'route' => ['project.update', $project->id]
                ]) }}

                <div class="form-group">
                  {{ Form::label('Project Cover Photo:') }}
                  
                  <img class="img-fluid img-thumbnail" style="display:block;width:550px;height:350px;" src="{{ asset('backend/img/project_photos/'.$project->photo->photo_path) }}">                 

                </div>

                <div class="form-group {{ $errors->has('name' ? 'has-error' : '') }}">
                  {{ Form::label('name', 'Project Name:') }}
                  {{ Form::text('name', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</sapn>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('slug' ? 'has-error' : '') }}">
                  {{ Form::label('slug', 'Project Slug:') }}
                  {{ Form::text('slug', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('slug'))
                      <span class="text-danger">{{ $errors->first('slug') }}</sapn>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('description' ? 'has-error' : '') }}">
                  {{ Form::label('description','Description:') }}
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
                  

                {{ Form::submit('Update Project', ['class' => 'btn btn-primary']) }}

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
