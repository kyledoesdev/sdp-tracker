<div class="modal fade" id="debate-modal-{{$debate->podcast_number}}" tabindex="-1" role="dialog" aria-labelledby="debate-label-{{$debate->podcast_number}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Podcast {{ $debate->podcast_number}} Debate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('debate.update', $debate->id) }}">
                @csrf
                @include('modals.create_edit_modal_body')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
