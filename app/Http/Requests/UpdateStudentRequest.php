<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'name'              => 'required|max:100',
            'student_id'        => 'required|digits:9',
            'semester'          => 'alpha|min:6|max:6',
            'year'              => 'digits:4',
            'phone'             => 'digits:10',
            'email'             => 'required|email',
            'residency_status'  => 'max:50',
            'country'           => 'max:100',
            'gender'            => 'alpha|max:6',
        ];
    }
}
