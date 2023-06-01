<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Search Podcasts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('home') }}" method="GET">
                <div class="modal-body">
                    <div>
                        <label for="season">Select a Season</label>
                        <select class="form-control" name="season">
                            @foreach (App\Models\Season::setEagerLoads([])->get() as $season)
                                <option value="{{ $season->id }}">Season {{ $season->season }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br />
                    <div class="input-group mb-3 col-xs-4 w-auto">
                        <input type="number" class="form-control w-50" min="0" name="perPage" placeholder="display more/less records">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-secondary" href="{{ route('home') }}"><i class="fa fa-undo"></i></a>
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>