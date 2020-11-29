<?php

namespace Ahmeddabak\Sumsub\Tests;

use Ahmeddabak\Sumsub\SumsubServiceProvider;
use Ahmeddabak\Sumsub\Views\Components\Websdk;
use Orchestra\Testbench\TestCase;

class BladeComponentTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [SumsubServiceProvider::class];
    }

    /** @test */
    public function component_is_loaded()
    {
        $this->assertTrue(class_exists('\Ahmeddabak\Sumsub\Views\Components\Websdk'));
    }

    /** @test */
    public function it_renders_a_view()
    {
        $component = new Websdk('STEP','ID');

        $view = $component->render();

        $this->assertEquals('sumsub::websdk', $view->getName());
    }
}
