<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLastUpdatedToWebsiteVisits extends Migration {

    public function up() {
        Schema::table('website_visits', function (Blueprint $table) {
            $table->timestamp('last_visit')->after('visits')->nullable();
        });
    }

    public function down() {
        Schema::table('website_visits', function (Blueprint $table) {
            $table->dropColun('last_visit');
        });
    }
}
