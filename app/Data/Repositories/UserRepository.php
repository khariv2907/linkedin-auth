<?php


namespace App\Data\Repositories;

use App\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Data\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @return User[]|Collection
     */
    public function all(): Collection|array
    {
        return User::all();
    }

    /**
     * @param string $oAuthId
     * @return User|null
     */
    public function getByOAuthId(string $oAuthId): ?User
    {
        return User::where('oauth_id', $oAuthId)->first();
    }
}
