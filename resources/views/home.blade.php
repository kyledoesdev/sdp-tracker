@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h1 class="d-flex display-1 text-center text-white mt-2" style="text-shadow: 4px 4px black;">sleep deprived podcast</h1>
                <small class="text-muted mt-0">im not a graphic designer sorry.</small>
                    
                <div class="mt-4">
                    @foreach ($seasons as $season)
                        <div class="row">
                            <div class="col">
                                <h1 class="display-3 text-white mt-2" style="text-shadow: 4px 4px black;">Season {{ $season->season }}</h1>
                            </div>
                            @if ($loop->first)
                                <div class="col d-flex justify-content-end" style="margin-top: 50px;">
                                    <form action="{{ route('home') }}">
                                        @csrf
                                        <div class="input-group mb-3 col-xs-2 w-auto">
                                            <input type="number" class="form-control w-50" min="0" name="perPage" placeholder="display more/less records">
                                            <div class="input-group-append">
                                              <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                              <a class="btn btn-secondary" href="{{ route('home') }}"><i class="fa fa-undo"></i></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <table class="table table-responsive center table-striped border border-secondary border-2 mt-2">
                            <tbody class="m-0">
                                @php $debates = $season->debates()->paginate($perPage); @endphp
                                @foreach ($debates as $debate)
                                    @include('debates.debate_table_body')
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $debates->links() }}
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')
    
@endsection