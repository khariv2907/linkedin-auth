<?php

namespace Tests\Unit\Domains\User\Jobs;

use App\Data\Models\User;
use App\Domains\User\Jobs\GetUsersListJob;
use Tests\TestCases\TestCase;

class GetUsersListJobTest extends TestCase
{
    public function test_get_users_list_job()
    {
        User::factory()->count(5)->create();

        $users = $this->dispatchSync(new GetUsersListJob());

        $this->assertCount(5, $users);
    }
}
