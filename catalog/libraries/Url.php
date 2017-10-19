<?php

class Url
{
    private $CI;

    protected $rewrite;

    public function __construct()
    {
        $this->CI =& get_instance();

        foreach ($this->CI->router->dbRoute as $r) {
            $this->rewrite[$r->destination] = $r->route;
        }
    }

    public function apply($destUrl, $params = array(), $protocol = null)
    {
        if ($this->CI->ConfigModel->get('url_friendly')) {
            if (isset($this->rewrite[$destUrl])) {
                return $this->baseUrl($this->rewrite[$destUrl], $params, $protocol);
            }
        }

        return $this->baseUrl($destUrl, $params, $protocol);
    }

    protected function baseUrl($uri, $params = array(), $protocol = null)
    {
        $queryString = null;

        if ($params) {
            foreach ($params as $key => $value) {
                $queryString .= '&'.$key.'='.$value;
            }
            $queryString = '?' . ltrim($queryString, '&');
        }
        
        return $this->CI->config->base_url($uri . $queryString, $protocol);
    }
}
