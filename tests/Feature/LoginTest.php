<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     */

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        User::create([
            "name" => "Yakubu Abiola",
            "email" => "yakubu.abiol@yahoo.com",
            "password" => bcrypt('12!@qwQW')
        ]);
    }

    public function testWrongLoginCredentials()
    {
        $data = [
            "email" => 'yakubu.abiol@yahoo.com',
            "password" => "12!@qwQWw",
        ];

        $response = $this->json('POST', '/api/login', $data);

        $response->assertJsonStructure(['status', 'message', 'data']);
        $response->assertJsonFragment(['status' => 'Error', 'message' => 'Invalid Password']);
        $response->assertStatus(400);
    }

    public function testRightLoginCredentials()
    {
        $data = [
            "email" => 'yakubu.abiol@yahoo.com',
            "password" => "12!@qwQW",
        ];
        $response = $this->json('POST', '/api/login', $data);

        $response->assertJsonStructure(['status', 'message', 'data']);
        $response->assertStatus(200, $response);
    }
}
