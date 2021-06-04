<?php

namespace App\Domains\Socialite\Jobs;

use App\Data\ThirdPartyServices\LinkedinService;
use Lucid\Units\Job;

class GetSocialiteUserJob extends Job
{
    /**
     * Execute the job.
     *
     * @param LinkedinService $socialite
     * @return array
     */
    public function handle(LinkedinService $socialite): array
    {
        return $socialite->getUserInfoAsArray();
    }
}
