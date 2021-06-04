<?php

namespace App\Http\Controllers;

use App\Features\Home\HomeFeature;
use Lucid\Units\Controller;

class HomeController extends Controller
{
    /**
     * Home Page
     *
     * @return mixed
     */
    public function index(): mixed
    {
        return $this->serve(HomeFeature::class);
    }
}
