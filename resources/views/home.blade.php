@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                {{-- <img style="max-width: 100%;" src="cover-art.png">
                <br />
                <span class="text-white" style="text-shadow: 2px 2px black;">
                    Art by: Twitter User: <a class="text-white" style="text-decoration: none;" target="_blank" href="https://twitter.com/Ivanna_Fox">@Ivanna_Fox</a>
                </span>
                <br /> --}}
                <h1 class="d-flex display-1 text-center text-white mt-2" style="text-shadow: 4px 4px black;">sleep deprived podcast</h1>
                <h5 class="d-flex text-center text-white mt-2">celebrating?</h4>
                <h1 class="d-flex display-1 text-center mt-2 border-light mb-0" style="text-shadow: 6px 6px black; color: gold;">episode 100!</h1>
                <small class="text-muted mt-0">im not a graphic designer sorry.</small>
                    
                @include('includes.search_debate_table')
                <div class="table-responsive">
                    <table class="table center table-striped border border-secondary border-2 mt-2">
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