@if(session()->has('success'))
  <div class="row d-flex justify-content-center">
    <div class="col-md-4 alert alert-success alert-dismissible fade show" role="alert">
        {{session()->get('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  </div>
@endif

@if (session()->has('errors'))
  <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
      @if(!$loop->first)
        <br>
      @endif
      {{ $error }}
    @endforeach
  </div>
@endif
