<?php

namespace App\Http\Requests\Api\Employee\Employee;

use App\Enums\GenderEnum;
use App\Enums\WorkingPlaceEnum;
use App\Enums\WorkingTypeEnum;
use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeStoreRequest extends FormRequest
{
    use ApiResponseTrait;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users,email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'max:50'],
            'phone' => ['required', 'string', 'min:9', 'max:15'],
            'gender' => ['required', 'integer', Rule::in(GenderEnum::cases())],
            'location_id' => ['required', 'integer', 'exists:locations,id'],
            'salary' => ['required', 'integer', 'min:1'],
            'working_type' => ['required', 'integer', Rule::in(WorkingTypeEnum::cases())],
            'working_hours' => ['required', 'integer', 'min:1'],
            'working_place' => ['required', 'integer', Rule::in(WorkingPlaceEnum::cases())],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('api/employee/error.name_valid_required'),
            'name.string' => __('api/employee/error.name_valid_string'),
            'name.min' => __('api/employee/error.name_valid_min'),
            'name.max' => __('api/employee/error.name_valid_max'),
            'password.required' => __('api/employee/error.password_valid_required'),
            'password.string' => __('api/employee/error.password_valid_string'),
            'password.min' => __('api/employee/error.password_valid_min'),
            'password.max' => __('api/employee/error.password_valid_max'),
            'email.required' => __('api/employee/error.email_valid_required'),
            'emal.string' => __('api/employee/error.email_valid_string'),
            'email.email' => __('api/employee/error.email_valid_email'),
            'email.unique' => __('api/employee/error.email_valid_unique'),
            'email.max' => __('api/employee/error.email_valid_max'),
            'phone.required' => __('api/employee/error.phone_valid_required'),
            'phone.string' => __('api/employee/error.phone_valid_string'),
            'phone.min' => __('api/employee/error.phone_valid_min'),
            'phone.max' => __('api/employee/error.phone_valid_max'),
            'gender.required' => __('api/employee/error.gender_valid_required'),
            'gender.integer' => __('api/employee/error.gender_valid_integer'),
            'gender.rule' => __('api/employee/error.gender_valid_rule'),
            'salary.required' => __('api/employee/error.salary_valid_required'),
            'salary.integer' => __('api/employee/error.salary_valid_integer'),
            'salary.min' => __('api/employee/error.salary_valid_min'),
            'working_type.required' => __('api/employee/error.working_type_valid_required'),
            'working_type.integer' => __('api/employee/error.working_type_valid_integer'),
            'working_type.rule' => __('api/employee/error.working_type_valid_rule'),
            'working_hours.required' => __('api/employee/error.working_hours_valid_required'),
            'working_hours.integer' => __('api/employee/error.working_hours_valid_integer'),
            'working_hours.min' => __('api/employee/error.working_hours_valid_min'),
            'working_place.required' => __('api/employee/error.working_place_valid_required'),
            'working_place.integer' => __('api/employee/error.working_place_valid_integer'),
            'working_place.rule' => __('api/employee/error.working_place_valid_rule'),
        ];
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
