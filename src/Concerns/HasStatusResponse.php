<?php

namespace Passionatelaraveldev\Creatify\Concerns;

use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response as FacadesResponse;

trait HasStatusResponse
{
    /**
     * response with status for api response handle
     */
    public function jsonStatusResponse(Response $res): JsonResponse
    {
        if ($res->successful()) {
            return FacadesResponse::json([
                'status' => 'success',
                'resData' => $res->json(),
            ]);
        }

        if ($res->unauthorized()) {
            return FacadesResponse::json([
                'status' => 'error',
                'message' => $res->json('error') ?? 'Unauthorized'
            ]);
        }

        Log::error('Creatify api response error: ', [
            'status' => $res->status(),
            'body' => $res->body(),
        ]);

        return FacadesResponse::json([
            'status' => 'error',
            'message' => $res->json('error') ?? 'Unexpected issue happen',
        ]);
    }
}
