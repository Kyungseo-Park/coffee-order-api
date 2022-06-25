<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CoffeeRepository;
use App\Http\Repositories\OfficeRepository;
use App\Http\Repositories\OrderRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
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

    public function toPlaceAnOrder(Request $request)
    {
        $order = $this->orderRepository->toPlaceAnOrder($request);
        if (!$order) {
            return $this->badRequestResponse('Order Create Failed');
        }
        return $this->createdResponse($order, "Order Create Success");
    }
}
