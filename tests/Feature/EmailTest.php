<?php

namespace Tests\Feature;

use App\Mail\NewUserMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EmailTest extends TestCase
{
    /**
     * Test email sending.
     *
     * @return void
     */
    public function testEmailIsSent()
    {
        Mail::fake();

        // Assuming 'user_name' is the username of the user
        $user_name = 'test_user';

        // Send the email
        Mail::to('dummyemail@example.com')->send(new NewUserMail($user_name));

        // Assert the email was sent to the given users...
        Mail::assertSent(NewUserMail::class, function ($mail) use ($user_name) {
            return $mail->userName === $user_name &&
                $mail->hasTo('dummyemail@example.com');
        });
    }
}
