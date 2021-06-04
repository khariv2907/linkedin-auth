<?php

namespace App\Features\User;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Seo\Jobs\GetDefaultTitleJob;
use App\Domains\User\Jobs\GetUsersListJob;
use Illuminate\Http\Response;
use Lucid\Units\Feature;

class UsersListFeature extends Feature
{
    /**
     * @return Response
     */
    public function handle(): Response
    {
        $users = $this->run(new GetUsersListJob);
        $pageTitle = $this->run(new GetDefaultTitleJob('Users'));

        return $this->run(new RespondWithViewJob('users.index', [
            'users' => $users,
            'pageTitle' => $pageTitle,
        ]));
    }
}
