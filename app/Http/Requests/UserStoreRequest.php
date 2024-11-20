<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'required|string|min:8',
            ];
        } else {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'required|string|min:8',
            ];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        if ($this->isMethod('post')) {
            return [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'password.required' => 'Password is required !',
                'password.min' => 'Password must be at least 8 characters',
            ];
        } else {
            return [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'password.required' => 'Password is required !',
                'password.min' => 'Password must be at least 8 characters',
            ];
        }
    }
}
