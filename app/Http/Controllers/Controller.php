<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Return a success JSON response.
     *
     * @param  array|string  $data
     * @param  int|null  $code
     * @return JsonResponse
     */
    protected function success($data, int $code = 200): JsonResponse
    {
        return response()->json($data, $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  array|string|null  $exception
     * @return JsonResponse
     */
    protected function error(string $message, int $code, $exception = null): JsonResponse
    {
        return response()->json([
            'error' => true,
            'message' => $message,
            'exception' => $exception
        ], $code);
    }
}
