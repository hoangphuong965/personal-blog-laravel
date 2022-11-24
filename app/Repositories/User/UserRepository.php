<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository
{
    public function getModel()
    {
        return User::class;
    }

    public function login($data)
    {
        return Auth::attempt($data);
    }
}
