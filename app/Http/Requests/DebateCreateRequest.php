<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DebateCreateRequest extends FormRequest {
    
    public function authorize() {
        return auth()->check();
    }

    public function rules() {

        $discussion = [
            'podcast_number' => 'required|integer',
            'topic_name' => 'required|string',
            'was_there_a_guest' => 'boolean|required',
            'guest_name' => 'string|nullable',
            'season' => 'required|integer',
            'podcast_link' => 'nullable|string',
            'podcast_upload_date' => 'required',
        ];

        if ($this->podcast_type === 'debate') {
            $debate = array_merge($discussion + [
                'apandah' => 'required',
                'aztro' => 'required',
                'schlatt' => 'required_if:season,1',
                'mika' => 'required',
                'guest' => 'nullable',
                'winning_side' => 'required_if:was_discussion,false',
            ]);

            return $debate;
        }


        return $discussion;
    }
}
