<?php

class MY_Controller extends CI_Controller
{
    protected $data;

    public function __construct()
    {
        parent::__construct();

        $this->boot();

        $this->mdwAuthenticationController();
        $this->mdwRedirectIfAuthenticatedController();
    }

    protected function boot()
    {
        // code
    }

    protected function layout($view)
    {
        $this->data['header'] = $this->header();
        $this->data['footer'] = $this->footer();
        $this->data['column_left'] = $this->columnLeft();
        $this->data['logged_in'] = $this->auth->check();
        $this->data['content'] = $this->load->view($view, $this->data, true);

        $this->load->view('layouts/application', $this->data);
    }

    protected function header($data = array())
    {
        return $this->load->view('common/header', $data, true);
    }

    protected function footer($data = array())
    {
        return $this->load->view('common/footer', $data, true);
    }

    protected function columnLeft($data = array())
    {
        $this->load->model('Blog/BlogCategoryModel');

        $filter = array(
            'parent_id' => 0
        );
        $data['categories'] = $this->BlogCategoryModel->getMany($filter);

        $this->load->model('Blog/BlogPostModel');

        $filter = array(
            'limit' => '7',
        );
    
        $data['posts'] = array(); //$this->BlogPostModel->latest()->getMany($filter);
        $data['logged_in'] = $this->auth->check();
        
        $user = array();

        if ($this->auth->check()) {
            $user = $this->auth->user();
        }
        $data['user'] = $user;

        return $this->load->view('common/column-left', $data, true);
    }

    protected function mdwAuthenticationController()
    {
        // Những url yêu cầu phải xác thực
        $except = array(
            'api/profile/(.+)',
            'api/user/(.+)',
            'api/blog/(.+)',
            'api/forum/(.+)',
        );

        $reditectTo = url('/login');

        $requriedAuthentication = false;
        foreach ($except as $route) {
            $route = str_replace(array(':any', ':num'), array('[^/]+', '[0-9]+'), $route);
            if (preg_match('#^'.$route.'$#', uri_string(), $matches)) {
                $requriedAuthentication = true;
            }
        }

        if ($requriedAuthentication) {
            if (!$this->auth->check()) {
                if (!$this->auth->loginUsingRemeberToken()) {
                    return redirect($reditectTo);
                }
            }
        }
    }

    protected function mdwRedirectIfAuthenticatedController()
    {
        // Những url khi đã xác thực thì không thể truy cập
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

        $reditectTo = url('/');

        if (in_array(uri_string(), $except)) {
            if ($this->auth->check()) {
                return redirect($reditectTo);
            }
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
