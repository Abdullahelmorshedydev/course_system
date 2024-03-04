<?php

namespace App\Http\Requests\Api\Employee\Course;

use App\Traits\TranslateTrait;
use App\Enums\CourseStatusEnum;
use App\Enums\DiscountTypeEnum;
use App\Enums\DurationTypeEnum;
use Illuminate\Validation\Rule;
use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class CourseUpdateRequest extends FormRequest
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
            'name' => TranslateTrait::translate($this->name_en, $this->name_ar),
            'slug' => TranslateTrait::translate($this->name_en, $this->name_ar, true),
            'description' => TranslateTrait::translate($this->description_en, $this->description_ar),
        ]);
    }

    public function rules(): array
    {
        return [
            'name_en' => ['required', 'string', Rule::unique('courses', 'name->en')->ignore($this->course), 'min:3', 'max:255'],
            'name_ar' => ['required', 'string', Rule::unique('courses', 'name->ar')->ignore($this->course), 'min:3', 'max:255'],
            'name' => ['array'],
            'slug' => ['array'],
            'description_en' => ['required', 'string', 'min:3', 'max:255'],
            'description_ar' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['array'],
            'price' => ['required', 'numeric', 'min:1'],
            'discount' => ['nullable', 'numeric', 'min:0', function ($attribte, $value, $fail) {
                if (request()->input('discount_type') == 'percent') {
                    if ($value <= 0 || $value > 100) {
                        $fail(__('api/employee/error.discount_percent_valid_max'));
                    }
                } elseif (request()->input('discount_type') == 'fixed') {
                    if ($value > request()->input('price')) {
                        $fail(__('api/employee/error.discount_fixed_valid_max'));
                    }
                }
            }],
            'discount_type' => ['nullable', 'integer', Rule::in(DiscountTypeEnum::cases()), function ($attribte, $value, $fail) {
                if (request()->input('discount') == null) {
                    if ($value != null) {
                        $fail(__('api/employee/error.discount_type_valid_null'));
                    }
                }
            }],
            'duration' => ['required', 'integer', 'min:1'],
            'duration_type' => ['required', 'integer', Rule::in(DurationTypeEnum::cases())],
            'major_id' => ['required', 'exists:majors,id'],
            'status' => ['required', 'integer', Rule::in(CourseStatusEnum::cases())],
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
            'description_en.required' => __('api/employee/error.desciption_en_valid_required'),
            'description_en.string' => __('api/employee/error.desciption_en_valid_string'),
            'description_en.min' => __('api/employee/error.desciption_en_valid_min'),
            'description_en.max' => __('api/employee/error.desciption_en_valid_max'),
            'description_ar.required' => __('api/employee/error.desciption_ar_valid_required'),
            'description_ar.string' => __('api/employee/error.desciption_ar_valid_string'),
            'description_ar.min' => __('api/employee/error.desciption_ar_valid_min'),
            'description_ar.max' => __('api/employee/error.desciption_ar_valid_max'),
            'major_id.required' => __('api/employee/error.major_id_valid_required'),
            'major_id.exists' => __('api/employee/error.major_id_valid_exists'),
            'price.required' => __('api/employee/error.price_valid_required'),
            'price.numeric' => __('api/employee/error.price_valid_numeric'),
            'price.min' => __('api/employee/error.price_valid_min'),
            'price.required' => __('api/employee/error.price_valid_required'),
            'discount.numeric' => __('api/employee/error.discount_valid_numeric'),
            'discount.min' => __('api/employee/error.discount_valid_min'),
            'discount_type.integer' => __('api/employee/error.discount_type_valid_integer'),
            'discount_type.rule' => __('api/employee/error.discount_type_valid_rule'),
            'duration.required' => __('api/employee/error.duration_valid_required'),
            'duration.integer' => __('api/employee/error.duration_valid_integer'),
            'duration.min' => __('api/employee/error.duration_valid_min'),
            'duration.required' => __('api/employee/error.duration_valid_required'),
            'duration_type.integer' => __('api/employee/error.duration_type_valid_integer'),
            'duration_type.rule' => __('api/employee/error.duration_type_valid_rule'),
            'status.required' => __('api/employee/error.status_valid_required'),
            'status.integer' => __('api/employee/error.status_valid_integer'),
            'status.rule' => __('api/employee/error.status_valid_rule'),
        ];
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
