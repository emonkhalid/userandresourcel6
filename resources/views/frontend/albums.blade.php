@extends('layouts.main')

@section('title', 'Projects')

@section('style')
<link href="{{ asset('css/blueimp-gallery.min.css') }}" rel="stylesheet">
@endsection

@section('content')


    <div id="app">


      <div class="container">
         <div class="row mt-5">
          <div class="col-12 text-center mt-5">
            @if($singleAlbum !== null)
              <h1 class="mb-3 mt-2">{{ $singleAlbum->name }} </h1>
              <p class="mb-3 mt-2">{{ $singleAlbum->description }} </p>
               <div class="cdivider"></div> 

              @if( $singleAlbum->photos !== null)
              <div class="row">

                <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
                  <div class="slides"></div>
                  <!--   <h3 class="title"></h3> -->
                    <a class="prev">‹</a>
                    <a class="next">›</a>
                    <a class="close">×</a>
                    <a class="play-pause"></a>
                    <ol class="indicator"></ol>
                </div>

                <div class="row" id="links">
                <?php $i=1 ?>
                @foreach( $singleAlbum->photos as $photo)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2 mb-2">
                  
                  <a href="{{ asset('backend/img/albums/'.$photo->photo_path) }}" title="{{$singleAlbum->name}}" alt="{{$singleAlbum->name}}">
                    <img src="{{ asset('backend/img/albums/thumb_'.$photo->photo_path) }}"  alt="{{$singleAlbum->name}}" title="{{$singleAlbum->name}}" />
                    
                  </a>
                  <p class="mt-1 font-weight-bold">{{ $i++.'. '. $singleAlbum->name }} </p>
                </div>

                @endforeach
                </div>
              @endif

            @else

            <div class="alert alert-info mt-5 mb-5 pb-5 pt-5">
                <h3>There is no record here!</h3>
            </div>

            @endif

          </div>
        </div>
      </div>

        

    

       <div class="cdivider"></div> 

       <div class="container text-center">
           

          <!-- <a href="" class="btn btn-primary btn-lg">B</a> -->
          <!-- Large modal -->


       </div>

    </div>    


       
@endsection

@section('script')

<!-- <script type="text/javascript">

  $('body').on('click','img',function(){
    alert('it works');
  })

</script> -->
<script src="{{ asset('js/blueimp-gallery.min.js') }}"></script>

<script>
  document.getElementById('links').onclick = function(event) {
    event = event || window.event
    var target = event.target || event.srcElement,
      link = target.src ? target.parentNode : target,
      options = { index: link, event: event },
      links = this.getElementsByTagName('a')
    blueimp.Gallery(links, options)
  }
</script>

<script>
  blueimp.Gallery(document.getElementById('links').getElementsByTagName('a'), {
    container: '#blueimp-gallery-carousel',
    carousel: true
  })
</script>

@endsection

      