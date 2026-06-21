<?php

namespace App\Http\Requests\Auth;

use App\Support\AuthValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return AuthValidationRules::registration();
    }

    public function messages(): array
    {
        return AuthValidationRules::messages();
    }
}
