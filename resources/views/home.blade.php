@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h1 class="d-flex display-1 text-center text-white mt-2" style="text-shadow: 4px 4px black;">sleep deprived podcast</h1>
                <small class="text-muted mt-0">im not a graphic designer sorry.</small>
                <div class="mt-4">
                    <div class="row">
                        <div class="col">
                            <h1 class="display-3 text-white mt-2" style="text-shadow: 4px 4px black;">Season {{ $seasonNum }}</h1>
                        </div>
                        <div class="col d-flex justify-content-end" style="margin-top: 50px;">
                            <button type="button" class="btn btn-primary mt-1 border border-1 border-dark" data-bs-toggle="modal" data-bs-target="#myModal">
                                <i class="fa fa-search"></i>
                            </button>
                            <a class="btn btn-secondary mt-1 border border-1 border-dark" href="{{ route('home') }}"><i class="fa fa-undo"></i></a>
                            @include('includes.search')
                        </div>
                    </div>
                    <table class="table table-responsive center table-striped border border-secondary border-2 mt-2">
                        <tbody class="m-0">
                            @foreach ($debates as $debate)
                                @include('debates.debate_table_body')
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $debates->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')
    
@endsection