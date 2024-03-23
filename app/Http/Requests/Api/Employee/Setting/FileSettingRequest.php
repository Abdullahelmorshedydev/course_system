<?php

namespace App\Http\Requests\Api\Employee\Setting;

use App\Enums\SettingTypeEnum;
use App\Enums\SettingGroupEnum;
use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class FileSettingRequest extends FormRequest
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
        // $this->merge([
        //     'type' => SettingTypeEnum::FILE->value,
        //     'group' => SettingGroupEnum::FILES->value,
        // ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        dd($this->all());
        return [
            'logo' => ['required', 'image', 'mimes:png,jpg,jpeg', 'mimetypes:image/png,image/jpg,image/jpeg'],
            'type' => ['required'],
            'group' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'logo.image' => __('api/employee/error.image_valid'),
            'logo.mimes' => __('api/employee/error.mimes_valid'),
            'logo.mimetypes' => __('api/employee/error.mimetype_valid'),
        ];
    }

    public function failedValidation($validator)
    {
        // return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
