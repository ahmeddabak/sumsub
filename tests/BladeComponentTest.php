<?php

namespace Ahmeddabak\Sumsub\Tests;

use Orchestra\Testbench\TestCase;

class BladeComponentTest extends TestCase
{
    /** @test */
    public function component_is_loaded()
    {
        $this->assertTrue(class_exists('\Ahmeddabak\Sumsub\Views\Components\Websdk'));
    }
}
