<?php

namespace App\Controller;

use Common\Controller;

class AuthController extends Controller
{
    public function loginForm()
    {
        $this->render('login', null);
    }

    public function login($body)
    {
        $this->redirect("/admin/home");
    }
}
