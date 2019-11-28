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
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="float-left">
                    <h6 class="m-0 font-weight-bold text-primary">Album List</h6>
                  </div>
              
                <div class="float-right">
                    <a href="{{ route('albums.create') }}" class="float-right btn btn-sm btn-primary">Create Album</a>
                  </div>
                  @include('layouts.message')
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Description</th>
                      <th>Project</th>
                      <th>Last Update</th>
                      <th>Photo</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    

                    @if( !$albums->count() > 0)
                    <div class="alert alert-info">
                      <p>There is no record here!</p>
                    </div>
                      
                    

                    @else
                      <?php $i=1; ?>
                      @foreach ($albums as $album)
                      <tr>
                        <th>{{ $i++ }}</th>
                        <th>{{ $album->name }}</th>
                        <th>{{ $album->slug }}</th>
                        <th>{{ Str::limit($album->description,25) }}</th>
                        <th>{{ $album->project->name}}</th>
                        <th>
                          @if(isset($album->updated_at))
                          {{ $album->updated_at->format('d/m/Y') }}
                          @else
                            No Data
                          @endif
                        </th>

                        @if(empty($album->photos->first()->photo_path))
                        <th>
                          <p class="text-info">No Photo Available.</p>
                        </th>
                        @else
                        <th>
                         <img style="height:50px;width:30p;" 
                          src="{{ asset('backend/img/albums/'.$album->photos->first()->photo_path) }}">
                          
                        </th>
                        @endif




                        <th class="d-flex">                   

                        {!! Form::open([
                          'method' => 'DELETE',
                          'route' => ['albums.destroy', $album->id]

                        ]) !!}
          

                        

                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit','style'=>'d-inline-block', 'class' => 'btn btn-danger btn-circle btn-sm mr-1'] )  }}


                        {!! Form::close() !!}

                          <a href="{{ route('albums.show', $album->id) }}" class="btn btn-info btn-circle btn-sm mr-1">
                            <i class="fas fa-eye"></i>
                          </a>

                          <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-warning btn-circle btn-sm mr-1">
                            <i class="fas fa-edit"></i>
                          </a>
                          
                          

                          <a href="{{ route('albums.editGallery', $album->id) }}" class="btn btn-success btn-circle btn-sm mr-1">
                            <i class="fas fa-images"></i>
                          </a>

                        </th>
                       </tr>
                      <tr>
                    @endforeach
                    @endif

                  </tbody>
                </table>
                  <div class="paginator">
                    {{ $albums->links() }}
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
