<?php

class AuthResetPasswordController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->mdwTokenResetPassword();
    }

    public function index()
    {
        $token = str_replace(' ', '+', $this->input->get('token')); // fixed
        $this->data['document_title'] = 'Đặt lại mật khẩu';
        $this->data['disable_column_left'] = true;
        $this->data['token'] = $token;

        $this->layout('auth/reset-password');
    }
}
