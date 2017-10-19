<?php

if (!function_exists('image_resize')) {
    function image_resize($image, $width, $height)
    {
        $image_path = FCPATH . $image;

        if (!file_exists($image_path)) {
            return image_resize('/storage/image-not-found.png', $width, $height);
        }

        $dest_image = '/cache/' . substr($image, 0, strrpos($image, '.')) . '_' .$width . 'x' . $height . '.' . pathinfo($image_path, PATHINFO_EXTENSION);
        $new_image = FCPATH . $dest_image;

        if (!file_exists($new_image)) {
            $CI =& get_instance();
            $CI->load->helper('directory');
            
            mkdirs(dirname($new_image), 0777);
            $config = array(
                'image_library'     => 'gd2',
                'maintain_ratio'    => true,
                'create_thumb'      => false,
                'source_image'      => $image_path,
                'width'             => $width,
                'height'            => $height,
                'new_image'         => $new_image,
            );
            $CI->load->library('image_lib');
            $CI->image_lib->initialize($config);
            $CI->image_lib->resize();
        }

        return $dest_image;
    }
}
