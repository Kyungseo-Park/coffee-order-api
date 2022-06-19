<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\InvitationRequest;
use App\Models\User;
use App\Traits\ApiResponse;

class MasterController extends Controller
{
    use ApiResponse;

    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
    }

    public function backdoor()
    {
        $faker = \Faker\Factory::create();
        $user = User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('password'),
            'auth' => 'master',
            'office_id' => 1,
            'Invitation_link' => 'backdoor',
        ]);
        return $this->okResponse($user);
    }

    public function me()
    {
        $userInfo = $this->userRepository->getUserInfo('master');
        return $this->successResponse($userInfo);
    }

    public function sendAnInvitation(InvitationRequest $invitationRequest)
    {
        // 사용자 검사 했음
        if (auth('master')->user()->auth !== 'master') {
            return $this->forbiddenResponse(["data" => '넌 권한이 없지롱']);
        }

        // TODO: 메일 발송 큐 등록해야함
        $addInvitation = $this->userRepository->addInvitation($invitationRequest);
        return $this->successResponse($addInvitation);
    }
}
