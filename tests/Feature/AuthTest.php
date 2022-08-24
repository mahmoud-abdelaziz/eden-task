<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        $testEmail = "test@email.com";
        $testPassword = "user@123";
        User::factory()->create([
            "name" => "Test",
            "email" => $testEmail,
            "password" => $testPassword,
            "role" => "Admin",
        ]);
        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])->post("/api/login",[
            "email" => $testEmail,
            "password" => $testPassword,
        ]);

        $response->assertStatus(200);
    }
}
