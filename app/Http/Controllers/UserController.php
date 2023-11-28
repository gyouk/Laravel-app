<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserInfo($last_name, $first_name)
    {
        $user_info = [
            'last_name' => $last_name,
            'first_name' => $first_name,
        ];

        return response()->json($user_info);
    }
}
