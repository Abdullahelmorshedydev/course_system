<?php

namespace App\Http\Requests\Api\Employee\Major;

use Illuminate\Validation\Rule;
use App\Traits\ApiResponseTrait;
use App\Traits\TranslateTrait;
use Illuminate\Foundation\Http\FormRequest;

class MajorStoreRequest extends FormRequest
{
    use ApiResponseTrait, TranslateTrait;

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
            'name_en' => ['required', 'string', Rule::unique('majors', 'name->en'), 'min:3', 'max:255'],
            'name_ar' => ['required', 'string', Rule::unique('majors', 'name->ar'), 'min:3', 'max:255'],
            'major_id' => ['nullable', 'integer', 'exists:majors,id'],
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
            'major_id.integer' => __('api/employee/error.major_id_valid_integer'),
            'major_id.exists' => __('api/employee/error.major_id_valid_exists'),
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'name' => TranslateTrait::translate($this->name_en, $this->name_ar),
            'slug' => TranslateTrait::translate($this->name_en, $this->name_ar, true),
        ]);
    }

    protected function passedValidation()
    {
        $this->merge([
            'name' => TranslateTrait::translate($this->name_en, $this->name_ar),
            'slug' => TranslateTrait::translate($this->name_en, $this->name_ar, true),
        ]);
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
