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
              <h3 class="m-0 font-weight-bold text-primary">
              Edit Album Gallery</h3>
           </div>
           <div class="float-right ml-2">
                <a href="{{ route('albums.index', $album->id) }}" class="float-right btn btn-sm btn-success">Album List</a>
            </div>
           
            <div class="float-right">
                <a href="{{ route('albums.addPhoto', $album->id) }}" class="float-right btn btn-sm btn-primary">Add Photo</a>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
    
            <div class="col-lg-8 ">
    
                                      
              <div class="form-group">
                <h4>Project Name: {{ $album->project->name }}</h4>
                
                <div class="row">
               
                  @foreach( $album->photos as $photo)
                   <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">    

                      <img class="img-fluid img-thumbnail mb-3 mt-3"
                      style="display:block;width:auto;height:auto;"
                      src="{{ asset('backend/img/albums/'.$photo->photo_path) }}">
            


<div class="row">
  <div class="container d-flex">
 <a href="{{ route('albums.editPhoto', $photo->id) }}" class="btn btn-warning btn-circle btn-sm mr-1"><i class="fas fa-edit"></i></a>


{!! Form::open([
  'method' => 'DELETE',
  'route' => ['albums.destroyPhoto',$photo->id],
  'id' => 'photoDelete'
]) !!}
                                

{{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-circle btn-sm mr-1'] )  }}


{!! Form::close() !!}
</div>  
</div>     
                    
                      </div>
                    

                    @endforeach
                  </div>
                  
                </div>

              
                  

                  
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
