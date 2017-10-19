<?php

if (!function_exists('can')) {
    function can($gate, $params = array())
    {
        $CI =& get_instance();
        return call_user_func_array(array($CI->gate, 'allow'), array($gate, $params));
    }
}
