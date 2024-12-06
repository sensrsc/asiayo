<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\OrderRequest;
use App\Events\OrderCreated;
use App\Models\Order;
use App\Http\Resources\OrderResource;

class OrderController
{
    public function createOrder(OrderRequest $request)
    {
        event(new OrderCreated($request));
        return response(null, Response::HTTP_OK);
    }

    public function getOrder(Request $request, $id)
    {
        $order = new Order;
        $order->setTable($request->currency);
        $result = $order->getQuery()->find($id);
        if(empty($result)) {
            return response(null, Response::HTTP_NOT_FOUND);
        }
        return new OrderResource($order->getQuery()->find($id));
    }
}
