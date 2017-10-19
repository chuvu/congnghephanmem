<?php

class ConfigModel extends MY_Model
{
    public $config = array();

    public function __construct()
    {
        parent::__construct();

        // Set config from database
        $results = $this->db->select('name, value')->get('configs')->result();
        foreach ($results as $result) {
            $this->config[$result->name] = $result->value;
        }
    }

    public function get($code)
    {
        if (isset($this->config[$code])) {
            return $this->config[$code];
        }

        return null;
    }

    public function has($code)
    {
        return isset($this->config[$code]);
    }
}
