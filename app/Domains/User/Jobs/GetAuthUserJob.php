<?php

namespace App\Domains\USer\Jobs;

use App\Data\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Lucid\Units\Job;

class GetAuthUserJob extends Job
{
    /**
     * Execute the job.
     *
     * @return User|Authenticatable|null
     */
    public function handle(): User|Authenticatable|null
    {
        return Auth::user();
    }
}
