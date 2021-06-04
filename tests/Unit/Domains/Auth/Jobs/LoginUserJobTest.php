<?php

namespace Tests\Unit\Domains\Auth\Jobs;

use App\Data\Models\User;
use App\Domains\Auth\Jobs\LoginUserJob;
use Tests\TestCases\TestCase;

class LoginUserJobTest extends TestCase
{
    public function testLoginUserJob()
    {
        $user = User::factory()->create();
        $this->dispatchSync(new LoginUserJob($user));

        $this->assertAuthenticated();
    }
}
