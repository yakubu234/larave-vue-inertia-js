<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdatePasswordTest extends TestCase
{
    use DatabaseMigrations;

    private $token, $user;
    /**
     * A basic feature test example.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // $this->withoutExceptionHandling();

        $this->user = User::create([
            "name" => "Yakubu Abiola",
            "email" => "yakubu.abiol@yahoo.com",
            "password" => bcrypt('12!@qwQW')
        ]);

        $this->token = $this->getToken($this->user->id);
    }

    public function testUpdatePasswordWrong()
    {
        $data = [
            "password" => '12!@qwQWww',
            "confirm_password" => "12!@qwQWw",
        ];

        $response = $this->json('PUT', '/api/update-password', $data, ['Authorization' => "Bearer {$this->token}"]);

        $response->assertJsonFragment(['message' => 'Confrim Password must be the same as password']);
        $response->assertJsonStructure(['errors', 'message']);
        $response->assertStatus(422, $response); // validation error code

    }

    public function testUpdatePasswordCorrect()
    {
        $data = [
            "confirm_password" => '12!@qwQW838',
            "password" => "12!@qwQW838",
        ];

        $response = $this->json('PUT', '/api/update-password', $data, ['Authorization' => "Bearer {$this->token}"]);

        $response->assertJsonStructure(['status', 'message', 'data']);
        $response->assertJsonFragment(['status' => 'Success', 'message' => 'password updated successfully']);
        $response->assertStatus(200);
    }

    private function getToken($userID)
    {
        $user = User::find($userID);

        $token = $user->createToken('token');
        return $token->plainTextToken;
    }
}
