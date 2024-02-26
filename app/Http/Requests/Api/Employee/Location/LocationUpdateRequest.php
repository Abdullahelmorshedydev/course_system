<?php

namespace App\Http\Requests\Api\Employee\Location;

use Illuminate\Validation\Rule;
use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class LocationUpdateRequest extends FormRequest
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
            'name_en' => ['required', 'string', Rule::unique('locations', 'name->en')->ignore($this->location), 'min:3', 'max:255'],
            'name_ar' => ['required', 'string', Rule::unique('locations', 'name->ar')->ignore($this->location), 'min:3', 'max:255'],
            'country_id' => ['nullable', 'integer', 'exists:locations,id'],
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
            'country_id.integer' => __('api/employee/error.location_id_valid_integer'),
            'country_id.exists' => __('api/employee/error.location_id_valid_exists'),
        ];
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
