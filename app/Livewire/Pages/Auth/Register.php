<?php

namespace App\Livewire\Pages\Auth;

use App\Actions\Auth\RegisterUser;
use App\Support\AuthValidationRules;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Register')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    protected function rules(): array
    {
        return AuthValidationRules::registration();
    }

    protected function messages(): array
    {
        return AuthValidationRules::messages();
    }

    public function register(RegisterUser $registerUser): void
    {
        $user = $registerUser->handle($this->validate());

        Auth::login($user);
        session()->regenerate();

        $this->redirectRoute('dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.auth.register');
    }
}
