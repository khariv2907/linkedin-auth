<?php

namespace Tests\Features\User;

use Tests\TestCases\UserTestCase;

class UsersListFeatureTest extends UserTestCase
{
    public function testUsersListFeature()
    {
        $response = $this->get(route(self::USERS_ROUTE));

        $response->assertOk();
        $response->assertViewIs('users.index');
        $response->assertViewHas(['users', 'pageTitle']);
    }
}
