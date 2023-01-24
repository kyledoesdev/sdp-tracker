<?php

namespace App\Exports;

use App\Models\Debate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SDPTableExport implements FromCollection, WithMapping, WithHeadings {

    public function headings () : array {

        $headings = [
            'Podcast Number',
            'Topic',
            'Was Debate ?',
            'Was Discussion ?',
            'Apandah Won',
            'Aztrosist Won',
            'Jschlatt Won',
            'Mikasacus Won',
        ];

        if (Debate::whereHasGuestThatWon()) {
            $headings = array_merge($headings, [
                'Did the Guest Win ?',
            ]);
        }

        return array_merge($headings,  [
            'Winning Side',
            'Podcast Link',
            'Podcast Upload Date'
        ]);
    }

    public function map ($Debate) : array {

        $columns = [
            $Debate->podcast_number,
            $Debate->topic_name,
            $Debate->isDebate() == true ? 'Yes' : 'No',
            $Debate->isDiscussion() == true ? 'Yes' : 'No',
            $Debate->isDebate() 
                ? $Debate->apandah !== null
                    ? ($Debate->apandah == true ? 'Won' : 'Lose') 
                    : null
                : null,
            $Debate->isDebate() 
                ? $Debate->aztro !== null
                    ? ($Debate->aztro == true ? 'Won' : 'Lose') 
                    : null
                : null,
            $Debate->isDebate() 
                ? $Debate->schlatt !== null
                    ? ($Debate->schlatt == true ? 'Won' : 'Lose') 
                    : null
                : null,
            $Debate->isDebate()
                ? $Debate->mika !== null
                    ? ($Debate->mika == true ? 'Won' : 'Lose') 
                    : null
                : null,
        ];

        if (Debate::whereHasGuestThatWon() && $Debate->isDebate()) {
            if ($Debate->guest !== null && $Debate->guest_name !== null) {
                if ($Debate->guest) {
                    $columns = array_merge($columns, [$Debate->guest_name . ' Won']);
                } else {
                    $columns = array_merge($columns, [$Debate->guest_name . ' Lose']);
                }
            } else {
                $columns = array_merge($columns, ['']);
            }
        } 

        return array_merge($columns, [
            $Debate->isDebate() ? $Debate->winning_side : null,
            $Debate->podcast_link,
            $Debate->getFormattedPodcastUploadDate()
        ]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() {
        return Debate::orderBy('podcast_number', 'DESC')->get();
    }
}
