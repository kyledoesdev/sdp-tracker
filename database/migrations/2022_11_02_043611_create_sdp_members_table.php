<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('sdp_members', function (Blueprint $table) {
            $table->id();
            $table->string('youtube_channel_id'); //note that youtube channel ids were not seeded and were manully entered 11/2/2022
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sdp_members');
    }
};
