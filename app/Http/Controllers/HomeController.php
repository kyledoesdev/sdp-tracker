<?php

namespace App\Http\Controllers;

use App\Libraries\Helpers;
use App\Models\Debate;
use App\Models\Member;
use App\Models\WebsiteVisit;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function index(Request $request) {
        $WebsiteVisit = WebsiteVisit::first();
        $WebsiteVisit->updateVisits();

        $Debates = Debate::query();

        if ($request->has('search-box')) {
            $Debates = Debate::filter($request->all());

            /**
             * Check if the user activates a secret!
             */
            if ($Debates === 'mika-aztro-secret') {
                return view('home', [
                    'WebsiteVisit' => $WebsiteVisit,
                    'debates' => Debate::getAztroAndMikaSecretDebate(),
                    'apandahWins' => 0, // lol
                    'aztroWins' => Helpers::getSubCount(Member::getMember(Member::AZTROSIST)),
                    'schlattWins' => 0, // lol
                    'mikaWins' => Helpers::getSubCount(Member::getMember(Member::MIKASACUS)),
                ]);
            }
        }

        $Debates->orderBy('podcast_number', 'DESC');

        return view('home', [
            'WebsiteVisit' => $WebsiteVisit,
            'debates' => $request->has('debate-count') 
                ? $request->input('debate-count') == 'All'
                    ? $Debates->paginate(Debate::count())
                    : $Debates->paginate($request->input('debate-count'))
                : $Debates->paginate(10),
            'apandahWins' => Debate::where('was_discussion', false)->where('apandah', true)->count(),
            'aztroWins' => Debate::where('was_discussion', false)->where('aztro', true)->count(),
            'schlattWins' => Debate::where('was_discussion', false)->where('schlatt', true)->count(),
            'mikaWins' => Debate::where('was_discussion', false)->where('mika', true)->count(),
        ]);
    }
}
