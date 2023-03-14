@if ($loop->first)
    @include('debates.debate_table_headers')
@endif

<tr class="text-center" style="background-color: white;">
    <td class="pt-3" nowrap>
        <a 
            href="{{ $debate->podcast_link ? $debate->podcast_link : '#' }}"
            class="btn btn-sm btn-secondary" 
            target="_blank"
        >
            {{ $debate->getPodcastString() }}
        </a>
    </td>

    <td class="pt-3">{{ $debate->topic_name }}</td>

    @if ($debate->isDebate())
        @include('debates.rows.debate_row')    
    @endif

    @if ($debate->isDiscussion())
        @include('debates.rows.discussion_row')
    @endif
    
    @if ($debate->guest_name !== null && $debate->was_there_a_guest == true)
        <td @if($debate->guest === null) style="background-color: #99CCFF" @elseif($debate->guest) style="background-color: #67C76E" @else style="background-color: #EF5F5F" @endif>
            <span>{{ $debate->guest_name }}</span>
            <br />
            <i 
                @if($debate->guest === null) class="fa fa-minus" 
                @elseif($debate->guest) class="fa fa-check"
                @else class="fa fa-times" 
                @endif
            >
            </i>
        </td>
    @else
        <td class="pt-3">
            <i class="fa fa-minus"></i>
        </td>
    @endif
    
    @if ($debate->isDebate())
        <td class="pt-3">{{ $debate->winning_side }}</td>
    @else 
        <td class="pt-3"><i class="fa fa-minus"></i></td>
    @endif

    <td class="pt-3">{{ $debate->getFormattedPodcastUploadDate() }}</td>
    
    @if (Auth::check())
        <td>
            @if ($debate->isDebate())
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#debate-modal-{{$debate->podcast_number}}">
                    Edit
                </button>
            @endif
            @if ($debate->isDiscussion())
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#discussion-modal-{{$debate->podcast_number}}">
                    Edit
                </button>
            @endif
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
@include('modals.edit_discussion')

@if ($loop->last)
    @include('debates.debate_winner_tally')
@endif
