@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <img style="max-width: 100%;" src="cover-art.png">
                <br />
                <span class="text-white" style="text-shadow: 2px 2px black;">
                    Art by: Twitter User: <a class="text-white" style="text-decoration: none;" target="_blank" href="https://twitter.com/Ivanna_Fox">@Ivanna_Fox</a>
                </span>
                <br />
                <h1 class="d-flex justify-content-center text-white" style="text-shadow: 2px 2px black;">Sleep Deprived Podcast</h1>
                <div class="table-responsive">
                    <table class="table center table-striped mt-2">
                        <tbody class="m-0">
                            @foreach ($debates as $debate)
                                @include('debates.debate_table_body')
                            @endforeach
                        </tbody>
                    </table>
                    {{ $debates->withQueryString()->links() }}
                </div>
                <br />
                @include('includes.footer')
            </div>
        </div>
    </div>
@endsection
