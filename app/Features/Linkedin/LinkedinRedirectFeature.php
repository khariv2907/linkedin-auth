<?php

namespace App\Features\Linkedin;

use App\Data\Enums\SocialiteProvider;
use Laravel\Socialite\Facades\Socialite;
use Lucid\Units\Feature;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LinkedinRedirectFeature extends Feature
{
    /**
     * @return RedirectResponse
     */
    public function handle(): RedirectResponse
    {
        return Socialite::driver(SocialiteProvider::Linkedin)->redirect();
    }
}
