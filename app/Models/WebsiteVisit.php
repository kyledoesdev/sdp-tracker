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
        'visits',
        'last_visit'
    ];

    public function getVisits() : string {
        return number_format($this->visits, 0, '.', ',');
    }

    public function getFormattedUpdatedAt() {
        return Carbon::parse($this->updated_at)->tz('America/New_York')->format('M-d-Y g:i A T');
    }

    public function getFormattedLastVisit() {
        return Carbon::parse($this->last_visit)->tz('America/New_York')->format('M-d-Y g:i: A T');
    }

    public function updateVisits() {
        $this->update([
            'visits' => $this->visits + 1,
            'last_visit' => $this->updated_at
        ]);
    }
}
