<?php


namespace Ahmeddabak\Sumsub\Tests;


use Ahmeddabak\Sumsub\Views\Components\Websdk;
use Illuminate\View\View;
use Orchestra\Testbench\TestCase;

class BladeComponentTest extends TestCase
{

    /** @test */
    public function component_is_loaded(){
        $this->assertTrue(class_exists('\Ahmeddabak\Sumsub\Views\Components\Websdk'));
    }
}
