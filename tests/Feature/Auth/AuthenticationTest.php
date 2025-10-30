<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}
class LoginTest extends TestCase
{
    private const LOGIN_ROUTE = '/login';
    private const HOME_ROUTE = '/home';

    public function test_login_page_is_accessible()
    {
        $response = $this->get(self::LOGIN_ROUTE);
        $response->assertStatus(200);
    }

    public function test_login_redirects_authenticated_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(self::LOGIN_ROUTE);
        $response->assertRedirect(self::HOME_ROUTE);
    }
}

class ConfirmPasswordTest extends TestCase
{
    private const CONFIRM_PASSWORD_ROUTE = '/confirm-password';
    private const LOGIN_ROUTE = '/login';

    public function test_confirm_password_page_is_accessible()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(self::CONFIRM_PASSWORD_ROUTE);
        $response->assertStatus(200);
    }

    public function test_confirm_password_redirects_guest()
    {
        $response = $this->get(self::CONFIRM_PASSWORD_ROUTE);
        $response->assertRedirect(self::LOGIN_ROUTE);
    }
}
class ForgotPasswordTest extends TestCase
{
    use RefreshDatabase;

    // Definimos la constante de la ruta
    private const FORGOT_PASSWORD_ROUTE = '/forgot-password';

    public function test_forgot_password_page_is_accessible()
    {
        $response = $this->get(self::FORGOT_PASSWORD_ROUTE);
        $response->assertStatus(200);
    }

    public function test_forgot_password_redirects_authenticated_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(self::FORGOT_PASSWORD_ROUTE);
        $response->assertRedirect('/home');
    }
}
class ProfileTest extends TestCase
{
    use RefreshDatabase;

    // Constante para la ruta /profile
    private const PROFILE_ROUTE = '/profile';

    public function test_profile_page_is_accessible()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get(self::PROFILE_ROUTE);

        $response->assertStatus(200);
    }

    public function test_redirects_to_profile_after_update()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post(self::PROFILE_ROUTE, [
                'name' => 'Nuevo Nombre',
                'email' => $user->email,
            ]);

        $response->assertRedirect(self::PROFILE_ROUTE);
    }

    public function test_profile_edit_page_is_accessible()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get(self::PROFILE_ROUTE . '/edit');

        $response->assertStatus(200);
    }
}
