<?php

class ProfileController extends MY_Controller
{
    public function index()
    {
        $this->data['document_title'] = 'Thông tin cá nhân';
        
        $this->data['breadcrumbs'] = [];
        $this->data['breadcrumbs'][] = [
            'name' => 'Quản trị',
            'url'=> url('/'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Trang cá nhân',
            'url'=> url('profile'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Chỉnh sửa',
            'url'=> url('profile'),
        ];
        
        $user = $this->auth->user();

        if (empty($user->avatar)) {
            $user->avatar_preview = 'storage/no-avatar.png';
        } else {
            $user->avatar_preview = $user->avatar;
        }

        if (!empty($user->birth)) {
            $user->birth = date_format(date_create($user->birth), 'd-m-Y');
        }
        
        $this->data['user'] = $user;

        $this->layout('profile/index');
    }

    public function changePassword()
    {
        $this->data['document_title'] = 'Đổi mật khẩu';
        
        $this->data['breadcrumbs'] = [];
        $this->data['breadcrumbs'][] = [
            'name' => 'Quản trị',
            'url'=> url('/'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Trang cá nhân',
            'url'=> url('profile'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Đổi mật khẩu',
            'url'=> url('profile/change-password'),
        ];

        $this->data['user'] = $this->auth->user();
        
        $this->layout('profile/change-password');
    }
}
