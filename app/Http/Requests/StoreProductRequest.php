<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name_en' => 'required|max:255|unique:products',
            'name_fr' => 'required|max:255|unique:products',
            'qty' => 'required',
            'selling_price' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'color_en' => 'required|max:255',
            'color_fr' => 'required|max:255',
            'size_en' => 'max:255',
            'size_fr' => 'max:255',
            'tag_en' => 'max:255',
            'tag_fr' => 'max:255',
            'desc_en' => 'required',
            'desc_fr' => 'required',
            'product_thumbnail' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'product_image_1' => 'image|mimes:png,jpg,jpeg|max:2048',
            'product_image_2' => 'image|mimes:png,jpg,jpeg|max:2048',
            'product_image_3' => 'image|mimes:png,jpg,jpeg|max:2048',

        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'The field product name in english is required.',
            'name_fr.required' => 'The field product name in french is required.',
            'name_en.max' => 'The field product name in english must not be greater
            than :max characters.',
            'name_fr.max' => 'The field product name in french must not be greater
            than :max characters.',
            'name_en.unique' => 'You have already added this product.',
            'name_fr.unique' => 'You have already added this product.',
            'color_en.required' => 'The field product color in english is required.',
            'color_fr.required' => 'The field product color in french is required.',
            'color_en.max' =>  'The field product color in english must not be greater
            than :max characters.',
            'color_fr.max' => 'The field product color in french must not be greater
            than :max characters.',
            'tag_en.max' =>  'The field product tags in english must not be greater
            than :max characters.',
            'tag_fr.max' => 'The field product tags in french must not be greater
            than :max characters.',
            'size_en.max' =>  'The field product size in english must not be greater
            than :max characters.',
            'size_fr.max' => 'The field product size in french must not be greater
            than :max characters.',
            'desc_en.required' => 'The field product description in english is required.',
            'desc_fr.required' => 'The field product description in french is required.',
            'qty.required' => 'The field product quantity is required.',
            'category_id.required' => 'The field product category is required.',
            'subcategory_id.required' => 'The field product subcategory is required.',
            'selling_price.required' => 'The field product selling price is required.',
            'product_thumbnail.required' => 'The field product thumbnail is required.',
            'product_thumbnail.image' => 'The field product thumbnail must be an image.',
            'product_thumbnail.max' => 'The field product thumbnail must not be greater
            than :max kilobytes.',
            'product_image_1.image' => 'The field product first image must be an image.',
            'product_image_1.max' => 'The field product first image must not be greater
            than :max kilobytes.',
            'product_image_2.image' => 'The field product second image must be an image.',
            'product_image_2.max' => 'The field product second image must not be greater
            than :max kilobytes.',
            'product_image_3.image' => 'The field product third image must be an image.',
            'product_image_3.max' => 'The field product third image must not be greater
            than :max kilobytes.',

        ];
    }

}
