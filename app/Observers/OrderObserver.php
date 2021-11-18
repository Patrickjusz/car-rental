<?php

namespace App\Observers;

use App\Models\Order;
use App\Jobs\SendNewOrderMailJob;
use App\Jobs\GetBoredApiActivityJob;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        if ($order->wasRecentlyCreated === true) {
            dispatch(new GetBoredApiActivityJob($order->car));
            dispatch(new SendNewOrderMailJob($order->email));
        }
    }
}
