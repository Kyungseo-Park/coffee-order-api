<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CoffeeRepository;
use App\Http\Repositories\OfficeRepository;
use App\Http\Repositories\OrderRepository;
use App\Http\Requests\OrderRequest;
use App\Traits\ApiResponse;
use JetBrains\PhpStorm\Pure;

class OrderController extends Controller
{
    use ApiResponse;

    protected OfficeRepository $officeRepository;
    protected CoffeeRepository $coffeeRepository;
    protected OrderRepository $orderRepository;

    #[Pure] public function __construct()
    {
        $this->officeRepository = new OfficeRepository;
        $this->coffeeRepository = new CoffeeRepository;
    }

    public function toPlaceAnOrder(OrderRequest $orderRequest)
    {
        try {
            $order = $this->orderRepository->toPlaceAnOrder($orderRequest);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
        return $this->createdResponse($order, "Order Create Success");
    }
}
