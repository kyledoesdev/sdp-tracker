<?php

namespace App\Http\Controllers;

use App\Http\Requests\DebateCreateRequest;
use App\Models\Debate;
use App\Exports\SDPTableExport;
use Illuminate\Http\Request;
use Excel;

class DebateController extends Controller {

    public function store(DebateCreateRequest $request) {
        Debate::create($request->validated());
        return redirect()->route('home')->with('success', 'Created Successfully!');
    }

    public function update(Request $request, $id) {
        $Debate = Debate::findOrFail($id);
        $Debate->updatePodcast($request->all());

        return redirect()->route('home')->with('success', 'Updated Success!');
    }

    public function delete($id) {
        Debate::findOrFail($id)->delete();
        return redirect()->route('home')->with('success', 'Deleted Successfully!');
    }

    public function export () {
        return Excel::download(new SDPTableExport, 'sdp_debates_as_of_'. now()->format('Y_m_d') .'.xlsx');
    }
}
