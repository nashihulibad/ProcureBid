<?php

namespace App\Livewire\Pages\Auth;

use App\Actions\Auth\AuthenticateUser;
use App\Support\AuthValidationRules;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Login')]
class Login extends Component
{
    public string $email = '';

    public string $password = '';

    public bool $remember = false;

    protected function rules(): array
    {
        return AuthValidationRules::login();
    }

    public function login(AuthenticateUser $authenticateUser): void
    {
        $validated = $this->validate();
        $user = $authenticateUser->handle($validated['email'], $validated['password']);

        Auth::login($user, $this->remember);
        session()->regenerate();

        $this->redirectRoute('dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.auth.login');
    }
}
