<div class="modal fade" id="debate-modal-{{$debate->podcast_number}}" tabindex="-1" role="dialog" aria-labelledby="debate-label-{{$debate->podcast_number}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Podcast {{ $debate->podcast_number}} Debate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('debate.update', $debate->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label class="text-start">Podcast Number</label><i style="color: red">*</i>
                        <input class="form-control" type="number" min="1" name="podcast_number" value="{{ $debate->podcast_number }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Topic Name</label><i style="color: red">*</i>
                        <input class="form-control" type="text" name="topic_name" value="{{ $debate->topic_name }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Was it a discussion?</label><i style="color: red">*</i>
                        <select class="form-control" name="was_discussion">
                            <option value="1" @if ($debate->isDiscussion()) selected @endif>Yes</option>
                            <option value="0" @if (!$debate->isDiscussion()) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Did Apandah Win?</label>
                        <select class="form-control" name="apandah">
                            <option value="clear">- Select -</option>
                            <option value="1" @if ($debate->apandah) selected @endif>Yes</option>
                            <option value="0" @if (!$debate->apandah) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Did Aztrosist Win?</label>
                        <select class="form-control" name="aztro">
                            <option value="clear">- Select -</option>
                            <option value="1" @if ($debate->aztro) selected @endif>Yes</option>
                            <option value="0" @if (!$debate->aztro) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Did Jschlatt Win?</label>
                        <select class="form-control" name="schlatt">
                            <option value="clear">- Select -</option>
                            <option value="1" @if ($debate->schlatt) selected @endif>Yes</option>
                            <option value="0" @if (!$debate->schlatt) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Did Mikasacus Win?</label>
                        <select class="form-control" name="mika"> 
                            <option value="clear">- Select -</option>
                            <option value="1" @if ($debate->mika) selected @endif>Yes</option>
                            <option value="0" @if (!$debate->mika) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Was there A Guest?</label><i style="color: red">*</i>
                        <select class="form-control" name="was_there_a_guest">
                            <option value="1" @if ($debate->was_there_a_guest) selected @endif>Yes</option>
                            <option value="0" @if (!$debate->was_there_a_guest) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Did A Guest Win?</label>
                        <select class="form-control" name="guest">
                            <option value="clear">- Select -</option>
                            <option value="1" @if ($debate->guest) selected @endif>Yes</option>
                            <option value="0" @if (!$debate->guest) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>What was the Guest's name?</label>
                        <input class="form-control" type="text" name="guest_name" value="{{ $debate->guest_name }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Winning Side</label>
                        <input class="form-control" type="text" name="winning_side" value="{{ $debate->winning_side }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Podcast Link</label>
                        <input class="form-control" type="text" name="podcast_link" value="{{ $debate->podcast_link }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Podcast Release Date</label>
                        <input class="form-control" type="date" name="podcast_upload_date" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
