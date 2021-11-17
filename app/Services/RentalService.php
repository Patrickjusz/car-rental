<?php

namespace App\Services;

use App\Jobs\GetBoredApiActivityJob;
use Carbon\Carbon;
use App\Models\Car;
use App\Models\Order;
use App\Jobs\SendNewOrderMailJob;
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
        $order = Order::create($data);

        if ($order->wasRecentlyCreated === true) {
            dispatch(new GetBoredApiActivityJob($order->car));
            dispatch(new SendNewOrderMailJob($order->email));
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
