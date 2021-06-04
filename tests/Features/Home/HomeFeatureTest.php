<?php

namespace Tests\Features\Home;

use Tests\TestCases\HomeTestCase;

class HomeFeatureTest extends HomeTestCase
{
    public function testHomeFeature()
    {
        $response = $this->get(route(self::HOME_ROUTE));

        $response->assertOk();
        $response->assertViewIs('home.index');
        $response->assertViewHas(['user', 'pageTitle']);
    }
}
