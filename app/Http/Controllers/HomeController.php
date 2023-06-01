<?php

namespace App\Http\Controllers;

use App\Models\Debate;
use App\Models\Season;
use App\Models\WebsiteVisit;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function index(Request $request) {
        $WebsiteVisit = WebsiteVisit::first();
        $WebsiteVisit->updateVisits();

        $perPage = 10;

        $season = Season::findOrFail(2); //get second season by default

        if ($request->has('season')) {
            $season = Season::findOrFail($request->input('season'));
        }

        if ($request->has('perPage')) {
            $perPage = $request->input('perPage');
        }

        return view('home', [
            'debates' => $season->debates()->paginate($request->input('perPage') ?? $perPage),
            'seasonNum' => $season->season,
            'season' => $season,
            'WebsiteVisit' => $WebsiteVisit,
            'perPage' => $perPage,
        ]);
    }
}
