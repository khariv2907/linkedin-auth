<?php

namespace App\Domains\Socialite\Jobs;

use App\Data\Enums\SocialiteProvider;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;
use Lucid\Units\Job;

class GetSocialiteUserJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private SocialiteProvider $provider
    ) {}

    /**
     * Execute the job.
     *
     * @return SocialiteUser
     */
    public function handle(): SocialiteUser
    {
        return Socialite::driver($this->provider->value)->user();
    }
}
