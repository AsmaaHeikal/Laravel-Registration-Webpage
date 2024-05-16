<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;

class UniqueUserIdTest extends TestCase
{
    use WithFaker;

    /**
     * Test user registration validation.
     *
     * @return void
     */
    public function testUniqueUserId()
    {

    $file = UploadedFile::fake()->image('test.jpg');
    
    //Create user with username already existing in the database
    $response = $this->postJson('/Registration', [
        'n' => 'Test User',
        'u' => 'Username', // same as existing user
        'birthdate' => '2000-01-01',
        'm' => '01234567890',
        'p' => 'password123',
        'p_confirmation' => 'password123',
        'pic' => $file,
        'add' => 'Test',
        'e' => 'test2@example.com',
    ]);

    // Assert that the response status is 422 (Unprocessable Entity)
    $response->assertStatus(422);

    // Assert that the error message for the 'u' field is in the response
    $response->assertJsonValidationErrors([
        'u' => 'The Username field must be unique'
    ]);
    }

}
