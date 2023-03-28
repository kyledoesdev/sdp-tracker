<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'season'
    ];

    protected $with = [
        'debates'
    ];

    public static function boot() {
        parent::boot();

        static::addGlobalScope('order', fn($query) => $query->orderBy('season', 'DESC'));
    }

    public function debates() : HasMany {
        return $this->hasMany(Debate::class, 'season', 'season')->orderBy('podcast_upload_date', 'DESC');
    }

    public function getWinCountForMember(string $member) : int {
        return $this->debates
            ->where('was_discussion', false)
            ->where($member, true)
            ->count();
    }

    public function getTotalGuestWins() : int {
        return $this->debates
            ->where('guest', true)
            ->count();
    }
}
