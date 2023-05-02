<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
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

    public function testLogutCorrectCredential()
    {
        $data = [
            "email" => 'yakubu.abiol@yahoo.com',
            "password" => "12!@qwQW",
        ];
        $response =  $this->json('POST', '/api/logout', $data, ['Authorization' => "Bearer {$this->token}"]);

        $response->assertJsonStructure(['status', 'message', 'data']); //

        $response->assertJsonFragment(['status' => 'Success', 'message' => 'logout successful']);
        $response->assertStatus(200, $response);
    }


    public function testLogutWrongCredential()
    {
        $data = [];
        $response =  $this->json('POST', '/api/logout', $data, ['Authorization' => "Bearer {$this->token}oooe"]);

        $response->assertJsonFragment(['message' => 'Unauthenticated.']);
        $response->assertStatus(401, $response);
    }

    private function getToken($userID)
    {
        $user = User::find($userID);

        $token = $user->createToken('token');
        return $token->plainTextToken;
    }
}
