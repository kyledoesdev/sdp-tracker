<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Debate extends Model {
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'podcast_number',
        'debate_name',
        'apandah',
        'aztro',
        'schlatt',
        'mika',
        'podcast_upload_date'
    ];

    public function getPodcastString() : string {
        return "Podcast # " . $this->podcast_number;
    }

    public function getFormattedPodcastUploadDate() {
        return Carbon::parse($this->podcast_upload_date)->format('M-d-Y');
    }
}
