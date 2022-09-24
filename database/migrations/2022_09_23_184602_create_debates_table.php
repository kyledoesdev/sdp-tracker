<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebatesTable extends Migration
{
    public function up() {
        Schema::create('debates', function (Blueprint $table) {
            $table->id();
            $table->integer('podcast_number');
            $table->string('debate_name');
            $table->boolean('apandah')->default(false)->nullable();
            $table->boolean('aztro')->default(false)->nullable();
            $table->boolean('schlatt')->default(false)->nullable();
            $table->boolean('mika')->default(false)->nullable();
            $table->timestamp('podcast_upload_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('debates');
    }
}
