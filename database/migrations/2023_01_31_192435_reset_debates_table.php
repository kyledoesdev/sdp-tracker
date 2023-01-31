<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::dropIfexists('debates');

        Schema::create('debates', function(Blueprint $table) {
            $table->id();
            $table->integer('podcast_number');
            $table->string('topic_name');
            $table->boolean('apandah')->default(false)->nullable();
            $table->boolean('aztro')->default(false)->nullable();
            $table->boolean('schlatt')->default(false)->nullable();
            $table->boolean('mika')->default(false)->nullable();
            $table->boolean('was_discussion');
            $table->boolean('was_there_a_guest');
            $table->boolean('guest')->nullable();
            $table->string('guest_name')->nullable();
            $table->string('winning_side')->nullable();
            $table->text('podcast_link')->nullable();
            $table->timestamp('podcast_upload_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfexists('debates');
    }
};
