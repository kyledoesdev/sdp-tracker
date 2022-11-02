<?php

use App\Models\Debate;

use Illuminate\Database\Migrations\Migration;

use Carbon\Carbon;

return new class extends Migration
{
    public function up()
    {
        Debate::updateOrCreate(['id' => 69420], [
            'apandah' => false,
            'aztro' => true,
            'schlatt' => false,
            'mika' => true,
            'podcast_number' => 69420,
            'debate_name' => 'Stream Alex Unknown & Lilac Boy',
            'winning_side' => 'Not Apandah or Schlatt',
            'podcast_upload_date' => Carbon::parse('2000-06-07')
        ]);
    }

    public function down()
    {
        Debate::where('id', 69420)->delete();
    }
};
