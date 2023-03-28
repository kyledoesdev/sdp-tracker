<?php

namespace Database\Seeders;

use Database\Seeders\SeasonSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {
        $this->call(SeasonSeeder::class);
    }
}
