<?php

namespace App\Helper;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Function : Common Function to display Success - JSON Response
     * @param string $status
     * @param string|null $message
     * @param array $data
     * @param integer $statusCode
     */
    public static function success(string $status = 'success', string $message = null, array $data = [], int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    /**
     * Function : Common Function to display Error - JSON Response
     * @param string $status
     * @param string|null $message
     * @param integer $statusCode
     */
    public static function error(string $status = 'error', string $message = null, int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'statusCode' => $statusCode,
            'message' => $message,
        ], $statusCode);
    }
}
