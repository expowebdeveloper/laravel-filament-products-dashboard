<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserCannotCreateProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_cannot_create_product()
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        Sanctum::actingAs($user, ['*']);

        $payload = [
            'name' => 'Bad Product',
            'price' => 5.00,
            'stock' => 10,
            'status' => 'active',
        ];

        $this->postJson('/api/products', $payload)
            ->assertStatus(403); // Forbidden

        $this->assertDatabaseMissing('products', [
            'name' => 'Bad Product',
        ]);
    }
}
