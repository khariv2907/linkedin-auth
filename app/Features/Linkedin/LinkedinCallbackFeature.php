<?php

namespace App\Features\Linkedin;

use App\Data\Enums\SocialiteProvider;
use App\Domains\Auth\Jobs\LoginUserJob;
use App\Domains\Socialite\Jobs\GetSocialiteUserJob;
use App\Domains\User\Jobs\CreateUserWithSocialiteJob;
use App\Domains\User\Jobs\GetUserByOAuthIdJob;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Lucid\Units\Feature;

class LinkedinCallbackFeature extends Feature
{
    /**
     * @return Redirector|Application|RedirectResponse
     */
    public function handle(): Redirector|Application|RedirectResponse
    {
        $linkedinUser = $this->run(new GetSocialiteUserJob());

        if (! $linkedinUser) {
            return redirect()
                ->route('home')
                ->withErrors(['Can\'t get LinkedIn user.']);
        }

        $oAuthId = Arr::get($linkedinUser, 'id');

        $user = $this->run(new GetUserByOAuthIdJob($oAuthId));

        if (! $user) {
            $user = $this->run(new CreateUserWithSocialiteJob($linkedinUser, SocialiteProvider::Linkedin()));

            if (! $user) {
                return redirect()
                    ->route('home')
                    ->withErrors(['Can\'t create new user.']);
            }
        }
        $this->run(new LoginUserJob($user));

        return redirect()->route('home');
    }
}
