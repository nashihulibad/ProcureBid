<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterUser
{
    /**
     * @param  array{name: string, email: string, password: string}  $attributes
     */
    public function handle(array $attributes): User
    {
        return DB::transaction(fn (): User => User::create([
            'name' => $attributes['name'],
            'email' => mb_strtolower($attributes['email']),
            'password' => Hash::make($attributes['password']),
        ]));
    }
}
