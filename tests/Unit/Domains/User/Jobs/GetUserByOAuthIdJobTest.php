<?php

namespace Tests\Unit\Domains\User\Jobs;

use App\Data\Models\User;
use App\Domains\User\Jobs\GetUserByOAuthIdJob;
use Tests\TestCases\TestCase;

class GetUserByOAuthIdJobTest extends TestCase
{
    public function testGetUserByOAuthIdJob()
    {
        $oauthId = '123';

        /** @var User $user */
        User::factory()->create([
            'id' => 1,
            'oauth_id' => $oauthId,
        ]);

        $user = $this->dispatchSync(new GetUserByOAuthIdJob($oauthId));

        $this->assertEquals(1, $user->id);
        $this->assertEquals($oauthId, $user->oauth_id);
    }
}
