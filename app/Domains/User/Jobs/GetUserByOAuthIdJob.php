<?php

namespace App\Domains\User\Jobs;

use App\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Data\Models\User;
use Lucid\Units\Job;

class GetUserByOAuthIdJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $userId
    ) {}

    /**
     * Execute the job.
     *
     * @param UserRepositoryInterface $userRepository
     * @return User|null
     */
    public function handle(UserRepositoryInterface $userRepository): ?User
    {
        return $userRepository->getByOAuthId($this->userId);
    }
}
