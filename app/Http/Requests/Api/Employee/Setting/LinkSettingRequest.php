<?php

namespace App\Http\Requests\Api\Employee\Setting;

use App\Enums\SettingTypeEnum;
use App\Enums\SettingGroupEnum;
use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class LinkSettingRequest extends FormRequest
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
            'type' => SettingTypeEnum::TEXT->value,
            'group' => SettingGroupEnum::LINKS->value,
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
            'facebook_link' => ['required', 'string', 'min:3', 'max:255'],
            'type' => ['required'],
            'group' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'facebook_link.required' => __('api/employee/error.facebook_link_valid_required'),
            'facebook_link.string' => __('api/employee/error.facebook_link_valid_string'),
            'facebook_link.min' => __('api/employee/error.facebook_link_valid_min'),
            'facebook_link.max' => __('api/employee/error.facebook_link_valid_max'),
        ];
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
