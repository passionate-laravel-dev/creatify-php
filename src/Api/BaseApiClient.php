<?php

namespace Passionatelaraveldev\Creatify\Api;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Passionatelaraveldev\Creatify\Concerns\HasAuth;
use Passionatelaraveldev\Creatify\Concerns\HasStatusResponse;

class BaseApiClient
{
    use HasAuth;
    use HasStatusResponse;

    /**
     * api base url
     */
    private string $apiBaseUrl;

    public function __construct(
        string $apiId,
        string $apiKey,
        string $apiBaseUrl
    ) {
        $this->apiBaseUrl = $apiBaseUrl;
        $this->authFrom($apiId, $apiKey);
    }

    /**
     * get full api endpoint
     */
    public function getFullUrl(string $url): string
    {
        return $this->apiBaseUrl.$url;
    }

    /**
     * general request
     */
    public function request(string $method, string $url, ?array $params = []): Response
    {
        return match ($method) {
            'get' => Http::withHeaders($this->getHeaders())->get($this->getFullUrl($url), $params),
            'post' => Http::withHeaders($this->getHeaders())->post($this->getFullUrl($url), $params),
            'put' => Http::withHeaders($this->getHeaders())->put($this->getFullUrl($url), $params),
            'delete' => Http::withHeaders($this->getHeaders())->delete($this->getFullUrl($url), $params),
            default => Http::withHeaders($this->getHeaders())->get($this->getFullUrl($url), $params)
        };
    }

    /**
     * get headers
     */
    protected function getHeaders(?array $headers = []): array
    {
        $authHeaders = $this->authHeader();
        $defaultHeaders = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        return array_merge($authHeaders, $defaultHeaders, $headers);
    }
}
