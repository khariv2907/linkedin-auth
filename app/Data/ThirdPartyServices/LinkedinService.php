<?php


namespace App\Data\ThirdPartyServices;


use App\Data\Enums\SocialiteProvider;
use Illuminate\Support\Arr;
use Laravel\Socialite\Facades\Socialite;

class LinkedinService
{
    /**
     * Get formatted user info.
     *
     * @return array
     */
    public function getUserInfoAsArray(): array
    {
        $linkedinUser = Socialite::driver(SocialiteProvider::Linkedin)->user();

        if (empty($linkedinUser)) {
            return [];
        }

        return $this->getFilteredUserInfo((array) $linkedinUser);
    }

    /**
     * Filters socialite user info to retrieve only useful information
     *
     * @param array $userInfo
     * @return array
     */
    protected function getFilteredUserInfo(array $userInfo): array
    {
        return Arr::only($userInfo, [
            'id',
            'email',
            'name',
        ]);
    }
}
