<?php

class MY_Controller extends CI_Controller
{
    protected $data;

    public function __construct()
    {
        parent::__construct();

        $this->registerGate();
        $this->mdwRequireAuthentication();
        $this->mdwRedirectIfAuthenticated();
        $this->mdwPolice();
    }

    protected function layout($view)
    {
        $this->data['header'] = $this->header();
        $this->data['footer'] = $this->footer();
        
        if (!isset($this->data['disable_column_left']) || $this->data['disable_column_left'] == false) {
            $this->data['column_left'] = $this->columnLeft();
        }

        $this->data['content'] = $this->load->view($view, $this->data, true);

        $this->load->view('layouts/application', $this->data);
    }

    protected function header()
    {
        return $this->load->view('common/header', $this->data, true);
    }

    protected function columnLeft()
    {
        $home = array(
            'id' => 'home',
            'name' => 'Trang chủ',
            'icon' => 'fa-home',
            'url' => url('/'),
            'childrens' => array(),
        );

         // Profile
        $profile = array(
            'id' => 'student',
            'name' => 'Trang cá nhân',
            'icon' => 'fa-user',
            'url' => url('profile'),
            'childrens' => array(),
        );

        $profile['childrens'][] = array(
            'name' => 'Chỉnh sửa thông tin',
            'url' => url('profile'),
            'childrens' => array(),
        );

        $profile['childrens'][] = array(
            'name' => 'Đổi mật khẩu',
            'url' => url('profile/change-password'),
            'childrens' => array(),
        );

        $profile['childrens'][] = array(
            'id' => 'logout',
            'name' => 'Đăng xuất',
            'url' => url('logout'),
            'childrens' => array(),
        );

        $category = array();
        
        $category = array(
            'id' => 'blog-category',
            'name' => 'Quản lý bài viết',
            'icon' => 'fa-file-text-o',
            'url' => url('/blog/category'),
            'childrens' => array(),
        );

        $categoryProduct = array();

        $categoryProduct = array(
            'id' => 'product-category',
            'name' => 'Quản lý sản phẩm',
            'icon' => 'fa-shopping-cart ',
            'url' => url('/product/category'),
            'childrens' => array(),
        );

        $members = array(
            'id' => 'user',
            'name' => 'Quản lý Thành viên',
            'icon' => 'fa-users',
            'url' => url('/user'),
            'childrens' => array(),
        );

        // $forum = array(
        //     'id' => 'forum',
        //     'name' => 'Diễn đàn',
        //     'icon' => 'fa-comments',
        //     'url' => url('/forum'),
        //     'childrens' => array(),
        // );

        $setting = array(
            'id' => 'setting',
            'name' => 'Cài đặt',
            'icon' => 'fa-cogs',
            'url' => url('/setting'),
            'childrens' => array(),
        );

        $menus = array();
        $menus[] = array('name' => '', 'id' => 'anonymus', 'childrens' => array(
            $home, $profile
        ));
        
        $menus[] = array('name' => '', 'id' => 'product', 'childrens' => array(
            $categoryProduct, // $forum
        ));

        $menus[] = array('name' => '', 'id' => 'blog', 'childrens' => array(
            $category, $members, // $forum
        ));


        $menus[] = array('name' => '', 'id' => 'setting', 'childrens' => array(
            $setting,
        ));

        $this->data['menus'] = $menus;
        $this->data['firstname'] = $this->auth->user()->firstname;
        $this->data['lastname'] = $this->auth->user()->lastname;
        $this->data['home'] = $this->config->item('catalog_url');

        if (empty($this->auth->user()->avatar)) {
            $this->data['avatar'] = '/storage/no-avatar.png';
        } else {
            $this->data['avatar'] = $this->auth->user()->avatar;
        }

        $this->data['fullname'] = $this->auth->user()->lastname . ' ' . $this->auth->user()->firstname;
        $this->data['email'] = $this->auth->user()->email;

        return $this->load->view('common/column-left', $this->data, true);
    }

    protected function footer()
    {
        return $this->load->view('common/footer', $this->data, true);
    }

    protected function registerGate()
    {
        $this->gate->define('admin', 'Quản trị cơ bản');
        $this->gate->define('blog.view-list', 'BLog - Xem danh sách');
        
        $this->gate->define('blog.category.create', 'BLog - Thêm danh mục');
        $this->gate->define('blog.category.edit', 'BLog - Sửa danh mục');
        $this->gate->define('blog.category.destroy', 'BLog - Xóa danh mục');

        $this->gate->define('blog.post.create', 'BLog - Viết bài');
        $this->gate->define('blog.post.edit', 'BLog - Chỉnh sửa bài');
        $this->gate->define('blog.post.destroy', 'BLog - Xóa bài');

        $this->gate->setUser($this->auth->user());

        $this->gate->setAllow(array(
            'blog.category.index' => true,

            'blog.category.create' => true,
            'blog.category.edit' => true,
            'blog.category.destroy' => true,

            'blog.post.create' => true,
            'blog.post.edit' => true,
            'blog.post.destroy' => true,
        ));
    }

    protected function registerGateProduct()
    {
        $this->gate->define('admin', 'Quản trị cơ bản');
        $this->gate->define('product.view-list', 'Product - Xem danh sách');
        
        $this->gate->define('product.category.create', 'Product - Thêm danh mục');
        $this->gate->define('product.category.edit', 'Product - Sửa danh mục');
        $this->gate->define('product.category.destroy', 'Product - Xóa danh mục');

        $this->gate->define('product.post.create', 'Product - Thêm sản phẩm');
        $this->gate->define('product.post.edit', 'Product - Chỉnh sửa sản phẩm');
        $this->gate->define('product.post.destroy', 'Product - Xóa sản phẩm');

        $this->gate->setUser($this->auth->user());

        $this->gate->setAllow(array(
            'product.category.index' => true,

            'product.category.create' => true,
            'product.category.edit' => true,
            'product.category.destroy' => true,

            'product.post.create' => true,
            'product.post.edit' => true,
            'product.post.destroy' => true,
        ));
    }

    protected function mdwRequireAuthentication()
    {
        $except = array(
            'login',
            'forgot-password',
            'reset-password',
            'register',
            'api/login/attempt',
            'api/forgot-password/send-email',
            'api/reset-password',
            'api/register/store',
        );

        $redirectTo = url('login');

        if (!in_array(uri_string(), $except)) {
            if (!$this->auth->check()) {
                if (!$this->auth->loginUsingRemeberToken()) {
                    return redirect($redirectTo);
                }
            }
        }
    }

    protected function mdwRedirectIfAuthenticated()
    {
        $except = array(
            'login',
            'forgot-password',
            'reset-password',
            'register',
            'api/login/attempt',
            'api/forgot-password/send-email',
            'api/reset-password',
            'api/register/store',
        );

        $redirectTo = url('/');

        if (in_array(uri_string(), $except)) {
            if ($this->auth->check()) {
                return redirect($redirectTo);
            }
        }
    }

    protected function mdwPolice()
    {
        $police = array(
            'BlogCategoryController/index'      => 'blog.category.index',
            'BlogCategoryController/create'     => 'blog.category.create',
            'ApiBlogCategoryController/store'   => 'blog.category.create',
            'BlogCategoryController/edit'       => 'blog.category.edit',
            'ApiBlogCategoryController/update'  => 'blog.category.edit',
            'ApiBlogCategoryController/update'  => 'blog.category.destroy',
        );

        $controller = $this->router->class . '/' . $this->router->method;
        $allow = true;
        if (isset($police[$controller])) {
            $allow = $this->gate->allow($police[$controller]);
        }

        if (!$allow) {
            show_error("You don't have access to the url you where trying to reach.", 403);
        }
    }
    protected function mdwPoliceProduct()
    {
        $police = array(
            'ProductCategoryController/index'      => 'product.category.index',
            'ProductCategoryController/create'     => 'product.category.create',
            'ApiProductCategoryController/store'   => 'product.category.create',
            'ProductCategoryController/edit'       => 'product.category.edit',
            'ApiProductCategoryController/update'  => 'product.category.edit',
            'ApiProductCategoryController/update'  => 'product.category.destroy',
        );

        $controller = $this->router->class . '/' . $this->router->method;
        $allow = true;
        if (isset($police[$controller])) {
            $allow = $this->gate->allow($police[$controller]);
        }

        if (!$allow) {
            show_error("You don't have access to the url you where trying to reach.", 403);
        }
    }


    protected function mdwTokenResetPassword()
    {
        if ($this->input->get('token')) {
            $token = str_replace(' ', '+', $this->input->get('token')); // fixed
            $exists = $this->db->where('token', $token)->get('password_resets')->first_row();
            if (!$exists) {
                return redirect(url('forgot-password'));
            }
        } else {
            return redirect(url('forgot-password'));
        }
    }
}
