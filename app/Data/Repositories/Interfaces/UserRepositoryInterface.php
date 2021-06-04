<?php


namespace App\Data\Repositories\Interfaces;


use App\Data\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    /**
     * @return User[]|Collection
     */
    public function all(): Collection|array;

    /**
     * @param string $oAuthId
     * @return User|null
     */
    public function getByOAuthId(string $oAuthId): ?User;
}
