<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class WebsiteVisit extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'visits'
    ];

    public function getFormattedUpdatedAt() {
        return Carbon::parse($this->updated_at)->tz('America/New_York')->format('M-d-Y g:i A T');
    }
}
