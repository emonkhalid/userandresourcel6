<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Emon Khalid">
    <meta name="generator" content="Jekyll v3.8.5">
    
    <title>App Name - @yield('title')</title>


    <link rel="shortcut icon" type="image/png" href="{{ asset('img/icon//favicon.png') }}"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800&display=swap" rel="stylesheet">

    @yield('style')

  </head>
  <body>
    <header class="fixed-top">
      <div class="container-fluid">
        <div class="row">
          <div class="sline"></div>
        </div>
      </div>
   
      <nav class="navbar navbar-expand-lg navbar-light bg-white">

        <div class="container">
          <a class="navbar-brand" href="{{ route('index') }}"><img class="img-fluid" src="{{ asset('img/clogo.png') }}"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
   

     
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Request::path() === '/' ? 'active' : ''}}">
              <a class="nav-link" href="{{ route('index') }} ">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Request::path() === 'aboutus' ? 'active' : ''}}">
              <a class="nav-link" href="{{ route('aboutus') }}">ABOUT US</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link {{ Request::path() === 'services' ? 'active' : ''}}" href="{{ route('services') }}">SERVICES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::path() === 'projects' ? 'active' : ''}}" href="{{ route('projects') }}">PROJECTS</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="{{ route('projects') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              
              @if($categories->count() >0)
                @foreach($categories as $category)

                <a class="dropdown-item" href="{{ route('projects.category', $category->slug) }}">{{ $category->name }}</a>
                
                @endforeach
              @endif
              </div>
            </li>

            <li class="nav-item {{ Request::path() === 'news' ? 'active' : ''}}">
              <a class="nav-link" href="{{ route('news') }}" tabindex="-1" aria-disabled="true">NEWS</a>
            </li>
            <li class="nav-item {{ Request::path() === 'contact' ? 'active' : ''}}">
              <a class="nav-link" href="{{ route('contact') }}" tabindex="-1" aria-disabled="true">CONTACT</a>
            </li>
          </ul>
   
          </div>
        </div>
 
        
        </nav>
    </header>

    @yield('content')

      
       <div class="wline  mt-5  mb-4"></div>
       <footer>
        <div class="container mt-3 mb-1 text-center">
          <div class="row">
            <div class="col-md-3 mt-3 mb-3 implinks">
              <h5>Importent Linkes</h5>
              <ul>
                <li>This is some link some</li>
                <li>This is some link some</li>
                <li>This is some link some</li>
              </ul>
            </div>

            <div class="col-md-3 mt-3 mb-3">
              <h5>VISIT US</h5>
              <p>Our Company Name <br>
              Company Address: <br>
              New Work CIty, USA</p>
            </div>

            <div class="col-md-3 mt-3 mb-3">
              <h5>CONTACT HERE</h5>
              <p>+68541212121 <br>
              +68541212122 <br>
              +68541212123</p>
            </div>
  
            <div class="col-md-3 mt-3 mb-3">
              <h5>Social Media</h5>
              <img src="{{ asset('img/icon/facebook-s.png') }}" alt="Facebook page">
              <img src="{{ asset('img/icon/instagram-s.png') }}" alt="Instagram page">
              <img src="{{ asset('img/icon/twitter-s.png') }}" alt="twitter page">
              <img src="{{ asset('img/icon/youtube-s.png') }}" alt="youtube channel">
              
            </div>
           
         </div>
        </div>
           <div class="copyright">
            © Company Name -2019. All Rights Reserved.
            <a class="float-right mr-3" href="#app2" id="upbtnsmooth">
              <img src="{{asset('/img/icon/up.png')}}" alt="Up">
            </a>
           </div>
          
            
           
        </footer> 


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>   
     
      

      $(document).ready(function(){
          $("upbtnsmooth").click(function(){
            window.scroll({ top: 0, left: 0, behavior: 'smooth' });
          });
      });

    </script>

   @yield('script') 
  </body>
</html>