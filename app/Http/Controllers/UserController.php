<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    /**
     * 显示给定用户的概要文件.
     *
     * @param  int  $id
     * @return View
     */
    public function show()
    {
        // echo "123";
        return View('register/login');
    }
}