<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    protected $errorBag = 'user';
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4|',
            'password_confirmation' => 'required|min:4|same:password',
        ];
    }

    /**
     * Validation messages for add new user
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'user_name.required' => 'Имя обязательно для заполнения',
            'email.required' => 'Email обязателен для заполнения',
            'email.email' => 'Некорректный формат email',
            'email.unique' => 'Пользователь с таким email уже зарегистрирован',
            'password.required' => 'Пароль обязателен для заполнения',
            'password.min' => 'Пароль должен быть не менее :min символов',
            'password_confirmation.required' => 'Подтвердите пароль',
            'password_confirmation.min' => 'Пароль должен быть не менее :min символов',
            'password_confirmation.same' => 'Пароль не совпадает'
        ];
    }

}
