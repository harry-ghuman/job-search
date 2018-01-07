<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'name'                  => 'required|max:100',
            'job_title'             => 'required|max:100',
            'special_designation'   => 'max:100',
            'department'            => 'required|max:100',
            'phone'                 => 'min:10',
            'email'                 => 'required|email',
            'office_address'        => 'max:200',
        ];
    }
}
