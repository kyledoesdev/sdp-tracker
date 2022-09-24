<div class="modal fade" id="create-debate-modal" tabindex="-1" role="dialog" aria-labelledby="create-debate-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Debate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('debate.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Podcast Number</label>
                        <input class="form-control" type="number" min="1" name="podcast_number" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Debate Name</label>
                        <input class="form-control" type="text" name="debate_name" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Did Apandah Win?</label>
                        <select class="form-control" name="apandah">
                            <option></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Did Aztrosist Win?</label>
                        <select class="form-control" name="aztro">
                            <option></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Did Jschlatt Win?</label>
                        <select class="form-control" name="schlatt">
                            <option></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Did Mikasacus Win?</label>
                        <select class="form-control" name="mika">
                            <option></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Podcast Release Date</label>
                        <input class="form-control" type="date" name="podcast_release_date" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
