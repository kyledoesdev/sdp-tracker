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
        if ($request->has('perPage') && $request->input('perPage') < count(Debate::all())) {
            $perPage = $request->input('perPage');
        }

        return view('home', [
            'seasons' => Season::all(),
            'WebsiteVisit' => $WebsiteVisit,
            'perPage' => $perPage,
        ]);
    }
}
