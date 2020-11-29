<?php

namespace Ahmeddabak\Sumsub\Tests;

use Ahmeddabak\Sumsub\Events\WebhookEvent;
use Ahmeddabak\Sumsub\SumsubServiceProvider;
use Illuminate\Support\Facades\Event;
use Orchestra\Testbench\TestCase;

class WebhooksTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [SumsubServiceProvider::class];
    }

    /** @test */
    public function the_route_can_be_accessed()
    {
        $this->post('/webhooks/sumsub')->assertOk();
    }

    /** @test */
    public function event_is_dispatched_when_webhook_is_called()
    {
        Event::fake();

        $this->expectsEvents(WebhookEvent::class);

        $this->post('/webhooks/sumsub');
    }
}
