<?php

if (!function_exists('dd')) {
    function dd($data, $die = true)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        if ($die) {
            die();
        }
    }
}
