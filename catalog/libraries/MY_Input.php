<?php

class MY_Input extends CI_Input
{
    public function isPost()
    {
        return $this->method() == 'post';
    }

    public function isGet()
    {
        return $this->method() == 'get';
    }
}
