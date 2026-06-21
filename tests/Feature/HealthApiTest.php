<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthApiTest extends TestCase
{
    public function test_health_endpoint_returns_expected_envelope(): void
    {
        $response = $this->getJson('/api/health');

        $response->assertOk()
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'status',
                    'service',
                    'timestamp',
                ],
            ])
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.status', 'ok');
    }
}
