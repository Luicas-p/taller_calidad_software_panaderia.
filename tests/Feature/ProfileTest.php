<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    // Constantes para la ruta y datos de prueba
    private const PROFILE_ROUTE = '/profile';
    private const TEST_USER_NAME = 'Test User';
    private const TEST_USER_EMAIL = 'test@example.com';

    public function test_profile_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get(self::PROFILE_ROUTE);

        $response->assertOk();
    }

    public function test_profile_information_can_be_updated(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch(self::PROFILE_ROUTE, [
                'name' => self::TEST_USER_NAME,
                'email' => self::TEST_USER_EMAIL,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(self::PROFILE_ROUTE);

        $user->refresh();

        $this->assertSame(self::TEST_USER_NAME, $user->name);
        $this->assertSame(self::TEST_USER_EMAIL, $user->email);
        $this->assertNull($user->email_verified_at);
    }

    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch(self::PROFILE_ROUTE, [
                'name' => self::TEST_USER_NAME,
                'email' => $user->email,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(self::PROFILE_ROUTE);

        $this->assertNotNull($user->refresh()->email_verified_at);
    }

    public function test_user_can_delete_their_account(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete(self::PROFILE_ROUTE, [
                'password' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/');

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    public function test_correct_password_must_be_provided_to_delete_account(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from(self::PROFILE_ROUTE)
            ->delete(self::PROFILE_ROUTE, [
                'password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrorsIn('userDeletion', 'password')
            ->assertRedirect(self::PROFILE_ROUTE);

        $this->assertNotNull($user->fresh());
    }
}
