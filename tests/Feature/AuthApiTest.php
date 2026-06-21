<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\PersonalAccessToken;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_through_versioned_api(): void
    {
        $response = $this->postJson('/api/v1/auth/register', [
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'Password123!@#',
            'password_confirmation' => 'Password123!@#',
        ]);

        $response->assertCreated()
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.user.email', 'admin@example.com');

        $this->assertDatabaseHas('users', ['email' => 'admin@example.com']);
    }

    public function test_login_issues_expiring_scoped_token(): void
    {
        User::factory()->create([
            'email' => 'login@example.com',
            'password' => bcrypt('Password123!@#'),
        ]);

        $response = $this->postJson('/api/v1/auth/login', [
            'email' => 'login@example.com',
            'password' => 'Password123!@#',
        ]);

        $response->assertOk()
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.token_type', 'Bearer')
            ->assertJsonStructure(['data' => ['token', 'expires_at', 'user']]);

        $accessToken = PersonalAccessToken::query()->firstOrFail();

        $this->assertNotNull($accessToken->expires_at);
        $this->assertSame(['profile:read'], $accessToken->abilities);
    }

    public function test_bearer_token_can_access_profile_and_be_revoked(): void
    {
        $user = User::factory()->create();
        $plainTextToken = $user
            ->createToken('feature-test', ['profile:read'], now()->addHour())
            ->plainTextToken;

        $this->withToken($plainTextToken)
            ->getJson('/api/v1/auth/me')
            ->assertOk()
            ->assertJsonPath('data.user.id', $user->id);

        $this->withToken($plainTextToken)
            ->postJson('/api/v1/auth/logout')
            ->assertOk();

        $this->assertDatabaseCount('personal_access_tokens', 0);
        auth()->forgetGuards();

        $this->withToken($plainTextToken)
            ->getJson('/api/v1/auth/me')
            ->assertUnauthorized();
    }

    public function test_unversioned_auth_endpoint_remains_compatible(): void
    {
        $this->postJson('/api/auth/register', [
            'name' => 'Legacy Client',
            'email' => 'legacy@example.com',
            'password' => 'Password123!@#',
            'password_confirmation' => 'Password123!@#',
        ])->assertCreated();
    }
}
