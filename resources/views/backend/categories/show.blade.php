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
                <h3 class="m-0 font-weight-bold text-primary">View Category</h3>
             </div>
              <div class="float-right">
                  <a href="{{ route('category.create') }}" class="float-right btn btn-sm btn-primary">Create Category</a>
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

           {{  Form::model($category, [
                'method' => 'GET',
                'route' => ['category.index']
                ]) 
            }}



                

                <div class="form-group {{ $errors->has('title' ? 'has-error' : '') }}">
                  {{ Form::label('Category name:') }}
                  {{ Form::text('name', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</sapn>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('slug' ? 'has-error' : '') }}">
                  {{ Form::label('Category Slug:') }}
                  {{ Form::text('slug', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('slug'))
                      <span class="text-danger">{{ $errors->first('slug') }}</sapn>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('description' ? 'has-error' : '') }}">
                  {{ Form::label('Description:') }}
                  {{ Form::textarea('description', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('description'))
                      <span class="text-danger">{{ $errors->first('description') }}</sapn>
                    @endif
                </div>

                


            {!! Form::close() !!} 

                <!-- {{ Form::submit('OK', ['class' => 'btn btn-primary']) }} -->
                <a class="btn btn-primary" href="{{ route('category.index') }}">OK</a>

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
