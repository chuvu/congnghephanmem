<?php

class AuthLoginController extends MY_Controller
{
    public function index()
    {
        $this->data['document_title'] = 'Đăng nhập';
        $this->data['disable_column_left'] = true;
        $this->layout('auth/login');
    }
}
