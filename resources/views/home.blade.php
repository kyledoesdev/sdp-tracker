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
                <h1 class="d-flex display-3 justify-content-center text-center text-white mt-2" style="text-shadow: 2px 2px black;">Sleep Deprived Podcast</h1>
                <div class="row">
                    <div class="col d-flex justify-content-end mt-2 mb-2">
                        <form method="GET" action="{{ route('home') }}">
                            <select class="mx-2" name="debate-count" id="debate-count-select">
                                <option>5</option>
                                <option selected>10</option>
                                <option>20</option>
                                <option>50</option>
                                <option>All</option>
                            </select>
                            <input  class="mx-2" style="background: transparent; border:0;" type="text" name="search-box" title="Search by Podcast Number, Debate Name" placeholder="Search... " />
                            <button type="submit" class="btn btn-sm btn-primary text-white" id="search-button"><i class="fa fa-search"></i></button>
                            <a href="{{ route('debate.export') }}" class="btn btn-sm btn-success" id="excel-download-button"><i class="fa fa-download"></i></a>
                            <a href="{{ route('home') }}" class="btn btn-sm btn-secondary" id="reset-button"><i class="fa fa-undo"></i></a>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table center table-striped mt-2">
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
                <br />
                @include('includes.footer')
            </div>
        </div>
    </div>
@endsection
