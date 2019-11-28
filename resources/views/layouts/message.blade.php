@if(session('message-success'))
  <div class="alert alert-success">
    {{ session('message-success') }}
  </div>

@elseif(session('message-primary'))
    <div class="alert alert-primary">
      {{ session('message-primary') }}
    </div>

@elseif(session('message-danger'))
    <div class="alert alert-danger">
      {{ session('message-danger') }}
    </div>
@endif
