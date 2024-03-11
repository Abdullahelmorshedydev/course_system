<?php

namespace App\Http\Requests\Api\Employee\Feedback;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class FeedbackUpdateRequest extends FormRequest
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
        if (request()->input('message') == null) {
            $this->merge([
                'message' => 'no feedback for you',
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'session_id' => ['required', 'exists:sessions,id'],
            'message' => ['required', 'string', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => __('api/employee/error.student_valid_required'),
            'user_id.exists' => __('api/employee/error.student_valid_exists'),
            'session_id.required' => __('api/employee/error.session_valid_required'),
            'session_id.exists' => __('api/employee/error.session_valid_exists'),
            'message.required' => __('api/employee/error.message_valid_required'),
            'message.string' => __('api/employee/error.message_valid_string'),
            'message.min' => __('api/employee/error.message_valid_min'),
        ];
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
