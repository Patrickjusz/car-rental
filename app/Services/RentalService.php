<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
// use App\Services\BorderdApi;

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
        $data['date_from'] = Carbon::parse($data['date_from']);
        $data['date_to'] = Carbon::parse($data['date_to']);

        //@TODO: Move to queue+jobs !! ;>
        $boredApi = new BoredApi();
        $response = $boredApi->getActivity(1);

        $order = Order::create($data);
        
        if (is_array($response) && $order->wasRecentlyCreated === true) {
            $car = $order->car;

            if (!is_null($response['key'])) {
                $car->key = $response['key'];
            }

            if (!is_null($response['type'])) {
                $car->type = $response['type'];
            }
            $car->save();
        }

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
