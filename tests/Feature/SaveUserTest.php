<?php
namespace Tests\Feature;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class SaveUserTest extends TestCase
{
    /** @test */
    public function it_can_save_a_user()
    {
        // Mock the logging facade
        Log::shouldReceive('info')->once()->with('User created', [
            'email' => 'test@example.com',
            'firstName' => 'John',
            'lastName' => 'Doe',
        ]);

        // Simulate creating a user
        $this->post('/api/users', [
            'email' => 'test@example.com',
            'firstName' => 'John',
            'lastName' => 'Doe',
        ])->assertJson(['message' => 'User created successfully']);
    }
}
