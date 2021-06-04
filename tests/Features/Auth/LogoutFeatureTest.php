<?php

namespace Tests\Features\Auth;

use App\Data\Models\User;
use Tests\TestCases\AuthTestCase;

class LogoutFeatureTest extends AuthTestCase
{
    public function testLogoutFeature()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get(route(self::LOGOUT_ROUTE));

        $response->assertRedirect(route(self::HOME_ROUTE));
        $this->assertGuest();
    }
}
