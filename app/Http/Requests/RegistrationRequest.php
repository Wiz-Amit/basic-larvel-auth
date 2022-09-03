<?php

namespace App\Http\Requests;

use App\Models\Gender;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)->uncompromised()],
            'first_name' => ['required', 'string', 'max:255'],
            'first_name' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'exists:' . Gender::class . ',id'],
            'country_code' => ['required', 'string', 'max:2'],
            'terms' => ['accepted'],
            'newsletter' => ['boolean'],
        ];
    }
}
