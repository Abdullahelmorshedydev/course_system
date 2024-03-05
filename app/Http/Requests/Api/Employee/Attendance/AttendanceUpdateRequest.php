<?php

namespace App\Http\Requests\Api\Employee\Attendance;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class AttendanceUpdateRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'session_id' => ['required', 'exists:sessions,id'],
            'evaluate' => ['required', 'integer', 'min:0', 'max:10'],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => __('api/employee/error.student_valid_required'),
            'user_id.exists' => __('api/employee/error.student_valid_exists'),
            'session_id.required' => __('api/employee/error.session_valid_required'),
            'session_id.exists' => __('api/employee/error.session_valid_exists'),
            'evaluate.required' => __('api/employee/error.evaluate_valid_required'),
            'evaluate.integer' => __('api/employee/error.evaluate_valid_integer'),
            'evaluate.min' => __('api/employee/error.evaluate_valid_min'),
            'evaluate.max' => __('api/employee/error.evaluate_valid_max'),
        ];
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
