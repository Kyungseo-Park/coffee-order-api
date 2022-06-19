<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class UserRepository
{
    protected User $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function getUserAuth($email)
    {
        return $this->user->whereEmail($email)->first()->auth;
    }


    /**
     * Get the authenticated User.
     *
     * @param String $auth
     * @return Authenticatable|User|null
     */
    public function getUserInfo(string $auth): User|Authenticatable|null
    {
        return auth($auth)->user();
    }
}
