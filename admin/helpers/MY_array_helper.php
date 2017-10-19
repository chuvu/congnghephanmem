<?php

if (!function_exists('array_only')) {
    function array_only($array, $needs)
    {
        $allows = array();
        foreach ($array as $key => $value) {
            if (in_array($key, $needs)) {
                $allows[$key] = $value;
            }
        }
        
        return $allows;
    }
}
