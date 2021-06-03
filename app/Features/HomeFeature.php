<?php

namespace App\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Seo\Jobs\GetDefaultTitleJob;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class HomeFeature extends Feature
{
    public function handle(Request $request)
    {
        $pageTitle = $this->run(new GetDefaultTitleJob('Home'));

        return $this->run(new RespondWithViewJob('home.index', compact('pageTitle')));
    }
}
