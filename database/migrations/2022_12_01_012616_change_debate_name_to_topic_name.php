<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('debates', function (Blueprint $table) {
            $table->renameColumn('debate_name', 'topic_name');
        });
    }

    public function down() {
        Schema::table('debates', function (Blueprint $table) {
            $table->renameColumn('topic_name', 'debate_name');
        });
    }
};
