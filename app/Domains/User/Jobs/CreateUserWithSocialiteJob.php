<?php

namespace App\Domains\User\Jobs;

use App\Data\Enums\SocialiteProvider;
use App\Data\Models\User;
use Lucid\Units\Job;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class CreateUserWithSocialiteJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private SocialiteUser $user,
        private SocialiteProvider $provider
    ) { }

    /**
     * Execute the job.
     *
     * @return User|null
     */
    public function handle(): ?User
    {
        $user = User::create([
            'name' => $this->user->name,
            'email' => $this->user->email,
            'oauth_id' => $this->user->id,
            'oauth_type' => $this->provider->value,
            'password' => encrypt('secret')
        ]);

        if (! $user) {
            return null;
        }

        return $user;
    }
}
