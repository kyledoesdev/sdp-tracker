<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDebateWinnerToDebatesTable extends Migration{

    public function up()
    {
        Schema::table('debates', function (Blueprint $table) {
            $table->string('winning_side')->after('mika')->nullable();
        });
    }

    public function down() {
        Schema::table('debates', function (Blueprint $table) {
            $table->dropColumn('winning_side');
        });
    }
}
