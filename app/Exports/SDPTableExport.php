<?php

namespace App\Exports;

use App\Models\Debate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SDPTableExport implements FromCollection, WithMapping, WithHeadings {

    public function headings () : array {
        return [
            'Podcast Number',
            'Debate Name',
            'Apandah Won',
            'Aztrosist Won',
            'Jschlatt Won',
            'Mikasacus Won',
            'Podcast Upload Date'
        ];
    }

    public function map ($Debate) : array {
        return [
            $Debate->podcast_number,
            $Debate->debate_name,
            $Debate->apandah ? 'Won' : 'Lose',
            $Debate->aztro ? 'Won' : 'Lose',
            $Debate->schlatt ? 'Won' : 'Lose',
            $Debate->mika ? 'Won' : 'Lose',
            $Debate->getFormattedPodcastUploadDate()
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() {
        return Debate::orderBy('podcast_upload_date', 'DESC')->get();
    }
}
