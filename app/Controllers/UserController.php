<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    // Profile page (/profile)[cite: 1]
    public function profile()
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->getDemoUser(); // Single user record[cite: 1]
        $data['title'] = "User Profile";

        return view('profile', $data);
    }
}