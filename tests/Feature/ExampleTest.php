<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_api_without_a_token_returns_a_clear_unauthenticated_response(): void
    {
        $response = $this->get('/api/products');

        $response->assertUnauthorized()
            ->assertExactJson([
                'status' => 'error',
                'message' => 'Silakan login terlebih dahulu untuk mengakses endpoint ini.',
            ]);
    }
}
