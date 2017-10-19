<?php

class UserController extends MY_Controller
{
    public function index()
    {
        $this->data['document_title'] = 'Thành viên';
        
        $this->data['breadcrumbs'] = [];
        $this->data['breadcrumbs'][] = [
            'name' => 'Quản trị',
            'url'=> url('/'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Thành viên',
            'url'=> url('user'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Danh sách',
            'url'=> url('user'),
        ];
        
        $this->load->model('UserModel');
        
        $filter = array(

        );
        $users = $this->UserModel->getMany($filter);
        $this->data['users'] = $users;

        $this->layout('user/index');
    }

    public function create()
    {
        $user = new stdClass();
        $attributes = array('firstname', 'lastname', 'email', 'birth', 'avatar', 'phone');
        foreach ($attributes as $attribute) {
            $user->{$attribute} = '';
        }

        $user->password = random_string();
        $user->avatar_preview = 'storage/no-avatar.png';
        $this->data['document_title'] = 'Thêm thành viên mới';

        return $this->form($user, 'create');
    }

    public function edit($userId)
    {
        $this->data['document_title'] = 'Chỉnh sửa thành viên';
        $this->load->model('UserModel');
        $user = $this->UserModel->get($userId);

        return $this->form($user, 'edit');
    }

    protected function form($user, $mode = 'create')
    {
        $this->data['breadcrumbs'] = [];
        $this->data['breadcrumbs'][] = [
            'name' => 'Quản trị',
            'url'=> url('/'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Thành viên',
            'url'=> url('user'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => $mode == 'create' ? 'Thêm mới' : 'Chỉnh sửa',
            'url'=> url('user/create'),
        ];

        $this->data['user'] = $user;
        $this->data['mode'] = $mode;

        if (!empty($user->avatar)) {
            $user->avatar_preview = $user->avatar;
        } else {
            $user->avatar_preview = 'storage/no-avatar.png';
        }

        if (!empty($user->birth)) {
            $user->birth = date_format(date_create($user->birth), 'd-m-Y');
        }

        $this->layout('user/save');
    }

    public function show($userId)
    {
        $this->load->model('UserModel');
        
        $user = $this->UserModel->get($userId);

        $this->data['document_title'] = 'Chi tiết thành viên';
        
        $this->data['breadcrumbs'] = [];
        $this->data['breadcrumbs'][] = [
            'name' => 'Quản trị',
            'url'=> url('/'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Thành viên',
            'url'=> url('user'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Chi tiết',
            'url'=> url('user/' . $user->id),
        ];

        if (empty($user->avatar)) {
            $user->avatar_preview = 'storage/no-avatar.png';
        } else {
            $user->avatar_preview = $user->avatar;
        }

        if (!empty($user->birth)) {
            $user->birth = date_format(date_create($user->birth), 'd-m-Y');
        }
        
        $this->data['user'] = $user;

        $this->layout('user/show');
    }

    public function loginAs($userId)
    {
        $this->auth->loginUsingId($userId);
        
        return redirect(url('/'));
    }
}
