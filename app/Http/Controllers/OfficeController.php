<?php

namespace App\Http\Controllers;

use App\Http\Repositories\OfficeRepository;
use App\Http\Requests\OfficeRequest;
use App\Traits\ApiResponse;
use JetBrains\PhpStorm\Pure;

class OfficeController extends Controller
{
    use ApiResponse;

    protected OfficeRepository $officeRepository;

    #[Pure] public function __construct()
    {
        $this->officeRepository = new OfficeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function getOfficeList()
    {
        $offices = $this->officeRepository->getAll();
        return $this->okResponse($offices);
    }

    // TODO: 아직 시작 안함
    public function addOffice(OfficeRequest $request)
    {
        $offices = $this->officeRepository->create($request);
        return $this->okResponse($offices);
    }
}
