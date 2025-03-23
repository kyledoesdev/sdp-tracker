<?php

use App\Models\Season;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Season::create(['name' => 'Season 4']);
        Season::create(['name' => 'Season 5']);
        Season::create(['name' => 'Season 6']);
        Season::create(['name' => 'Season 7']);
    }
};
