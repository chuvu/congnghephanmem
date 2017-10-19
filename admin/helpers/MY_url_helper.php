<?php

if (!function_exists('url')) {
    function url($uri, $params = array(), $protocol = null)
    {
        $query_string = null;

        if ($params) {
            foreach ($params as $key => $value) {
                $query_string .= '&'.$key.'='.$value;
            }
            $query_string = '?' . ltrim($query_string, '&');
        }
        
        return get_instance()->config->base_url($uri . $query_string, $protocol);
    }
}
