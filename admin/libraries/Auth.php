<?php

class Auth
{
    private $CI;

    protected $prefixSession = 'codeigniter_auth_key.';

    protected $rememberToken = '';

    protected $user = array();

    protected $check = false;

    public $isRemember = false;

    /**
     * Kiểm tra xem có nhớ session userId trước đó không.
     * nếu nhớ thì lấy thông tin của user theo userId và đánh dấu là đã đăng nhập
     */
    public function __construct()
    {
        $this->CI =& get_instance();

        if ($this->CI->session->has_userdata($this->prefixSession . 'user_id')) {
            $userId = $this->CI->session->userdata($this->prefixSession. 'user_id');
            $this->CI->load->model('UserModel');
            $this->user = $this->CI->UserModel->get($userId);

            // Nếu tài khoản đang đăng nhập này đột nhiên bị xóa
            // khỏi cơ sở dữ liệu thì sẽ đăng xuất luôn
            if (!$this->user) {
                return $this->logout();
            }

            $this->check = true;
        }
    }

    /**
     * Thử đăng nhập
     * Đăng nhập thành công sẽ nhớ session userId
     * Nếu thuộc tính isRemember là true thì sẽ nhớ mật khẩu
     * Trả về true nếu đăng nhập đúng
     * Trả về false nếu đăng nhập sai
     */
    public function attempt($username, $password)
    {
        $this->CI->load->model('UserModel');

        $userId = $this->CI->UserModel->attempt($username, $password);
        if ($userId) {
            $this->CI->session->set_userdata($this->prefixSession. 'user_id', $userId);
            
            // Remember password
            if ($this->isRemember) {
                $token = encrypt(time());
                $this->CI->UserModel->update(array('remember_token' => $token), $userId);
                $this->CI->session->set_userdata($this->prefixSession. 'remember_token', $token);
            } else {
                $this->CI->UserModel->update(array('remember_token' => null), $userId);
                $this->CI->session->unset_userdata($this->prefixSession. 'remember_token');
            }

            return true;
        }

        return false;
    }

    public function loginUsingId($userId)
    {
        $this->CI->load->model('UserModel');
        $user = $this->CI->UserModel->get($userId);
        if ($user) {
            $userId = $user->{$this->CI->UserModel->id()};
            $this->CI->session->set_userdata($this->prefixSession .'user_id', $userId);
            return true;
        }

        return false;
    }

    /**
     * Đăng nhập bằng mã nhớ mật khẩu
     * Nếu tồn tại mã nhớ đăng nhập, thì cho đăng nhập và lưu token mới
     */
    public function loginUsingRemeberToken()
    {
        if ($this->CI->session->has_userdata($this->prefixSession . 'remember_token')) {
            $this->CI->load->model('UserModel');
            $token = $this->CI->session->userdata($this->prefixSession . 'remember_token');
            $user = $this->CI->UserModel->getByRemeberToken($token);

            if ($user) {
                $userId = $user->{$this->CI->UserModel->id()};
                $this->CI->session->set_userdata($this->prefixSession .'user_id', $userId);

                // Update new remember token
                $token = encrypt(time());
                $this->CI->UserModel->update(array('remember_token' => $token), $userId);
                $this->CI->session->set_userdata($this->prefixSession. 'remember_token', $token);

                return true;
            }

            return false;
        }

        return false;
    }

    public function logout()
    {
        $this->CI->session->unset_userdata($this->prefixSession .'user_id');
        $this->CI->session->unset_userdata($this->prefixSession .'remember_token');
    }

    public function user()
    {
        return $this->user;
    }

    public function check()
    {
        return $this->check;
    }
}
