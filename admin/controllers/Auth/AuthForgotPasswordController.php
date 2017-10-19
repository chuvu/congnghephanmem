<?php

class AuthForgotPasswordController extends MY_Controller
{
    public function index()
    {
        $this->data['document_title'] = 'Quên mật khẩu';
        $this->data['disable_column_left'] = true;
        $this->layout('auth/forgot-password');
    }
}
