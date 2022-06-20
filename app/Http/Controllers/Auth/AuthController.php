<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\InvitationRequest;
use App\Http\Requests\UserLoginRequest;
use App\Traits\ApiResponse;

class AuthController extends Controller
{
    use ApiResponse;

    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
    }


    public function login(UserLoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $auth = $this->userRepository->getUserAuth($email);

        // false | token
        $token = auth()->guard($auth)->attempt(['email' => $email, 'password' => $password]);
        if (!$token) {
            return $this->badRequestResponse('Password Not Found');
        }
        return $this->respondWithToken($token, $auth);
    }

    public function respondWithToken($token, $auth)
    {
        return $this->successResponse([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard($auth)->factory()->getTTL() * 60
        ]);
    }

    public function me()
    {
        $userInfo = $this->userRepository->getUserInfo('master');
        return $this->successResponse($userInfo);
    }

    public function confirmAnInvitation()
    {
        return [];
    }

    public function register()
    {
        return [];
    }

    public function logout()
    {
        return [];
    }

    public function refresh(){
        return [];
    }
}
