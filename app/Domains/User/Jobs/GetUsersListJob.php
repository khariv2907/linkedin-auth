<?php

namespace App\Domains\User\Jobs;

use App\Data\Models\User;
use App\Data\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Lucid\Units\Job;

class GetUsersListJob extends Job
{
    /**
     * Execute the job.
     *
     * @return User[]|Collection
     */
    public function handle(UserRepositoryInterface $userRepository): Collection|array
    {
        return $userRepository->all();
    }
}
