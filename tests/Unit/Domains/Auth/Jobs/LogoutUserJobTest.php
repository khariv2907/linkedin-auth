<?php

namespace Tests\Unit\Domains\Auth\Jobs;

use App\Data\Models\User;
use App\Domains\Auth\Jobs\LogoutUserJob;
use Tests\TestCases\TestCase;

class LogoutUserJobTest extends TestCase
{
    public function testLogoutUserJob()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->dispatchSync(new LogoutUserJob());

        $this->assertGuest();
    }
}
