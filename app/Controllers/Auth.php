<?php

namespace App\Controllers;

class Auth extends BaseController {
    public function login_page()
    {
        return view("auth/login");
    }
    
    public function register_page()
    {
        return view("auth/register");
    }
}