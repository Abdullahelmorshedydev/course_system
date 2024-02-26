<?php

namespace App\Http\Requests\Api\Employee\Settings;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingsRequest extends FormRequest
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
            'site_name' => ['required', 'string', 'min:3', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'site_name.required' => __('api/employee/error.site_name_valid_required'),
            'site_name.string' => __('api/employee/error.site_name_valid_string'),
            'site_name.min' => __('api/employee/error.site_name_valid_min'),
            'site_name.max' => __('api/employee/error.site_name_valid_max'),
        ];
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
