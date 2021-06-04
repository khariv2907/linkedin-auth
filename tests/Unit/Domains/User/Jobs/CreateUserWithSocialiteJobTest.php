<?php

namespace Tests\Unit\Domains\User\Jobs;

use App\Data\Enums\SocialiteProvider;
use App\Domains\User\Jobs\CreateUserWithSocialiteJob;
use Tests\TestCases\TestCase;

class CreateUserWithSocialiteJobTest extends TestCase
{
    public function testCreateUserWithSocialiteJob()
    {
        $data = [
            'id' => '123',
            'name' => 'Test Name',
            'email' => 'example@gmail.com',
        ];

        $this->dispatchSync(new CreateUserWithSocialiteJob($data, SocialiteProvider::Linkedin()));

        $this->assertDatabaseHas('users', [
            'oauth_id' => '123',
            'oauth_type' => SocialiteProvider::Linkedin,
            'name' => 'Test Name',
            'email' => 'example@gmail.com',
        ]);
    }
}
