<?php

namespace App\Http\Controllers;

use App\Features\HomeFeature;
use Lucid\Units\Controller;

class HomeController extends Controller
{
    /**
     * Login Form
     *
     * @return mixed
     */
    public function index(): mixed
    {
        return $this->serve(HomeFeature::class);
    }
}
