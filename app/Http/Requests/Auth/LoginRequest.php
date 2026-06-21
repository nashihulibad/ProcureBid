<?php

namespace App\Http\Requests\Auth;

use App\Support\AuthValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return AuthValidationRules::login();
    }
}
