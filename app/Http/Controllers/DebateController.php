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
        $Debate->update([
            'podcast_number' => $request->input('podcast_number') ?? $Debate->podcast_number,
            'debate_name' => $request->input('debate_name') ?? $Debate->debate_name,
            'apandah' => $request->input('apandah') != null ? $request->input('apandah') == 1 ? true : false : $Debate->apandah,
            'aztro' => $request->input('aztro') != null ? $request->input('aztro') == 1 ? true : false : $Debate->aztro,
            'schlatt' => $request->input('schlatt') != null ? $request->input('schlatt') == 1 ? true : false : $Debate->schlatt,
            'mika' => $request->input('mika') != null ? $request->input('mika') == 1 ? true : false : $Debate->mika,
            'guest' => $request->input('guest') != null ? $request->input('guest') == 1 ? true : false : $Debate->guest,
            'guest_name' => $request->input('guest_name') ?? $Debate->guest_name,
            'winning_side' => $request->input('winning_side') ?? $Debate->winning_side,
            'podcast_link' => $request->input('podcast_link') ?? $Debate->podcast_link,
            'podcast_release_date' =>  $request->input('podcast_release_date') ?? $Debate->podcast_release_date,
        ]);

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
