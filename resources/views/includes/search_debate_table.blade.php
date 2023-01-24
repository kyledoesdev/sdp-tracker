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
            <input  class="mx-2" style="background: transparent; border:0;" type="text" id="search-box" name="search-box" title="Search by Podcast Number, Debate Name" placeholder="Search... " />
            <button type="submit" class="btn btn-sm btn-primary text-white" id="search-button"><i class="fa fa-search" title="Psst... Search 'Therapy Time' for a surprise!"></i></button>
            <a href="{{ route('debate.export') }}" class="btn btn-sm btn-success" id="excel-download-button"><i class="fa fa-download"></i></a>
            <a href="{{ route('home') }}" class="btn btn-sm btn-secondary" id="reset-button"><i class="fa fa-undo"></i></a>
        </form>
    </div>
</div>