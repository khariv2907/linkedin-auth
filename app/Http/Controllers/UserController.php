<?php

namespace App\Http\Controllers;

use App\Features\HomeFeature;
use Lucid\Units\Controller;

class UserController extends Controller
{
    /**
     * Users List
     *
     * @return mixed
     */
    public function index(): mixed
    {
        return $this->serve(UsersListFeature::class);
    }
}
