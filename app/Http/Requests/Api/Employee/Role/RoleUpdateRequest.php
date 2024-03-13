<?php

namespace App\Http\Requests\Api\Employee\Role;

use Illuminate\Validation\Rule;
use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{
    use ApiResponseTrait;

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
            'guard_name' => 'web',
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('roles', 'name')->ignore($this->role), 'string', 'min:3', 'max:20'],
            'guard_name' => ['required'],
            'permissions' => ['required', 'array'],
            'permissions.*' => ['exists:permissions,name']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('api/employee/error.name_valid_required'),
            'name.string' => __('api/employee/error.name_valid_string'),
            'name.unique' => __('api/employee/error.name_valid_unique'),
            'name.min' => __('api/employee/error.name_valid_min'),
            'name.max' => __('api/employee/error.name_valid_max'),
            'permissions.required' => __('api/employee/error.permission_valid_required'),
            'permissions.array' => __('api/employee/error.permission_valid_array'),
            'permissions.*.exists' => __('api/employee/error.permission_valid_exists'),
        ];
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
