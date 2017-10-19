<?php

class HomeController extends MY_Controller
{
    public function index()
    {
        $this->data['document_title'] = 'Bảng quản trị';
        
        $this->data['breadcrumbs'] = [];
        $this->data['breadcrumbs'][] = [
            'name' => 'Quản trị',
            'url'=> url('/'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Tổng quan',
            'url'=> url('/'),
        ];

        $this->layout('home');
    }

    public function test()
    {
        // Load model
        $this->load->model('UserModel');
    }
}
