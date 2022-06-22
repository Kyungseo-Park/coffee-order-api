<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CoffeeRepository;
use App\Http\Repositories\OfficeRepository;
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
     * Display a listing of the resource.
     *
     */
    public function getOfficeList()
    {
        $offices = $this->officeRepository->getAll();
        return $this->okResponse($offices, "Office List");
    }

    public function getOffice($id)
    {
        $office = $this->officeRepository->getById($id);
        return $this->okResponse($office, "Office");
    }

    // PREFIX: office id 뽑아야 함
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
}
