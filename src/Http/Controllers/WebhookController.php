<?php

namespace Ahmeddabak\Sumsub\Http\Controllers;

use Ahmeddabak\Sumsub\Events\WebhookEvent;
use Illuminate\Http\Request;

class WebhookController
{
    /**
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        event(new WebhookEvent($request->all()));

        return response()->json([
            'message' => 'success',
        ], 200);
    }
}
