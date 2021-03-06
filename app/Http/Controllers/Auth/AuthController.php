<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\InvitationPasswordRequest;
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


    /**
     * @param UserLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * @param $token
     * @param $auth
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithToken($token, $auth)
    {
        return $this->successResponse([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard($auth)->factory()->getTTL() * 60
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $userInfo = $this->userRepository->getUserInfo();
        if (!$userInfo) {
            return $this->unauthorizedResponse($userInfo, "User Not Found");
        }
        return $this->successResponse($userInfo);
    }

    /**
     * @param string $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirmAnInvitation(string $token)
    {
        $user = $this->userRepository->getTokenByInvitationLink($token);
        if (!$user) {
            return $this->badRequestResponse('Invitation Link Not Found');
        }
        return $this->successResponse($user);
    }

    /**
     * @param $token
     * @param InvitationPasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getInvitationLinkByPassword($token, InvitationPasswordRequest $request)
    {
        // ???????????? ????????? ??????
        $user = $this->userRepository->getTokenByInvitationLink($token);
        if (!$user) {
            return $this->badRequestResponse('Invitation Link Not Found');
        }

        // ?????? ?????? ???????????? ????????? 60??? ?????? ??????
        if ($user->created_at < now()->subMinutes(60)) {
            return $this->badRequestResponse('Invitation Link Expired');
        }

        $user->password = $request->password;
        $user->save();
        return $this->successResponse($user);
    }

    public function register()
    {
        return [];
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return $this->successResponse(['message' => 'Logout Success']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken()
    {
        $refresh = $this->respondWithToken(auth()->refresh());
        return $this->successResponse($refresh);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMyOrderList()
    {
        $userInfo = $this->userRepository->getUserInfo();
        if (!$userInfo) {
            return $this->unauthorizedResponse($userInfo, "User Not Found");
        }
        $myOrderList = $this->userRepository->getMyOrderList($userInfo->id);
        return $this->successResponse($myOrderList);
    }
}
