<?php

namespace App\Http\Requests\Api\Employee\Session;

use App\Traits\ApiResponseTrait;
use App\Traits\TranslateTrait;
use Illuminate\Foundation\Http\FormRequest;

class SessionStoreRequest extends FormRequest
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
            'description' => TranslateTrait::translate($this->description_en, $this->description_ar),
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
            'group_id' => ['required', 'exists:groups,id'],
            'session' => ['required', 'string', 'min:10'],
            'date' => ['required', 'date'],
            'description_en' => ['required', 'string', 'min:3', 'max:255'],
            'description_ar' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['array'],
        ];
    }

    public function messages()
    {
        return [
            'group_id.required' => __('api/employee/error.group_valid_required'),
            'group_id.exists' => __('api/employee/error.group_valid_exists'),
            'session.required' => __('api/employee/error.session_valid_required'),
            'session.string' => __('api/employee/error.session_valid_string'),
            'session.max' => __('api/employee/error.session_valid_max'),
            'date.required' => __('api/employee/error.date_valid_required'),
            'date.date' => __('api/employee/error.date_valid_date'),
            'description_en.required' => __('api/employee/error.desciption_en_valid_required'),
            'description_en.string' => __('api/employee/error.desciption_en_valid_string'),
            'description_en.min' => __('api/employee/error.desciption_en_valid_min'),
            'description_en.max' => __('api/employee/error.desciption_en_valid_max'),
            'description_ar.required' => __('api/employee/error.desciption_ar_valid_required'),
            'description_ar.string' => __('api/employee/error.desciption_ar_valid_string'),
            'description_ar.min' => __('api/employee/error.desciption_ar_valid_min'),
            'description_ar.max' => __('api/employee/error.desciption_ar_valid_max'),
        ];
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
