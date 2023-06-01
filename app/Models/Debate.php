<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Member;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Debate extends Model {
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'podcast_number',
        'topic_name',
        'apandah',
        'aztro',
        'schlatt',
        'mika',
        'was_discussion',
        'was_there_a_guest',
        'guest',
        'guest_name',
        'winning_side',
        'season',
        'podcast_link',
        'podcast_upload_date'
    ];

    public static function boot() {
        parent::boot();

        /**
         * Don't include any easter egg podcast records by default.
         */
        static::addGlobalScope('easter_egg_podcasts', function (Builder $builder) {
            $builder->where('podcast_number', '!=', 69420);
        });
    }

    /**
     * Queries
     */
    public static function filter($filters) {
        
        if (isset($filters['search-box']) && (
                strtolower(str_replace(" ", "", $filters['search-box'])) === 'alexunknown') || 
                strtolower(str_replace(" ", "", $filters['search-box'])) === 'lilacboy' ||
                strtolower(str_replace(" ", "", $filters['search-box'])) === 'therapytime'
            ) {
            return 'mika-aztro-secret'; //return a string that will activate a secret page!
        }

        return self::query()
            ->orWhere('podcast_number', 'LIKE', "%{$filters['search-box']}%")
            ->orWhere('topic_name', 'LIKE', "%{$filters['search-box']}%")
            ->orWhere('winning_side', 'LIKE', "%{$filters['search-box']}%");  
    }

    public function season() : BelongsTo {
        return $this->belongsTo(Season::class, 'season', 'season');
    }

    public function updatePodcast($fields) {

        $generalUpdates = [
            'podcast_number' => $fields['podcast_number'] ?? $this->podcast_number,
            'topic_name' => $fields['topic_name'],
            'was_there_a_guest' => $fields['was_there_a_guest'] == 1 ? true : false,
            'guest_name' => $fields['guest_name'],
            'season' => $fields['season'] ?? $this->season,
            'podcast_link' => $fields['podcast_link'],
            'podcast_upload_date' => $fields['podcast_upload_date'] ?? $this->podcast_upload_date,
        ];

        if ($fields['podcast_type'] === 'debate') {
            $this->update($generalUpdates + [
                'apandah' => $fields['apandah'] !== 'clear' 
                    ? $fields['apandah'] == 1
                        ? true
                        : false
                    : null,
                'aztro' => $fields['aztro'] !== 'clear' 
                    ? $fields['aztro'] == 1 
                        ? true 
                        : false
                    : null,
                'schlatt' => $fields['schlatt'] !== 'clear' 
                    ? $fields['schlatt'] == 1 
                        ? true 
                        : false 
                    : null,
                'mika' => $fields['mika'] !== 'clear' 
                    ? $fields['mika'] == 1 
                        ? true 
                        : false 
                    : null,
                'guest' => $fields['guest'] == 1 
                    ? true 
                    : false,
                'winning_side' => $fields['winning_side'],
            ]);
        }

        $this->update($generalUpdates);
    }
    
    /**
     * Accessors
     */
    public function getPodcastString() : string {
        return "Podcast # " . $this->podcast_number;
    }

    public function getFormattedPodcastUploadDate() {
        return Carbon::parse($this->podcast_upload_date)->format('M d Y');
    }

    public function isDiscussion() {
        return $this->was_discussion;
    }

    public function isDebate() {
        return ! $this->was_discussion;
    }
}
