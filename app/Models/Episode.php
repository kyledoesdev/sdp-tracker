<?php

namespace App\Models;

use App\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    const DEBATE = 1;
    const DISCUSSION = 2;

    protected $fillable = [
        'season_id',
        'episode_number',
        'topic',
        'episode_type',
        'apandah_result',
        'astrid_result',
        'jschlatt_result',
        'mikasacus_result',
        'has_guest',
        'guest_result',
        'guest_name',
        'episode_url',
        'episode_upload_date'
    ];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('episode_order', fn($q) => $q->orderBy('episode_number', 'DESC'));
    }

    public function casts(): array
    {
        return [
            'apandah_result' => 'boolean',
            'astrid_result' => 'boolean',
            'jschlatt_result' => 'boolean',
            'mikasacus_result' => 'boolean',
            'has_guest' => 'boolean',
            'guest_result' => 'boolean',
            'episode_upload_date' => 'date'
        ];
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function getTypeAttribute(): string
    {
        return $this->episode_type == self::DEBATE ? 'Debate' : 'Discussion';
    }

    public function isDebate(): bool
    {
        return $this->episode_type == self::DEBATE;
    }

    public function getFormattedTopicAttribute(): string
    {
        return nl2br(collect(wordwrap($this->topic))->implode("\n"));
    }
}
