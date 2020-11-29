<?php

return [

    /*
     * Can be generated on this page https://api.sumsub.com/checkus#/devSpace/appTokens
     */
    'app_token' => env('SUMSUB_APP_TOKEN'),

    /*
     * provided upon App Token generation.
     */
    'secret_key' => env('SUMSUB_SECRET_KEY'),

    /*
     * https://api.sumsub.com for production
     * https://test-api.sumsub.com for testing
     */
    'base_url' => env('SUMSUB_BASE_URL', 'https://api.sumsub.com')
];
