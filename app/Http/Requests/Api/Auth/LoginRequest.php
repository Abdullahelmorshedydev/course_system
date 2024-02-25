<?php

namespace App\Http\Requests\Api\Auth;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('api/employee/error.email_valid_required'),
            'email.string' => __('api/employee/error.email_valid_string'),
            'email.email' => __('api/employee/error.email_valid_email'),
            'email.max' => __('api/employee/error.email_valid_max'),
            'password.required' => __('api/employee/error.password_valid_required'),
            'password.string' => __('api/employee/error.password_valid_string'),
            'password.min' => __('api/employee/error.password_valid_min'),
            'password.max' => __('api/employee/error.password_valid_max'),
        ];
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
