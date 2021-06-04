<?php

namespace Tests\Unit\Domains\User\Jobs;

use App\Data\Models\User;
use App\Domains\USer\Jobs\GetAuthUserJob;
use Tests\TestCases\TestCase;

class GetAuthUserJobTest extends TestCase
{
    public function testGetAuthUserJob()
    {
        /** @var User $user */
        $user = User::factory()->create([
            'id' => 1
        ]);

        $this->actingAs($user);

        /** @var User $authUser */
        $authUser = $this->dispatchSync(new GetAuthUserJob());

        $this->assertEquals($user->id, $authUser->id);
    }
}
