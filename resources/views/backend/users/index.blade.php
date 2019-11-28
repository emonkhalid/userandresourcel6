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
                    <h6 class="m-0 font-weight-bold text-primary">All Users List</h6>
                  </div>
              
                <div class="float-right">
                    <a href="{{ route('user.create') }}" class="float-right btn btn-sm btn-primary">Create User</a>
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
                      <th>Email</th>
                      <th>Role</th>
                      <th>Last Update</th>
                      <th>Status</th>
                      <th>Photo</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    

                    @if( !$users->count() > 0)
                    <div class="alert alert-info">
                      <p>There is no record here!</p>
                    </div>
                      
                    

                    @else
                      <?php $i=1; ?>
                      @foreach ($users as $user)
                      <tr>
                        <th>{{ $i++ }}</th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                        <th>{{ ($user->role_id == 1)? 'Admin' : 'Manager' }}</th>
                        <th>
                          @if(isset($user->updated_at))
                            {{ $user->updated_at->format('d/m/Y') }}
                          @else
                            No Data
                          @endif
                        </th>
                        <th>{{ ($user->is_active == 1)? 'Active' : 'Deactive' }}</th>
                        <th>
                          @if($user->photo->photo_path !== null)
                          <img style='height:50px;width: 50px' src="{{ asset('backend/img/profile/'.$user->photo->photo_path) }}">
                          @endif

                        </th>
                        <th class="d-flex">

                          

                        {!! Form::open([
                          'method' => 'DELETE',
                          'route' => ['user.destroy', $user->id]

                        ]) !!}
          

                        

                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit','style'=>'d-inline-block', 'class' => 'btn btn-danger btn-circle btn-sm mr-1'] )  }}


                        {!! Form::close() !!}


                       

                           <!-- <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-danger btn-circle btn-sm mr-1">
                            <i class="fas fa-trash"></i>
                          </a> --> 

                          <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-circle btn-sm mr-1">
                            <i class="fas fa-edit"></i>
                          </a>
                          
                          <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-circle btn-sm mr-1">
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
                    {{ $users->links() }}
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
