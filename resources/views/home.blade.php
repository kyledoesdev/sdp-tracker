@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <img style="max-width: 100%;" src="cover-art.png">
            <br />
            <b><span style="background-color: white;">Art by: Twitter User: <a target="_blank" href="https://twitter.com/Ivanna_Fox">@Ivanna_Fox</a></span></b>
            <br />
            <div class="table-responsive text-center">
                <table class="table center mt-0">
                    <thead>
                        <tr style="background-color: white;">
                            <th>Podcast</th>
                            <th class="text-nowrap">Debate / Discussion</th>
                            <th>Apandah</th>
                            <th>Aztrosist</th>
                            <th>Jschlatt</th>
                            <th>Mikasacus</th>
                            <th class="text-nowrap">Podcast Upload Date</th>
                            @if (Auth::check())
                                <th>Edit</th>
                                <th>Delete</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($debates as $debate)
                            <tr style="background-color: white">
                                <td>{{ $debate->getPodCastString() }}</td>
                                <td>{{ $debate->debate_name }}</td>
                                @if($debate->apandah)
                                    <td style="background-color: greenyellow">
                                        <i class="fa fa-check"></i>
                                    </td>
                                @else
                                    <td style="background-color: red">
                                        <i class="fa fa-times"></i>
                                    </td>
                                @endif
                                @if($debate->aztro)
                                    <td style="background-color: greenyellow">
                                        <i class="fa fa-check"></i>
                                    </td>
                                @else
                                    <td style="background-color: red">
                                        <i class="fa fa-times"></i>
                                    </td>
                                @endif
                                @if($debate->schlatt)
                                    <td style="background-color: greenyellow">
                                        <i class="fa fa-check"></i>
                                    </td>
                                @else
                                    <td style="background-color: red">
                                        <i class="fa fa-times"></i>
                                    </td>
                                @endif
                                @if($debate->mika)
                                    <td style="background-color: greenyellow">
                                        <i class="fa fa-check"></i>
                                    </td>
                                @else
                                    <td style="background-color: red">
                                        <i class="fa fa-times"></i>
                                    </td>
                                @endif
                                <td>{{$debate->getFormattedPodcastUploadDate()}}</td>
                                @if (Auth::check())
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#debate-modal-{{$debate->podcast_number}}">
                                            Edit
                                        </button>
                                        @include('modals.edit_debate')
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('debate.delete', $debate->id) }}">
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                            @if ($loop->last)
                                <br />
                                <br />
                                <table class="table center">
                                    <thead>
                                        <tr style="background-color: white;">
                                            <th>Apandah Wins: {{ $apandahWins }}</th>
                                            <th>Aztrosist Wins: {{ $aztroWins }}</th>
                                            <th>Jschlatt Wins: {{ $schlattWins }}</th>
                                            <th>Mikasacus Wins: {{ $mikaWins }}</th>
                                        </tr>
                                    </thead>
                                    {{ $debates->withQueryString()->links() }}
                                </table>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br />
        </div>
        <footer style="text-align: center; padding: 3px; color: white; font-size:36px;">
            Created By Discord User @spacelampsix#0001
            <br />
            <div class="d-inline-block">
                <a target="_blank" href="https://github.com/kylenotfound" style="text-decoration: none">Github</a>
                <a target="_blank" href="https://www.twitch.tv/spacelampsix" style="color: purple; text-decoration: none;">Twitch</a>
                <a target="_blank" href="https://open.spotify.com/user/225lfx5yf4vtiwndrpkzcbj2a?si=76585b681c7d4452" style="color: green; text-decoration:none;">Spotify</a>
            </div>
            <br />

        </footer>
        <span class="text-center" style="color: white; font-size: 18px;"><i>For suggestions/corrections, feel free to send me a message.</i></span>
        <br />
        <span class="text-center" style="color: white">Total Visits: {{ $WebsiteVisit->visits }} last visited at {{ $WebsiteVisit->getFormattedUpdatedAt() }}</span>
    </div>
</div>
@endsection
