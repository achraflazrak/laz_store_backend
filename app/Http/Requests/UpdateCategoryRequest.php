<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name_en' => 'required|max:255|unique:categories,id,'. $this->id,
            'name_fr' => 'required|max:255|unique:categories,id,'. $this->id
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'The field category name in english is required.',
            'name_fr.required' => 'The field category name in french is required.',
            'name_en.max' => 'The field category name in english must not be greater
            than :max characters.',
            'name_fr.max' => 'The field category name in french must not be greater
            than :max characters.',
            'name_en.unique' => 'You have already updated this category.',
            'name_fr.unique' => 'You have already updated this category.'
        ];
    }

}
