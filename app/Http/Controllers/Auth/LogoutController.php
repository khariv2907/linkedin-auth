<?php

namespace App\Http\Controllers\Auth;

use App\Features\Auth\LogoutFeature;
use Illuminate\Http\RedirectResponse;
use Lucid\Units\Controller;

class LogoutController extends Controller
{
    /**
     * Logout a user
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        return $this->serve(LogoutFeature::class);
    }

}
