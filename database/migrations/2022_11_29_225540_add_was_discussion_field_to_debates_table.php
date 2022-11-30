<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('debates', function (Blueprint $table) {
            $table->boolean('was_discussion')->after('mika');
        });
    }
    public function down() {
        Schema::table('debates', function (Blueprint $table) {
            $table->dropColumn('was_discussion');
        });
    }
};
