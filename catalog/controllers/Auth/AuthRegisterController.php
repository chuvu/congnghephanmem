<?php

class AuthRegisterController extends MY_Controller
{
    public function index()
    {
        $this->data['document_title'] = 'Đăng ký tài khoản';
        $this->data['disable_column_left'] = true;
        $this->layout('auth/register');
    }
}
