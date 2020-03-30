<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function getAuthUserId()
    {
        $id = Auth::user()->getAuthIdentifier();

        return $id;
    }
}