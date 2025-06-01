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
        } else {
            Log::error('error: ', [$res->body()]);

            return FacadesResponse::json([
                'status' => 'error',
                'message' => 'Something went wrong',
            ]);
        }
    }
}
