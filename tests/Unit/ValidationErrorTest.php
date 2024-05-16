<?php
namespace Tests\Unit;

use Tests\TestCase;

class ValidationErrorTest extends TestCase
{
    public function testValidationErrorTest()
{
    $response = $this->postJson('/Registration', [
        'm' => '0123456789',
        'p' => 'password123',
        'p_confirmation' => 'password12',
    ]);

    $response->assertStatus(422) // Unprocessable Entity
        ->assertJson([
            'errors' => [
                'm' => ['This Phone Number must be at least 11 characters.'], 
                'p' => ['The Password confirmation does not match.']

            ]
        ]);
}
}
