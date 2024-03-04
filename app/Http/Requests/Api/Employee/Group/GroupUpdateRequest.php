<?php

namespace App\Http\Requests\Api\Employee\Group;

use App\Enums\CourseStatusEnum;
use App\Traits\TranslateTrait;
use Illuminate\Validation\Rule;
use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class GroupUpdateRequest extends FormRequest
{
    use ApiResponseTrait, TranslateTrait;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'name' => TranslateTrait::translate($this->name_en, $this->name_ar),
            'slug' => TranslateTrait::translate($this->name_en, $this->name_ar, true),
        ]);
    }

    public function rules(): array
    {
        return [
            'name_en' => ['required', 'string', Rule::unique('courses', 'name->en')->ignore($this->group), 'min:3', 'max:255'],
            'name_ar' => ['required', 'string', Rule::unique('courses', 'name->ar')->ignore($this->group), 'min:3', 'max:255'],
            'name' => ['array'],
            'slug' => ['array'],
            'instructor_id' => ['required', 'exists:users,id'],
            'mentor_id' => ['required', 'exists:users,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'course_id' => ['required', 'exists:courses,id'],
            'max_students' => ['required', 'integer', 'min:0'],
            'number_of_students' => ['required', 'integer', 'min:0', function ($attribte, $value, $fail) {
                if (request()->input('max_students') < $value) {
                    $fail(__('api/employee/error.number_of_students_valid_max'));
                }
            }],
            'status' => ['required', Rule::in(CourseStatusEnum::cases())],
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => __('api/employee/error.name_en_valid_required'),
            'name_en.string' => __('api/employee/error.name_en_valid_string'),
            'name_en.unique' => __('api/employee/error.name_en_valid_unique'),
            'name_en.min' => __('api/employee/error.name_en_valid_min'),
            'name_en.max' => __('api/employee/error.name_en_valid_max'),
            'name_ar.required' => __('api/employee/error.name_ar_valid_required'),
            'name_ar.string' => __('api/employee/error.name_ar_valid_string'),
            'name_ar.unique' => __('api/employee/error.name_ar_valid_unique'),
            'name_ar.min' => __('api/employee/error.name_ar_valid_min'),
            'name_ar.max' => __('api/employee/error.name_ar_valid_max'),
            'instructor_id.required' => __('api/employee/error.instructor_valid_required'),
            'instructor_id.exists' => __('api/employee/error.instructor_valid_exists'),
            'mentor_id.required' => __('api/employee/error.mentor_valid_required'),
            'mentor_id.exists' => __('api/employee/error.mentor_valid_exists'),
            'start_date.required' => __('api/employee/error.start_date_valid_required'),
            'start_date.date' => __('api/employee/error.start_date_valid_date'),
            'end_date.required' => __('api/employee/error.end_date_valid_required'),
            'end_date.date' => __('api/employee/error.end_date_valid_date'),
            'course_id.required' => __('api/employee/error.course_valid_required'),
            'course_id.exists' => __('api/employee/error.course_valid_exists'),
            'max_students.required' => __('api/employee/error.max_students_valid_required'),
            'max_students.integer' => __('api/employee/error.max_students_valid_integer'),
            'max_students.min' => __('api/employee/error.max_students_valid_min'),
            'number_of_students.required' => __('api/employee/error.number_of_students_valid_required'),
            'number_of_students.integer' => __('api/employee/error.number_of_students_valid_integer'),
            'number_of_students.min' => __('api/employee/error.number_of_students_valid_min'),
            'status.required' => __('api/employee/error.status_valid_required'),
            'status.integer' => __('api/employee/error.status_valid_integer'),
            'status.rule' => __('api/employee/error.status_valid_rule'),
        ];
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
