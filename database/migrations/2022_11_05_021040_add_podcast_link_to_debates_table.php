<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('debates', function (Blueprint $table) {
            $table->boolean('guest')->after('mika')->nullable();
            $table->string('guest_name')->after('guest')->nullable();
            $table->text('podcast_link')->after('winning_side')->nullable();
        });
    }

    public function down() {
        Schema::table('debates', function (Blueprint $table) {
            $table->dropColumn('guest');
            $table->dropColumn('guest_name');
            $table->dropColumn('podcast_link');
        });
    }
};
