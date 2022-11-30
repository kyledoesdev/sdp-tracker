<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Member extends Model {
    use HasFactory;
    use SoftDeletes;

    const APANDAH = 'Apandah';
    const AZTROSIST = 'Aztrosist';
    const JSCHLATT = 'Jschlatt';
    const MIKASACUS = 'Mikasacus';

    public $table = 'sdp_members';

    public $fillable = [
        'youtube_channel_id',
        'name'
    ];

    public static function getMember (string $member) {
        return self::where('name', $member)->first();
    }
}
