<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     */

    public function setUp(): Void
    {
        parent::setUp();
        // $this->withoutExceptionHandling();
    }

    public function testLandingPage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testUserRegister()
    {
        $data = [
            "name" => "Yakubu Abiola",
            "email" => "yakubu.abiol@yahoo.com",
            "password" => "12!@qwQW",
            "confirm_password" => "12!@qwQW"
        ];

        $response = $this->json('POST', '/api/register', $data);

        $response->assertJsonStructure(['status', 'message', 'data']);
        $response->assertStatus(201, $response);
    }

    public function testEmailTaken()
    {
        $data = [
            "name" => "Yakubu Abiola",
            "email" => "yakubu.abiol@yahoo.com",
            "password" => "12!@qwQW",
            "confirm_password" => "12!@qwQW"
        ];

        User::create($data);

        $response = $this->json('POST', '/api/register', $data);

        $response->assertJsonFragment(['message' => 'Email already exist!']);
        $response->assertJsonStructure(['errors', 'message']);
        $response->assertStatus(422, $response); // validation error code


    }
}
