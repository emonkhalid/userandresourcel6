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
                <h3 class="m-0 font-weight-bold text-primary">Add Photos To Album</h3>
             </div>
              <div class="float-right">
                  <a href="{{ route('albums.editGallery',$album->id) }}" class="float-right btn btn-sm btn-primary">Album Gallery</a>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
      
              <div class="col-lg-8 ">         
           

              {{  Form::model($album, [
                'method' => 'POST',
                'files' => 'true',
                'route' => ['albums.storePhoto', $album->id]
                ]) }}

                 
                    
                  <div class="form-group mt-4{{ $errors->has('photo' ? 'has-error' : '') }}">
                  {{ Form::label('photos', 'Choose New Photos For Album') }}
                   {{ Form::file('photos[]',['multiple' => 'true']) }}
                    @if($errors->has('photos'))
                      <div class="row">
                        <span class="text-danger">{{ $errors->first('photos') }}</sapn>
                      </div>                       
                    @endif
                </div>            
                  
               
                 

                {{ Form::submit('Update New Photo', ['class' => 'btn btn-primary']) }}

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
