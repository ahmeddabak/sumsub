<?php

namespace Ahmeddabak\Sumsub\Views\Components;

use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class Websdk extends Component
{
    public $flow;
    public $userId;
    public $token;

    /**
     * Create the component instance.
     *
     * @param $flow
     * @param $userId
     */
    public function __construct($flow, $userId)
    {

        $this->flow = $flow;
        $this->userId = $userId;
        $this->token = $this->getToken($userId);
    }

    public function getToken($userId)
    {
        $config = config('sumsub');

        $credentials = base64_encode("{$config['username']}:{$config['password']}");

        $payload_response = Http::withHeaders([
            'Authorization' => 'Basic ' . $credentials,
        ])->post('https://api.sumsub.com/resources/auth/login')->json();

        if (!isset($payload_response['payload'])) {
            throw new \Exception('No payload');
        }

        $token_response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $payload_response['payload'],
        ])->post("https://api.sumsub.com/resources/accessTokens?userId={$userId}")->json();

        if (!isset($token_response['token'])) {
            throw new \Exception('No token');
        }

        return $token_response['token'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('sumsub::websdk');
    }
}
