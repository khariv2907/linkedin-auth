<?php

namespace App\Features\Auth;

use App\Domains\Auth\Jobs\LogoutUserJob;
use Illuminate\Http\RedirectResponse;
use Lucid\Units\Feature;

class LogoutFeature extends Feature
{
    /**
     * @return RedirectResponse
     */
    public function handle(): RedirectResponse
    {
        $this->run(new LogoutUserJob);

        return redirect()->route('home');
    }
}
