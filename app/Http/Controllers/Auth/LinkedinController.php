<?php

namespace App\Http\Controllers\Auth;

use App\Features\Linkedin\LinkedinCallbackFeature;
use App\Features\Linkedin\LinkedinRedirectFeature;
use Illuminate\Http\RedirectResponse;
use Lucid\Units\Controller;

class LinkedinController extends Controller
{
    /**
     * Login Form
     *
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return $this->serve(LinkedinRedirectFeature::class);
    }

    /**
     * Login Form
     *
     * @return RedirectResponse
     */
    public function callback(): RedirectResponse
    {
        return $this->serve(LinkedinCallbackFeature::class);
    }
}
