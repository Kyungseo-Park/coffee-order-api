<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Str;

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

    /**
     * @param $guest
     * @return User
     */
    public function addInvitation($guest): User
    {
        $data = $this->user;
        $data->name = $guest->name;
        $data->email = $guest->email;
        $data->password = 'password';
        $data->Invitation_link = Str::uuid();
        $data->office_id = $guest->office_id;
        $data->save();
        return $data;
    }
}
