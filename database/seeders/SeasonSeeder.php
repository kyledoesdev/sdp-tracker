<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder {

    public function run(): void {
        Season::create(['season' => 1]);
        Season::create(['season' => 2]);
    }
}
