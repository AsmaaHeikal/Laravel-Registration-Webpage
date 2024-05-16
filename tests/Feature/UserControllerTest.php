<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UserControllerTest extends TestCase
{
    //use WithFaker;  
    use RefreshDatabase;

    /**
     * Test user registration and database insertion.
     *
     * @return void
     */
    public function test_database_insertion_image_saving()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('test.jpg');

        $formData = [
            'n' => 'Full Name',
            'u' => 'Username',
            'birthdate' => '2000-01-01',
            'm' => '01234567890',
            'p' => 'password123',
            'p_confirmation' => 'password123',
            'add' => 'address',
            'e' => 'mail@example.com',
            'pic' => $file,
        ];

        $response = $this->postJson('/Registration', $formData);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Registration successful!']);

        // Check if the success message is displayed in the response content
        $this->assertStringContainsString('Registration successful!', $response->getContent());    

        // Get the user that was inserted into the database
        $user = User::where('email', 'mail@example.com')->first();

        // Assert the user was stored...
        $this->assertNotNull($user);

        // Check the password
        $this->assertTrue(Hash::check('password123', $user->password));
    
    }
}