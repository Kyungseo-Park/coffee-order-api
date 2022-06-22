<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CoffeeRepository;
use App\Http\Repositories\OfficeRepository;
use App\Http\Requests\CoffeeRequest;
use App\Http\Requests\OfficeRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Traits\ApiResponse;
use JetBrains\PhpStorm\Pure;

class OfficeController extends Controller
{
    use ApiResponse;

    protected OfficeRepository $officeRepository;
    protected CoffeeRepository $coffeeRepository;

    #[Pure] public function __construct()
    {
        $this->officeRepository = new OfficeRepository;
        $this->coffeeRepository = new CoffeeRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOfficeList()
    {
        $offices = $this->officeRepository->getAll();
        return $this->okResponse($offices, "Office List");
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOffice($id)
    {
        $office = $this->officeRepository->getById($id);
        return $this->okResponse($office, "Office");
    }

    /**
     * @param OfficeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addOffice(OfficeRequest $request)
    {
        $offices = $this->officeRepository->create($request);
        if (!$offices) {
            return $this->badRequestResponse('Office Create Failed');
        }
        return $this->createdResponse($offices, "Office Create Success");
    }

    /** 커피와 관련된 API */

    // PREFIX: office id 뽑아야 함
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCoffeeList()
    {
        // TODO: user 가 속한 office 정보는 1이라는 가정
        $office = $this->officeRepository->getOffice(1);
        $categoryList = $this->coffeeRepository->getCategoryList($office);
        $startProduct = $this->coffeeRepository->getStarList($office);

        // TODO: 추천 음료는 APi 따로 또는 Merge 해야함
        $result = CategoryResource::collection($categoryList);
        return $this->successResponse($result);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCoffee($id)
    {
        $coffee = $this->coffeeRepository->getCoffee($id);
        return $this->okResponse($coffee, "Coffee");
    }

    /**
     * @param CoffeeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCoffee(CoffeeRequest $request)
    {
        try {
            $coffee = $this->coffeeRepository->create($request);
        } catch (\Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }

        if (!$coffee) {
            return $this->badRequestResponse('Coffee Create Failed');
        }
        return $this->createdResponse($coffee, "Coffee Create Success");
    }

    /**
     * @param CoffeeRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCoffee(CoffeeRequest $request, $id)
    {
        try {
            $coffee = $this->coffeeRepository->update($request, $id);
        } catch (\Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }

        if (!$coffee) {
            return $this->badRequestResponse('Coffee Update Failed');
        }
        $coffee = $this->coffeeRepository->getCoffee($id);
        return $this->createdResponse($coffee, "Coffee Update Success");
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCoffeeListByCategory($id)
    {
        $coffeeList = $this->coffeeRepository->getCoffeeListByCategory($id);
        return $this->okResponse($coffeeList, "Coffee List");
    }
}
