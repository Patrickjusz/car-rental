<?php

namespace App\Services;

use App\Http\Resources\OrderCollection;
use Carbon\Carbon;
use App\Models\Order;
use App\Jobs\SendNewOrderMailJob;
use Illuminate\Http\JsonResponse;
use App\Jobs\GetBoredApiActivityJob;
use Illuminate\Support\Facades\Request;

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
        $data = self::prepareData($data);
        Order::create($data); // Look at this: app/Observers/OrderObserver.php ;>
        return self::getJsonResponse(self::STATUS_SUCCESS, '', 201, $data);
    }

    /**
     * Get order by car_id
     *
     * @param  int $id
     * @return JsonResponse
     */
    public static function get(int $id): JsonResponse
    {
        $data = Order::where('car_id', $id)->get();
        return self::getJsonResponse(self::STATUS_SUCCESS, '', 200, $data);
    }

    /**
     * Convert data
     *
     * @param  array $data
     * @return array
     */
    private static function prepareData(array $data): array
    {
        try {
            $data['date_from'] = Carbon::parse($data['date_from']);
            $data['date_to'] = Carbon::parse($data['date_to']);
        } catch (\Exception $e) {
            //@TODO ;>
        }
        $data['ip'] = Request::ip();
        $data['user_agent'] = Request::userAgent();
        return $data;
    }

    // @TODO: Move to separate class. SSSOLID! </3
    /**
     * Get service HTTP response.
     *
     * @param  string $status
     * @param  string $message
     * @param  int $httpCode
     * @param  array $data
     * @return JsonResponse
     */
    private static function getJsonResponse(string $status, string $message = '', int $httpCode = 200,  $data = []): JsonResponse
    {
        $returnData['status'] = $status;

        if ($message)
            $returnData['message'] = $message;

        if ($data)
            $returnData['data'] = $data;

        return response()->json($returnData, $httpCode);
    }
}
