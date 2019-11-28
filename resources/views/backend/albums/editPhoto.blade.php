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
                <h3 class="m-0 font-weight-bold text-primary">Edit Album Photo</h3>
             </div>
              <div class="float-right">
                  <a href="{{ route('albums.index') }}" class="float-right btn btn-sm btn-primary">Album List</a>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
      
              <div class="col-lg-8 ">         
           

              {{  Form::model($photo, [
                'method' => 'POST',
                'files' => 'true',
                'route' => ['albums.updatePhoto', $photo->id]
                ]) }}

                
                <div class="form-group">
                  {{ Form::label('Album\'s Old Photo:') }}

                                                     
                        <img class="img-fluid img-thumbnail mb-3 mt-3"
                        style="display:block;width:auto;height:auto;"
                        src="{{ asset('backend/img/albums/'.$photo->photo_path) }}">
                        <!-- <a href=" " class="small btn btn-sm btn-dark">
                          Edit</a> -->

                     
                    
                  <div class="form-group mt-4{{ $errors->has('photo' ? 'has-error' : '') }}">
                  {{ Form::label('photo', 'Choose Album\'s New Photo') }}
                  {{ Form::file('photo') }}
                    @if($errors->has('photo'))
                      <div class="row">
                        <span class="text-danger">{{ $errors->first('photo') }}</sapn>
                      </div>                       
                    @endif
                </div> 
                   
                
                  
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
