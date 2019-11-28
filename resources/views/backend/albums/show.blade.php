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
                <h3 class="m-0 font-weight-bold text-primary">View Photo Album</h3>
             </div>
              <div class="float-right">
                  <a href="{{ route('user.create') }}" class="float-right btn btn-sm btn-primary">Create Album</a>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
      
              <div class="col-lg-12 ">

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

            {{  Form::model($album, [
                'method' => 'GET',
                'route' => ['albums.index']
                ]) 
            }}
                

                <div class="form-group">
                  {{ Form::label('Album Name:') }}
                  {{ Form::text('name', null, ['class' => 'form-control form-control-user']) }}
                    
                </div>

                <div class="form-group">
                {{ Form::label('Album Description:') }}
                  {{ Form::text('description', null, ['class' => 'form-control form-control-user']) }}
                    
                </div>

                <div class="form-group">
                {{ Form::label('Project Name:') }}
                  {{ Form::text('projectName', $album->project->name, ['class' => 'form-control form-control-user']) }}
                    
                </div>
                  

              <!--   style="display:block;width:250px;height:250px;" -->

                <div class="form-group">
                  {{ Form::label('Project Photo Album:') }}

                  <div class="row">
                 
                    @foreach( $album->photos as $photo)
                     <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">                                   
                        <img class="img-fluid img-thumbnail mb-5"
                        style="display:block;width:auto;height:auto;"
                        src="{{ asset('backend/img/albums/'.$photo->photo_path) }}">
                    
                      </div>
                    

                    @endforeach
                  </div>                 

                </div>

                

                <!-- {{ Form::submit('OK', ['class' => 'btn btn-primary']) }} -->
                <a class="btn btn-primary" href="{{ route('albums.index') }}">OK</a>

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
