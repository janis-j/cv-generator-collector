<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCvRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
        'name' => 'required',
        'surname' => 'required',
        'email' => 'required|email',
        'phone_number' => 'required|numeric',
        // 'skills',
        // 'languages',
        // 'interests',
        // 'additional_info',
        // 'company_name',
        // 'job_title',
        'working_hours.*' => 'nullable|numeric|gt:0|lte:24',
        'work_from.*' => 'nullable|numeric',
        // 'work_to',
        // 'work_description',
        // 'school_name',
        // 'course_name',
        // 'education_level',
        'education_from.*' => 'nullable|numeric',
        // 'education_to',
        // 'education_description'
        ];
    }

    public function messages(): array
    {
        return [
            'working_hours.*.numeric' => 'Must be numeric',
            'working_hours.*.gt:0' => 'Must be greater than 0',
            'working_hours.*.lte:24' => 'Must be less than 25',
        ];
    }
}
