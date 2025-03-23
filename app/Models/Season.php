<?php

namespace App\Models;

use App\Models\Model;

class Season extends Model
{
    protected $fillable = [
        'name'
    ];

    public static function getEpisodeRange($season): string
    {
        $range = '';

        switch ($season) {
            case 1:
                $range = '(74 - 99)';
                break;
            case 2:
                $range = '(100 - 149)';
                break;
            case 3:
                $range = '(150 - 199)';
                break;
            case 4:
                $range = '(200 - Present)';
                break;
            default:
                break;
        }

        return $range;
    }
}
