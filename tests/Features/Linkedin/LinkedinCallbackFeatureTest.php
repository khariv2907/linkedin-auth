<?php

namespace Tests\Features\Linkedin;

use App\Data\Enums\SocialiteProvider;
use App\Data\ThirdPartyServices\LinkedinService;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Mockery;
use Tests\TestCases\LinkedinTestCase;

class LinkedinCallbackFeatureTest extends LinkedinTestCase
{
    public function testLinkedinCallbackFeature()
    {
        // mock LinkedIn user info
        $this->partialMock(LinkedinService::class, function ( $mock) {
           $mock->shouldReceive('getUserInfoAsArray')->andReturn([
               'id' => '123',
               'name' => 'Test Name',
               'email' => 'example@gmail.com',
           ]);
        });

        $response = $this->get(route(self::CALLBACK_ROUTE));

        $response->assertRedirect();
        $response->assertSessionDoesntHaveErrors();
        $this->assertAuthenticated();

        $this->assertDatabaseHas('users', [
            'name' => 'Test Name',
            'email' => 'example@gmail.com',
            'oauth_id' => '123',
            'oauth_type' => SocialiteProvider::Linkedin
        ]);
    }
}
