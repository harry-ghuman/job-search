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
            'semester'          => 'alpha|min:4|max:6',
            'student_year'      => 'digits:4',
            'phone'             => 'digits:10',
            'email'             => 'required|email',
            'residency_status'  => 'max:50',
            'student_country'   => 'max:100',
            'gender'            => 'alpha|max:6',

            'program'           => 'sometimes|required|max:50',
            'university'        => 'sometimes|required|max:100',
            'gpa'               => 'sometimes|required',
            'year'              => 'sometimes|required',
            'country'           => 'sometimes|required|max:100',

            'job_title'         => 'sometimes|required|max:50',
            'company'           => 'sometimes|required|max:50',
            'duties'            => 'sometimes|required|max:100',
            'start_date'        => 'sometimes|required',
            'end_date'          => 'sometimes|required',

            'skill_name'        => 'sometimes|required|max:50',
        ];
    }
}
