<?php

namespace App\Domains\Auth\Jobs;

use Illuminate\Support\Facades\Auth;
use Lucid\Units\Job;

class LogoutUserJob extends Job
{
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Auth::logout();
    }
}
