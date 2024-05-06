<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMenuRequest extends FormRequest
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
            'menu_name' => 'required',
            'menu_img' => 'nullable|mimes:jpeg,jpg,png,gif|max:5120'
            // 'menu_img' => $this->getValidationRule('article_img')
        ];
    }

    // public function getValidationRule(String $key): string
    // {
    //     if (request()->hasFile($key)) {
    //         return "required|max:5120|image|mimes:jpg,png,jpeg";
    //     }
    //     return "nullable|string";
    // }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'menu_name.required' => 'Menu name is required',
            'menu_img.max' => 'Max size of image exceeded, max size of file: 5mb',
            'menu_img.mimes' => 'Incorrect file type'
        ];
    }
}
