<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteTest extends TestCase
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

    public function testDeleteWrongUser()
    {
        $data = [];

        $response = $this->json('GET', '/api/delete', $data, ['Authorization' => "Bearer {$this->token}"]);

        $response->assertJsonFragment(['message' => 'The GET method is not supported for route api/delete. Supported methods: DELETE.']);
        $response->assertStatus(405);
    }

    public function testDeleteRightUser()
    {
        $data = [];

        $response = $this->json('DELETE', '/api/delete', $data, ['Authorization' => "Bearer {$this->token}"]);

        $response->assertJsonStructure(['status', 'message', 'data']);
        $response->assertJsonFragment(['status' => 'Success', 'message' => 'Account deleted successfully']);
        $response->assertStatus(200);
    }

    private function getToken($userID)
    {
        $user = User::find($userID);

        $token = $user->createToken('token');
        return $token->plainTextToken;
    }
}
