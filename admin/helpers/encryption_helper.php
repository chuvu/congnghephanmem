<?php

if (!function_exists('encrypt')) {
    function encrypt($string)
    {
        $CI =& get_instance();
        $CI->load->library('encryption');
        return $CI->encryption->encrypt($string);
    }
}

if (!function_exists('decrypt')) {
    function decrypt($string)
    {
        $CI =& get_instance();
        $CI->load->library('encryption');
        return $CI->encryption->decrypt($string);
    }
}
