<?php

namespace App\Http\Repositories;

use App\Models\Order;

class OrderRepository
{
    protected Order $order;

    public function __construct()
    {
        $this->order = new Order;
    }

    public function toPlaceAnOrder(\Illuminate\Http\Request $request): Order
    {
        $order = $this->order;
        $order->user_id = auth()->user()->id;
        $order->product_id = $request->product_id;
        $order->options = $request->options;
        if ($request->star) {
            $order->star = $request->star;
        }
        $order->save();
        return $order;
    }
}
