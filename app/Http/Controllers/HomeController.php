<?php

namespace App\Http\Controllers;

use App\Models\Debate;
use App\Models\WebsiteVisit;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function index() {

        $WebsiteVisit = WebsiteVisit::first();
        $WebsiteVisit->updateVisits();

        return view('home', [
            'WebsiteVisit' => $WebsiteVisit,
            'debates' => Debate::orderBy('created_at', 'DESC')->paginate(10),
            'apandahWins' => Debate::where('apandah', true)->count(),
            'aztroWins' => Debate::where('aztro', true)->count(),
            'schlattWins' => Debate::where('schlatt', true)->count(),
            'mikaWins' => Debate::where('mika', true)->count(),
        ]);
    }
}
