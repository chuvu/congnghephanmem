<?php

if (!function_exists('e')) {
    function e($val = null, $default = null)
    {
        $string = trim($val) != '' ? $val : $default;

        echo htmlentities($string);
    }
}
