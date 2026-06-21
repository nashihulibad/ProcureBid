<?php

namespace Tests\Feature;

use App\Livewire\Pages\Auth\Login;
use App\Livewire\Pages\Auth\Register;
use App\Livewire\Pages\Dashboard;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LivewireAuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_guest_can_open_livewire_auth_pages(): void
    {
        $this->get('/login')->assertOk();
        $this->get('/register')->assertOk();
    }

    public function test_user_can_register_through_livewire(): void
    {
        Livewire::test(Register::class)
            ->set('name', 'Livewire User')
            ->set('email', 'livewire@example.com')
            ->set('password', 'Password123!@#')
            ->set('password_confirmation', 'Password123!@#')
            ->call('register')
            ->assertHasNoErrors()
            ->assertRedirect(route('dashboard'));

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'livewire@example.com']);
    }

    public function test_user_can_login_and_logout_through_livewire(): void
    {
        $user = User::factory()->create([
            'email' => 'web@example.com',
            'password' => bcrypt('Password123!@#'),
        ]);

        Livewire::test(Login::class)
            ->set('email', 'web@example.com')
            ->set('password', 'Password123!@#')
            ->call('login')
            ->assertHasNoErrors()
            ->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($user);

        Livewire::test(Dashboard::class)
            ->call('logout')
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }
}
