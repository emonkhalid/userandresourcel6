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
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Projects</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $projects->count() > 0 ? $projects->count() : '0' }}
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-th-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Categories</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ ($categorytCount > 0) ? $categorytCount : '0' }}
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-code-branch fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Albums</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            {{ ($albumCount > 0) ? $albumCount : '0' }}
                          </div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-images fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total News</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ ($newsCount > 0) ? $newsCount : '0' }}
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-sticky-note fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
             
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Last Five Projects</h6>
                </div>
                <div class="card-body">
                  <ul class="list-group">

                    @if($projects->count() > 0)

                      @foreach($projects as $project)
                        <li class="list-group-item"> {{ $project->name }} </li>
                      @endforeach
                    
                    @else
                      <p>No Project Available.</p>
                    @endif

                  <ul>                
                  
                </div>
                <div class="card-footer">
                  <a href="{{ route('project.index') }}"class="btn btn-sm btn-primary">Projects</a>
                </div>
                
              </div>
            </div>

            <div class="col-lg-6 mb-4">
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Last Five Albums</h6>
                </div>
                <div class="card-body">
                  <ul class="list-group">

                    @if($albums->count() > 0)

                      @foreach($albums as $album)
                        <li class="list-group-item"> {{ $album->name }} </li>
                      @endforeach
                    
                    @else
                      <p>No Album Available.</p>
                    @endif

                  <ul>
                  
                </div>
                <div class="card-footer">
                  <a href="{{ route('albums.index') }}"class="btn btn-sm btn-primary">Albums</a>
                </div>
                
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
        @include('layouts.backend_footer')
      <!-- End of Footer -->

@endsection
