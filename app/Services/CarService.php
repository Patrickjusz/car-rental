<?php

namespace App\Services;

use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CarService
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
        $data = Car::create($data);
        return self::getJsonResponse(self::STATUS_SUCCESS, '', 201, $data);
    }

    /**
     * Update car
     *
     * @param  array $data
     * @param  int $id
     * @return JsonResponse
     */
    public static function update(array $data, int $id): JsonResponse
    {
        try {
            $car = Car::findOrFail($id);
            $car->fill($data);
            $car->save();
        } catch (ModelNotFoundException $error) {
            return self::getJsonResponse(self::STATUS_FAIL, $error->getMessage(), 404);
        }

        return self::getJsonResponse(self::STATUS_SUCCESS, '', 204, $data);
    }

    /**
     * Delete car
     *
     * @param  int $id
     * @return JsonResponse
     */
    public static function destroy(int $id): JsonResponse
    {
        try {
            $car = Car::findOrFail($id);
            $car->delete();
        } catch (ModelNotFoundException $error) {
            return self::getJsonResponse(self::STATUS_FAIL, $error->getMessage(), 404);
        }

        return self::getJsonResponse(self::STATUS_SUCCESS, 'ok', 200);
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
