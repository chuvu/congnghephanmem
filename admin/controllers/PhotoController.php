<?php

class PhotoController extends MY_Controller
{
    public function resize($width, $height, $image)
    {
        $params = func_get_args();
        // Xóa đi 2 tham số đầu tiên là chiều rộng và chiều cao của ảnh
        unset($params[0]);
        unset($params[1]);

        // Codeigniter không cho phép truyền tham số có ký tự '/' trên url
        // nên phải dùng cách này để lấy tham số link ảnh
        $image = implode('/', $params);

        $new_image = image_resize($image, $width, $height);
        $image_info = getimagesize(FCPATH . $new_image);

        switch ($image_info[2]) {
            case IMAGETYPE_JPEG:
                header('Content-Type: image/jpeg');
                break;
            case IMAGETYPE_GIF:
                header('Content-Type: image/gif');
                break;
            case IMAGETYPE_PNG:
                header('Content-Type: image/png');
                break;
        }

        header('Content-Length: ' . filesize(FCPATH . $new_image));

        return $this->output
            ->set_output(file_get_contents(FCPATH . $new_image));
    }
}
