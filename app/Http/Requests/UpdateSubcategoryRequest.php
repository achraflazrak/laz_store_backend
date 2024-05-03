<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubcategoryRequest extends FormRequest
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
            'name_en' => 'required|max:255|unique:subcategories,id,'. $this->id,
            'name_fr' => 'required|max:255|unique:subcategories,id,'. $this->id,
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'The field subcategory name in english is required.',
            'name_fr.required' => 'The field subcategory name in french is required.',
            'name_en.max' => 'The field subcategory name in english must not be greater
            than :max characters.',
            'name_fr.max' => 'The field subcategory name in french must not be greater
            than :max characters.',
            'name_en.unique' => 'You have already updated this subcategory.',
            'name_fr.unique' => 'You have already updated this subcategory.',
            'category_id.required'=> 'The field subcategory is required.',

        ];
    }
}
