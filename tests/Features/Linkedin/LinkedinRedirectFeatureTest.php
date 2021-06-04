<?php

namespace Tests\Features\Linkedin;

use Tests\TestCases\LinkedinTestCase;

class LinkedinRedirectFeatureTest extends LinkedinTestCase
{
    public function testLinkedinRedirectFeature()
    {
        $response = $this->get(route(self::REDIRECT_ROUTE));

        $response->assertRedirect();
    }
}
