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
                    <h6 class="m-0 font-weight-bold text-primary">All Category List</h6>
                  </div>
              
                <div class="float-right">
                    <a href="{{ route('category.create') }}" class="float-right btn btn-sm btn-primary">Create Category</a>
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
                      <th>Last Update</th>
                      <th>Cover Photo</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    

                    @if( !$categories->count() > 0)
                    <div class="alert alert-info">
                      <p>There is no record here!</p>
                    </div>
                      
                    

                    @else
                      <?php $i=1; ?>
                      @foreach ($categories as $category)
                      <tr>
                        <th>{{ $i++ }}</th>
                        <th>{{ $category->name }}</th>
                        <th>{{ $category->slug }}</th>
                        <th>{{ Str::limit($category->description, 25) }}</th>
                        <th>
                          @if(isset($category->updated_at))
                          {{ $category->updated_at->format('d/m/Y') }}
                          @else
                            No Data
                          @endif
                        </th>
                        <th>
                          @if( isset($category->photo->photo_path))
                          <img class="img-responsive" style="width:100px;height:70px;" src="{{ asset('backend/img/category_photos/'.'thumb_'.$category->photo->photo_path) }}">
                          @else
                          No Photo
                          @endif
                        </th>
                                              

                        <th class="d-flex">
  
                        {!! Form::open([
                          'method' => 'DELETE',
                          'route' => ['category.destroy', $category->id]

                        ]) !!}
                              

                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit','style'=>'d-inline-block', 'class' => 'btn btn-danger btn-circle btn-sm mr-1'] )  }}


                        {!! Form::close() !!}

                       

                          <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-circle btn-sm mr-1">
                            <i class="fas fa-edit"></i>
                          </a>
                          
                          <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-circle btn-sm mr-1">
                            <i class="fas fa-eye"></i>
                          </a>

                        </th>
                       </tr>
                      <tr>
                    @endforeach
                    @endif

                  </tbody>
                </table>
                  <div class="paginator">
                    {{ $categories->links() }}
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
