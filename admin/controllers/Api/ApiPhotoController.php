<?php

class ApiPhotoController extends MY_Controller
{
    public function upload()
    {
        $response = array();
        $errors = array();

        $validator = $this->validatorUpload($this->input->post());
        if ($validator->run()) {
            $this->load->library('upload');

            if (! $this->upload->do_upload('photo')) {
                $errors = $this->upload->display_errors();
            } else {
                $photo = $this->upload->data();
                $width = isset($_POST['width']) ? $this->input->get('width') : 100;
                $height = isset($_POST['width']) ? $this->input->get('height') : 100;
                $source_image = '/storage/upload/' . $photo['file_name'];
                $cache = image_resize($source_image, $width, $height);

                $response['path'] = $source_image;
                $response['cache'] = $cache;
            }
        } else {
            $errors = $validator->getErrorsArray();
        }

        if (!$errors) {
            $response['success'] = true;
            $response['message'] = 'Đã tải lên';
            $this->output->set_status_header(200);
        } else {
            $response['success'] = false;
            $response['message'] = 'Không thể tải lên';
            $response['errors'] = $errors;

            $this->output->set_status_header(406);
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    protected function validatorUpload(array $data)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('photo', 'Ảnh', 'trim');
        $this->form_validation->set_data($data);

        return $this->form_validation;
    }
}
