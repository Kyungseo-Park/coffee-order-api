<?php

namespace App\Http\Repositories;

use App\Models\User;

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
}
