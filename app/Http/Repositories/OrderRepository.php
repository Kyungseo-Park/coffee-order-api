<?php

namespace App\Http\Repositories;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Traits\ApiResponse;

class OrderRepository
{
    use ApiResponse;

    protected Order $order;

    public function __construct()
    {
        $this->order = new Order;
    }

    /**
     * @param OrderRequest $orderRequest
     * @return Order
     */
    public function toPlaceAnOrder(OrderRequest $orderRequest): Order
    {
        $order = $this->order;
        $order->user_id = auth()->user()->id;
        $order->product_id = $orderRequest->product_id;
        $order->options = $orderRequest->options;
        if ($orderRequest->star) {
            $order->star = $orderRequest->star;
        }
        $order->save();
        return $order;
    }
}
