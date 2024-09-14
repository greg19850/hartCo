<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
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
            'question' => 'required|min:5',
            'answer' => 'required|min:5',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'question.required' => 'Question field can\'t be empty',
            'question.min' => 'Question must be minimum of 5 characters',
            'answer.required' => 'Answer field can\'t be empty',
            'answer.min' => 'Answer must be minimum of 5 characters',
        ];
    }
}
