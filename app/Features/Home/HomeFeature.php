<?php

namespace App\Features\Home;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Seo\Jobs\GetDefaultTitleJob;
use App\Domains\USer\Jobs\GetAuthUserJob;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class HomeFeature extends Feature
{
    public function handle(Request $request)
    {
        $user = $this->run(new GetAuthUserJob);
        $pageTitle = $this->run(new GetDefaultTitleJob('Home'));

        return $this->run(new RespondWithViewJob('home.index', [
            'user' => $user,
            'pageTitle' => $pageTitle,
        ]));
    }
}
