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
                <h3 class="m-0 font-weight-bold text-primary">Edit Album</h3>
             </div>
              <div class="float-right">
                  <a href="{{ route('albums.create') }}" class="float-right btn btn-sm btn-primary">Create Album</a>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
      
              <div class="col-lg-8 ">
      

              {{  Form::model($album, [
                'method' => 'PUT',
                'files' => 'true',
                'route' => ['albums.update', $album->id],
                'id' => 'albumUpdate'
                ]) }}

                

                <div class="form-group {{ $errors->has('name' ? 'has-error' : '') }}">
                  {{ Form::label('Album Name:') }}
                  {{ Form::text('name', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</sapn>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('slug' ? 'has-error' : '') }}">
                  {{ Form::label('Album Slug:') }}
                  {{ Form::text('slug', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('slug'))
                      <span class="text-danger">{{ $errors->first('slug') }}</sapn>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('description' ? 'has-error' : '') }}">
                  {{ Form::label('Album Description:') }}
                  {{ Form::textarea('description', null, ['class' => 'form-control form-control-user']) }}
                    @if($errors->has('description'))
                      <span class="text-danger">{{ $errors->first('description') }}</sapn>
                    @endif
                </div>



                 <div class="form-group {{ $errors->has('project_id' ? 'has-error' : '') }}">
                  {{ Form::label('project_id', 'Project Name:') }}
                   {{ Form::select('project_id', ['' => 'Choose Option'] + $projects, null, ['class' => 'form-control']) }}
                    @if($errors->has('project_id'))
                      <div class="row">
                        <span class="text-danger">{{ $errors->first('project_id') }}</sapn>
                      </div>
                        
                    @endif
                </div> 


                <div class="form-group">
                  {{ Form::label('Project Photo Album:') }}
                  <a href="{{ route('albums.editGallery', $album->id) }}" class="btn btn-sm btn-info">Edit Album Gallery</a>
                  <div class="row">
                 
                    @foreach( $album->photos as $photo)
                     <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">                                   
                        <img class="img-fluid img-thumbnail mb-3 mt-3"
                        style="display:block;width:auto;height:auto;"
                        src="{{ asset('backend/img/albums/'.$photo->photo_path) }}">
       
                    
                      </div>
                    

                    @endforeach
                  </div>
                  

                </div>

              
                  

                {{ Form::submit('Update Album Information', ['class' => 'btn btn-primary','name'=>'albumEdit',]) }}

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
