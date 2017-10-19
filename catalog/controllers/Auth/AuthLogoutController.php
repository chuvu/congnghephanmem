<?php

class AuthLogoutController extends MY_Controller
{
    public function index()
    {
        $this->auth->logout();
        redirect(url('/login'));
    }
}
