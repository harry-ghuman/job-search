<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'job_title'         => 'required|max:50',
            'description'       => 'required|max:100',
            'credits'           => 'required|digits:1|in:3,6,9',
            'responsibilities'  => 'nullable|max:2000',
            'requirements'      => 'nullable|max:2000',
        ];
    }
}
