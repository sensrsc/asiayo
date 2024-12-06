<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Order;

class OrderProcess
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($request)
    {
        $order = new Order;
        $order->setTable($request->currency);
        $order->id = $request->id;
        $order->name = $request->name;
        $order->address = json_encode($request->address);
        $order->price = floatval($request->price);
        $order->currency = $request->currency;
        $order->save();
    }
}
