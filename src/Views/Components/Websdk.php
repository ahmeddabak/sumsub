<?php

namespace Ahmeddabak\Sumsub\Views\Components;

use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class Websdk extends Component
{
    protected $flow;
    protected $userId;

    /**
     * Websdk constructor.
     * @param string $flow
     * @param string $userId
     */
    public function __construct(string $flow, string $userId)
    {
        $this->flow = $flow;
        $this->userId = $userId;
    }

    public function getToken()
    {
        $timestamp = round(strtotime('now'));

        $url = "/resources/accessTokens?userId={$this->userId}";

        $signature = hash_hmac('sha256', "{$timestamp}POST{$url}[]", config('sumsub.secret_key'));

        $response = Http::baseUrl(config('sumsub.base_url'))
            ->withHeaders([
                'X-App-Token' => config('sumsub.app_token'),
                'X-App-Access-Sig' => $signature,
                'X-App-Access-Ts' => $timestamp,
            ])->post($url)->object();

        return optional($response)->token;
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
