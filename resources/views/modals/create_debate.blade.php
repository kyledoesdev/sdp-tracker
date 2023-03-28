<div class="modal fade" id="create-debate-modal" tabindex="-1" role="dialog" aria-labelledby="create-debate-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Debate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('debate.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label class="text-start">Podcast Number</label><i style="color: red">*</i>
                        <input class="form-control" type="number" name="podcast_number" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Topic Name</label><i style="color: red">*</i>
                        <input class="form-control" type="text" name="topic_name" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Did Apandah Win?</label>
                        <select class="form-control" name="apandah">
                            <option value="">- Select -</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Did Aztrosist Win?</label>
                        <select class="form-control" name="aztro">
                            <option value="">- Select -</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Did Jschlatt Win?</label>
                        <select class="form-control" name="schlatt">
                            <option value="">- Select -</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Did Mikasacus Win?</label>
                        <select class="form-control" name="mika">
                            <option value="">- Select -</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Was there A Guest?</label><i style="color: red">*</i>
                        <select class="form-control" name="was_there_a_guest">
                            <option value="clear">- Select -</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Did A Guest Win?</label>
                        <select class="form-control" name="guest">
                            <option value="">- Select -</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>What was the Guest's name?</label>
                        <input class="form-control" type="text" name="guest_name" />
                    </div>
                    <div class="form-group mb-2">
                        <label title="only required if a debate">Winning Side</label><i style="color: red">*</i>
                        <input class="form-control" type="text" name="winning_side" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Season</label><i style="color: red">*</i>
                        <select class="form-control" name="season">
                            <option value="">- Select -</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Podcast Link</label>
                        <input class="form-control" type="text" name="podcast_link" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Podcast Release Date</label>
                        <input class="form-control" type="date" name="podcast_upload_date" />
                    </div>
                </div>
                <input type="hidden" name="podcast_type" value="debate">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
