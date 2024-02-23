<?php

namespace App\Http\Requests\Api\Employee\Auth;

use Illuminate\Validation\Rule;
use App\Enums\EmployeeStatusEnum;
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
            'email' => ['required', 'email', Rule::exists('employees', 'email')->where('status', EmployeeStatusEnum::ACTIVE->value)],
            'password' => ['required'],
        ];
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
