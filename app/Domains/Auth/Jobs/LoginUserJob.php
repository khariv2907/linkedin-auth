<?php

namespace App\Domains\Auth\Jobs;

use App\Data\Models\User;
use Illuminate\Support\Facades\Auth;
use Lucid\Units\Job;

class LoginUserJob extends Job
{
    /**
     * LoginUserJob constructor.
     * @param User $user
     */
    public function __construct(
        private User $user
    ) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Auth::login($this->user);
    }
}
