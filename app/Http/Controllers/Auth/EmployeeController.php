<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Traits\ApiResponse;

class EmployeeController extends Controller
{
    use ApiResponse;

    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
    }

    public function me()
    {
        $userInfo = $this->userRepository->getUserInfo('employee');
        return $this->successResponse($userInfo);
    }
}
