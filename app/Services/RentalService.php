<?php

namespace App\Services;

use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RentalService
{
    const STATUS_SUCCESS = 'success';
    const STATUS_FAIL = 'fail';

    /**
     * Create car
     *
     * @param  array $data
     * @return JsonResponse
     */
    public static function create(array $data): JsonResponse
    {
        $car = Car::create($data);
        return self::getJsonResponse(self::STATUS_SUCCESS, '', 201, $data);
    }

    /**
     * Get service HTTP response.
     *
     * @param  string $status
     * @param  string $message
     * @param  int $httpCode
     * @param  array $data
     * @return JsonResponse
     */
    private static function getJsonResponse(string $status, string $message = '', int $httpCode = 200, array $data = []): JsonResponse
    {
        $returnData['status'] = $status;

        if ($message)
            $returnData['message'] = $message;

        if ($data)
            $returnData['data'] = $data;

        return response()->json($returnData, $httpCode);
    }
}
