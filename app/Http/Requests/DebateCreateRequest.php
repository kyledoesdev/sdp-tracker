<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class DebateCreateRequest extends FormRequest {
    
    public function authorize() {
        return Auth::check();
    }

    public function rules() {
        return [
            'podcast_number' => 'required|integer',
            'topic_name' => 'required|string',
            'apandah' => 'nullable',
            'aztro' => 'nullable',
            'schlatt' => 'nullable',
            'mika' => 'nullable',
            'was_discussion' => 'boolean|nullable',
            'was_there_a_guest' => 'boolean|required',
            'guest' => 'nullable',
            'guest_name' => 'string|nullable',
            'winning_side' => 'required|string',
            'podcast_link' => 'nullable|string',
            'podcast_upload_date' => 'required',
        ];
    }
}
