<?php

use App\Models\Season;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('seasons', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('season_id');
            $table->integer('episode_type');
            $table->integer('episode_number');
            $table->string('topic');
            $table->boolean('apandah_result')->nullable();
            $table->boolean('astrid_result')->nullable();
            $table->boolean('jschlatt_result')->nullable();
            $table->boolean('mikasacus_result')->nullable();
            $table->boolean('has_guest');
            $table->boolean('guest_result')->nullable();
            $table->string('guest_name')->nullable();
            $table->string('episode_url')->nullable();
            $table->date('episode_upload_date');
            $table->timestamps();
            $table->softDeletes();
        });

        Season::create(['name' => 'Season 1']);
        Season::create(['name' => 'Season 2']);
        Season::create(['name' => 'Season 3']);
    }

    public function down(): void
    {
        Schema::dropIfExists('seasons');
        Schema::dropIfExists('episodes');
    }
};
