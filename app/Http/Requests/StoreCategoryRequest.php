<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    protected $errorBag = 'category';

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
            'category_name' => 'required|string|max:50|unique:categories,name',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5124'
        ];
    }

    /**
     * Validate messages for add category
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'category_name.unique' => 'Категория с таким названием уже существует',
            'category_name.required' => 'Название категории обязательно',
            'image.required' => 'Изображение обязательно',
            'image.image' => 'Файл должен быть изображением',
            'image.mimes' => 'Допустимые форматы: jpg, jpeg, png, webp',
            'image.max' => 'Максимальный размер изображения  5MB',
        ];
    }
}
