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
                <h3 class="m-0 font-weight-bold text-primary">Edit News</h3>
             </div>
              <div class="float-right">
                  <a href="{{ route('news.create') }}" class="float-right btn btn-sm btn-primary">Create News</a>
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

            

              {{  Form::model($news, [
                'method' => 'PUT',
                'files' => 'true',
                'route' => ['news.update', $news->id]
                ]) }}

                <div class="form-group">
                  {{ Form::label('News Cover Photo:') }}

                  @if($news->photo_id !== null)

                    <img class="img-fluid img-thumbnail" 
                    style="display:block;width:250px;height:250px;" 
                    src="{{ asset('backend/img/news_photos/'.$news->photo->photo_path) }}">
                    
                  @else
                    <p class="text-primary">No Photo Available.</p>
                  @endif                

                </div>

                <div class="form-group {{ $errors->has('title' ? 'has-error' : '') }}">
                  {{ Form::label('Title:') }}
                  {{ Form::text('title', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('title'))
                      <span class="text-danger">{{ $errors->first('title') }}</sapn>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('slug' ? 'has-error' : '') }}">
                  {{ Form::label('Slug:') }}
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

                <div class="form-group">
                  {{ Form::label('status', 'Status:') }}
                  {{ Form::radio('status', '1' , true) }} Published
                  {{ Form::radio('status', '0' , false) }} Unpublished
                </div> 

                <div class="form-group {{ $errors->has('password_confirmation' ? 'has-error' : '') }}">
                  {{ Form::label('photo', 'News Cover Photo:') }}
                  {{ Form::file('photo') }}
                    @if($errors->has('photo'))
                      <div class="row">
                        <span class="text-danger">{{ $errors->first('photo') }}</sapn>
                      </div>
                        
                    @endif
                </div> 
                  

                {{ Form::submit('Update News', ['class' => 'btn btn-primary']) }}

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
