<?php

namespace Tests\Unit\Domains\Seo\Jobs;

use App\Data\Models\User;
use App\Domains\Auth\Jobs\LoginUserJob;
use App\Domains\Seo\Jobs\GetDefaultTitleJob;
use Illuminate\Support\Facades\Config;
use Tests\TestCases\TestCase;

class GetDefaultTitleJobTest extends TestCase
{
    public function testGetDefaultTitleJob()
    {
       Config::set('app.name', 'LinkedIn OAuth');

       $actualTitle = $this->dispatchSync(new GetDefaultTitleJob('Test'));

       $this->assertEquals('Test - LinkedIn OAuth', $actualTitle);
    }
}
