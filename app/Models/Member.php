<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'sdp_members';

    public $fillable = [
        'youtube_channel_id',
        'name'
    ];

    public static function Apandah () {
       return self::where('name', 'Apandah')->first();
    }

    public static function Aztrosist () {
        return self::where('name', 'Aztrosist')->first();
    }

    public static function Jschlatt () {
        return self::where('name', 'Jschlatt')->first();
    }

    public static function Mikasacus () {
        return self::where('name', 'Mikasacus')->first();
    }
}
