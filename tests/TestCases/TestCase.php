<?php

namespace Tests\TestCases;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Lucid\Bus\UnitDispatcher;
use Tests\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use DispatchesJobs;

    const HOME_ROUTE = 'home';

    use CreatesApplication, RefreshDatabase;

}
