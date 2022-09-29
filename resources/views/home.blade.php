@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <img style="max-width: 100%;" src="cover-art.png">
                <br />
                <span style="background-color: white; font-weight: bold;">
                    Art by: Twitter User: <a target="_blank" href="https://twitter.com/Ivanna_Fox">@Ivanna_Fox</a>
                </span>
                <br />
                <div class="table-responsive">
                    <table class="table center mt-2">
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
