<?php

if (!function_exists('url')) {
    function url($uri, $params = array(), $protocol = null)
    {
        return get_instance()->url->apply($uri, $params, $protocol);
    }
}
