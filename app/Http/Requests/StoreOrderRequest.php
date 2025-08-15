<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'costumer_name' => 'required|string|max:50',
            'costumer_surname' => 'required|string|max:50',
            'phone_number' => 'required|string|max:13',
            'delivery' => 'required|string|max:255',
        ];
    }

    /**
     * Validate messages order
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'costumer_name.required' => 'Поле обязательно для заполнения',
            'costumer_name.max' => 'Максимальное количество символов в имени 50',
            'costumer_surname.required' => 'Поле обязательно для заполнения',
            'costumer_surname.max' => 'Максимальное количество символов в фамилии 50',
            'phone_number.required' => 'Поле обязательно для заполнения',
            'phone_number.max' => 'Некорректный номер телефона',
            'delivery.required' => 'Поле обязательно для заполнения'
        ];
    }
}
