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
            'debate_name' => 'required|string',
            'apandah' => 'boolean|nullable',
            'aztro' => 'boolean|nullable',
            'schlatt' => 'boolean|nullable',
            'mika' => 'boolean|nullable',
            'guest' => 'boolean|nullable',
            'guest_name' => 'string|nullable',
            'winning_side' => 'required|string',
            'podcast_link' => 'nullable|string',
            'podcast_upload_date' => 'required',
        ];
    }
}
