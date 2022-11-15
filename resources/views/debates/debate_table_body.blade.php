@inject('GuestDebates', 'App\Models\Debate')
@if ($loop->first)
    @include('debates.debate_table_headers')
@endif
<tr class="text-center" style="background-color: white;">
    <td nowrap>
        <a href="{{ $debate->podcast_link ? $debate->podcast_link : '#'}}"
            class="btn btn-sm btn-secondary" target="_blank"
        >
            {{ $debate->getPodCastString() }}
        </a>
    </td>
    <td>{{ $debate->debate_name }}</td>
    <td @if($debate->apandah) style="background-color: #67C76E" @else style="background-color: #EF5F5F" @endif>
        <i @if($debate->apandah) class="fa fa-check" @else class="fa fa-times" @endif></i>
    </td>
    <td @if($debate->aztro) style="background-color: #67C76E" @else style="background-color: #EF5F5F" @endif>
        <i @if($debate->aztro) class="fa fa-check" @else class="fa fa-times" @endif></i>
    </td>
    <td @if($debate->schlatt) style="background-color: #67C76E" @else style="background-color: #EF5F5F" @endif>
        <i @if($debate->schlatt) class="fa fa-check" @else class="fa fa-times" @endif></i>
    </td>
    <td @if($debate->mika) style="background-color: #67C76E" @else style="background-color: #EF5F5F" @endif>
        <i @if($debate->mika) class="fa fa-check" @else class="fa fa-times" @endif></i>
    </td>
    @if ($GuestDebates::where('was_there_a_guest', true)->count() > 0)
        @if ($debate->guest_name != null)
            <td @if($debate->guest) style="background-color: #67C76E" @else style="background-color: #EF5F5F" @endif>
                <span>{{ $debate->guest_name }}</span>
                <br />
                <i @if($debate->guest) class="fa fa-check" @else class="fa fa-times" @endif></i>
            </td>
        @else
            <td style="background-color: #99CCFF">
                <i class="fa fa-minus"></i>
            </td>
        @endif
    @endif
    <td>{{ $debate->winning_side }}</td>
    <td>{{ $debate->getFormattedPodcastUploadDate() }}</td>
    @if (Auth::check())
        <td>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#debate-modal-{{$debate->podcast_number}}">
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
