<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class JobsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_job()
    {
        $this->authenticateUser();
        $response = $this->post('/api/jobs', [
            "title" => "test job",
            "description" => null,
        ]);

        $response->assertStatus(201);
    }
    public function test_update_job()
    {
        $this->authenticateUser();
        $response = $this->post('/api/jobs', [
            "title" => "test job",
            "description" => null,
        ]);
        $id = $response->baseResponse->original->id;
        $response = $this->put('/api/jobs/'.$id, [
            "title" => "test job",
            "description" => null,
        ]);
        $response->assertStatus(200);
    }
    public function authenticateUser()
    {
        $user = User::factory()->create();
        Passport::actingAs($user, [], "user");
    }
}
