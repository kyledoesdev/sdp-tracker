@if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session()->get('success')}}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
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
