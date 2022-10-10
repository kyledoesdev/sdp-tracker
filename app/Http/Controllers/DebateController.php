<?php

namespace App\Http\Controllers;

use App\Models\Debate;
use App\Exports\SDPTableExport;
use Illuminate\Http\Request;
use Excel;

class DebateController extends Controller {

    public function update(Request $request, $id) {
        $Debate = Debate::findOrFail($id);
        $Debate->update([
            'podcast_number' => $request->input('podcast_number') ?? $Debate->podcast_number,
            'debate_name' => $request->input('debate_name') ?? $Debate->debate_name,
            'apandah' => $request->input('apandah') != null ? $request->input('apandah') == 'Yes' ? true : false : $Debate->apandah,
            'aztro' => $request->input('aztro') != null ? $request->input('aztro') == 'Yes' ? true : false : $Debate->aztro,
            'schlatt' => $request->input('schlatt') != null ? $request->input('schlatt') == 'Yes' ? true : false : $Debate->schlatt,
            'mika' => $request->input('mika') != null ? $request->input('mika') == 'Yes' ? true : false : $Debate->mika,
            'podcast_release_date' =>  $request->input('podcast_release_date') ?? $Debate->podcast_release_date,
        ]);

        return redirect()->route('home')->with('success', 'Updated Success!');
    }

    public function delete($id) {
        Debate::findOrFail($id)->delete();
        return redirect()->route('home')->with('success', 'Deleted Successfully!');
    }

    public function store(Request $request) {
        Debate::create([
            'podcast_number' => $request->input('podcast_number'),
            'debate_name' => $request->input('debate_name'),
            'apandah' => $request->input('apandah') == 'Yes' ? true : false,
            'aztro' => $request->input('aztro') == 'Yes' ? true : false,
            'schlatt' => $request->input('schlatt') == 'Yes' ? true : false,
            'mika' => $request->input('mika') == 'Yes' ? true : false,
            'podcast_upload_date' =>  $request->input('podcast_upload_date'),
        ]);

        return redirect()->route('home')->with('success', 'Created Successfully!');
    }

    public function export () {
        return Excel::download(new SDPTableExport, 'sdp.xlsx');
    }
}
