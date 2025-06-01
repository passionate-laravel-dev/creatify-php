<?php

namespace Passionatelaraveldev\Creatify\Api;

use Illuminate\Http\JsonResponse;

class Voices
{
    public function __construct(protected BaseApiClient $client) {}

    /**
     * get voices
     *
     * @see https://docs.creatify.ai/api-reference/voices/get-apivoices
     */
    public function getVoices(): JsonResponse
    {
        $res = $this->client->request('get', 'api/voices');

        return $this->client->jsonStatusResponse($res);
    }

    /**
     * Get voices with pagination
     *
     * @param  array  $params  //prvoide page and page_size for parameter
     *
     * @see https://docs.creatify.ai/api-reference/voices/get-apivoices-paginated
     */
    public function getVoicesWithPagination(array $params): JsonResponse
    {
        $res = $this->client->request('get', 'api/voices/paginated', $params);

        return $this->client->jsonStatusResponse($res);
    }
}
