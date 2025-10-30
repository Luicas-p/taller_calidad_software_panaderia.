<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

// Clase para centralizar todas las rutas
class Routes
{
    public const LOGIN = '/login';
    public const HOME = '/home';
    public const CONFIRM_PASSWORD = '/confirm-password';
    public const FORGOT_PASSWORD = '/forgot-password';
    public const PROFILE = '/profile';
    public const LOGOUT = '/logout';
}

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get(Routes::LOGIN);
        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create();

        $response = $this->post(Routes::LOGIN, [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post(Routes::LOGIN, [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(Routes::LOGOUT);

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}

class LoginTest extends TestCase
{
    private const HOME_ROUTE = Routes::HOME;

    public function test_login_page_is_accessible()
    {
        $response = $this->get(Routes::LOGIN);
        $response->assertStatus(200);
    }

    public function test_login_redirects_authenticated_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(Routes::LOGIN);
        $response->assertRedirect(self::HOME_ROUTE);
    }
}

class ConfirmPasswordTest extends TestCase
{
    public function test_confirm_password_page_is_accessible()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(Routes::CONFIRM_PASSWORD);
        $response->assertStatus(200);
    }

    public function test_confirm_password_redirects_guest()
    {
        $response = $this->get(Routes::CONFIRM_PASSWORD);
        $response->assertRedirect(Routes::LOGIN);
    }
}

class ForgotPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_forgot_password_page_is_accessible()
    {
        $response = $this->get(Routes::FORGOT_PASSWORD);
        $response->assertStatus(200);
    }

    public function test_forgot_password_redirects_authenticated_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(Routes::FORGOT_PASSWORD);
        $response->assertRedirect(Routes::HOME);
    }
}

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_accessible()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get(Routes::PROFILE);

        $response->assertStatus(200);
    }

    public function test_redirects_to_profile_after_update()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post(Routes::PROFILE, [
                'name' => 'Nuevo Nombre',
                'email' => $user->email,
            ]);

        $response->assertRedirect(Routes::PROFILE);
    }

    public function test_profile_edit_page_is_accessible()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get(Routes::PROFILE . '/edit');

        $response->assertStatus(200);
    }
}
