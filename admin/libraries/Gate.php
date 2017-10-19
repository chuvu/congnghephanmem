<?php

class Gate
{
    private $CI;

    protected $gate = array();

    protected $allow = array();

    /**
     * User
     * @var stdClass User
     */
    protected $user = array();

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function define($name, $gate, $callback = false)
    {
        $data = new stdClass();
        $data->label = $name;
        $data->gate = $gate;
        if (!$callback) {
            $callback = function () {
                //
            };
        }

        $data->callback = $callback;

        $this->gate[$gate] = $data;
    }

    public function get($gate)
    {
        if (isset($this->gate[$gate])) {
            return $this->gate[$gate];
        }

        return null;
    }

    public function all()
    {
        return $this->gate;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setAllow($gateAllow)
    {
        $this->allow = $gateAllow;
    }

    /**
     * Kiểm tra xem user này có quyền thực hiện hành động này không
     */
    public function allow($gate, $params = array())
    {
        if (isset($this->allow[$gate])) {
            if (is_bool($this->allow[$gate])) {
                return $this->allow[$gate];
            } elseif (is_object($this->allow[$gate])) {
                return call_user_func_array($this->allow[$gate], array_merge($this->user, $params));
            }
        }

        return true;
    }
}
