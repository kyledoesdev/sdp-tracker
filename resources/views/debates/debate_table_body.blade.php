@if ($loop->first)
    @include('debates.debate_table_headers')
@endif
<tr class="text-center" style="background-color: white">
    <td>{{ $debate->getPodCastString() }}</td>
    <td>{{ $debate->debate_name }}</td>
    <td @if($debate->apandah) style="background-color: greenyellow" @else style="background-color: red" @endif>
        <i @if($debate->apandah) class="fa fa-check" @else class="fa fa-times" @endif></i>
    </td>
    <td @if($debate->aztro) style="background-color: greenyellow" @else style="background-color: red" @endif>
        <i @if($debate->aztro) class="fa fa-check" @else class="fa fa-times" @endif></i>
    </td>
    <td @if($debate->schlatt) style="background-color: greenyellow" @else style="background-color: red" @endif>
        <i @if($debate->schlatt) class="fa fa-check" @else class="fa fa-times" @endif></i>
    </td>
    <td @if($debate->mika) style="background-color: greenyellow" @else style="background-color: red" @endif>
        <i @if($debate->mika) class="fa fa-check" @else class="fa fa-times" @endif></i>
    </td>
    <td>{{ $debate->getFormattedPodcastUploadDate() }}</td>
    @if (Auth::check())
        <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#debate-modal-{{$debate->podcast_number}}">
                Edit
            </button>
        </td>
        <td>
            <form method="POST" action="{{ route('debate.delete', $debate->id) }}">
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
            </form>
        </td>
    @endif
</tr>
@include('modals.edit_debate')
@if ($loop->last)
    @include('debates.debate_winner_tally')
@endif
