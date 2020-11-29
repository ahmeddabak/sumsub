<?php

namespace Ahmeddabak\Sumsub\Events;

class WebhookEvent
{
    public $payload;

    /**
     * WebhookEvent constructor.
     * @param $payload
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
