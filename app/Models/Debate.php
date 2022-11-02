<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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
        'winning_side',
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
            ->orWhere('debate_name', 'LIKE', "%{$filters['search-box']}%")
            ->orWhere('winning_side', 'LIKE', "%{$filters['search-box']}%");  
    }

    public function getPodcastString() : string {
        return "Podcast # " . $this->podcast_number;
    }

    public function getFormattedPodcastUploadDate() {
        return Carbon::parse($this->podcast_upload_date)->format('M-d-Y');
    }

    public static function getAztroAndMikaSecretDebate() {
        /**
         * Remove scoping that unincludes easter egg podcast from queries.
         */
        return self::withoutGlobalScopes()->where('podcast_number', 69420)->paginate(1);
    }
}
