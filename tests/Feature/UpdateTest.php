<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use DatabaseMigrations;

    private $token, $user;
    /**
     * A basic feature test example.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        $this->user = User::create([
            "name" => "Yakubu Abiola",
            "email" => "yakubu.abiol@yahoo.com",
            "password" => bcrypt('12!@qwQW')
        ]);

        $this->token = $this->getToken($this->user->id);
    }

    public function testUpdateNameWrong()
    {
        $data = [
            "name" => 'Johnson Chuks Emeka',
            "password" => "12!@qwQWw",
        ];

        $response = $this->json('PUT', '/api/update', $data, ['Authorization' => "Bearer {$this->token}"]);

        $response->assertJsonStructure(['status', 'message', 'data']);
        $response->assertJsonFragment(['status' => 'Error', 'message' => 'Invalid Password']);
        $response->assertStatus(401);
    }

    public function testUpdateNameCorrect()
    {
        $data = [
            "name" => 'Johnson Chuks Emeka',
            "password" => "12!@qwQW",
        ];

        $response = $this->json('PUT', '/api/update', $data, ['Authorization' => "Bearer {$this->token}"]);

        $response->assertJsonStructure(['status', 'message', 'data']);
        $response->assertJsonFragment(['status' => 'Success', 'message' => 'record updated successfully']);
        $response->assertStatus(200);
    }

    private function getToken($userID)
    {
        $user = User::find($userID);

        $token = $user->createToken('token');
        return $token->plainTextToken;
    }
}
