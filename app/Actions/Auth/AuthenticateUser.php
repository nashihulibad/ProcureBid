<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticateUser
{
    public function handle(string $email, string $password): User
    {
        $user = User::query()
            ->where('email', mb_strtolower($email))
            ->first();

        if (! $user || ! Hash::check($password, $user->password) || ! $user->is_active) {
            throw ValidationException::withMessages([
                'email' => ['Kredensial yang diberikan tidak sesuai.'],
            ]);
        }

        $user->forceFill(['last_login_at' => now()])->save();

        return $user;
    }
}
