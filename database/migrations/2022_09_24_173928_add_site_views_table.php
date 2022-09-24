<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSiteViewsTable extends Migration
{

    public function up() {
        Schema::create('website_visits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('visits')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('website_visits');
    }
}
