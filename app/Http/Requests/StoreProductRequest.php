<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    protected  $errorBag = 'product';
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
            'product_name' => 'required|string|max:255|',
            'description' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5124',
            'price' => 'required|numeric|min:1',
            'category_id' => 'required|exists:categories,id',
        ];
    }


    /**
     * Validate messages product
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'product_name.required' => 'Названия товара обязательно для заполнения',
            'description.required' => 'Описания товара обязательно для заполнения',
            'description.max' => 'Слишком длинное описание товара',
            'image.required' => 'Выберете изображения товара',
            'image.image' => 'Файл должен быть изображением',
            'image.mimes' => 'Допустимые форматы: jpg, jpeg, png,webp',
            'image.max' => 'Максимальный размер изображения 5MB',
            'price.required' => 'Цена товара обязательна для заполнения',
            'price.min' => ' Цена должна быть минимум 1 гр',
            'category_id.required' => 'Товар должен иметь категорию',
        ];
    }

}
