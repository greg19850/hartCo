<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEventRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required',
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
            'name.required' => 'Name field can\'t be empty',
            'date.required' => 'Date field can\'t be empty',
            'image.required' => 'Image field can\'t be empty',
            'image.max' => 'Max size of image exceeded, max size of file: 5mb',
            'image.mimes' => 'Incorrect file type'
        ];
    }

}
