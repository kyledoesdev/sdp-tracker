@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <img style="max-width: 100%;" src="cover-art.png">
                <br />
                <span class="text-white" style="text-shadow: 2px 2px black;">
                    Art by: Twitter User: <a class="text-white" style="text-decoration: none;" target="_blank" href="https://twitter.com/Ivanna_Fox">@Ivanna_Fox</a>
                </span>
                <br />
                <h1 class="d-flex display-3 justify-content-center text-center text-white mt-2" style="text-shadow: 2px 2px black;">Sleep Deprived Podcast</h1>
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