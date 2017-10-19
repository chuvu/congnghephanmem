<?php

class ApiAuthRegisterController extends MY_Controller
{
    public function store()
    {
        $validator = $this->validatorStore($this->input->post());
        
        $errors = array();
        $response = array();

        if ($validator->run()) {
            $this->load->model('UserModel');
            $data = array_merge($this->input->post(), array(
                'password' => encrypt($this->input->post('password'))
            ));
            $user = $this->UserModel->create($data);
            $this->auth->loginUsingId($user->id);
        } else {
            $errors = $validator->getErrorsArray();
        }

        if ($errors) {
            $response = array(
                'success'   => false,
                'message'   => 'Vui lòng kiểm tra các trường thông tin',
                'errors'    => $errors,
            );

            $this->output->set_status_header(405);
        } else {
            $response = array(
                'success'   => true,
                'message'   => 'Đã tạo tài khoản',
                'redirect'  => $this->input->post('redirect') ? $this->input->post('redirect') : $this->reditectTo(),
            );

            $this->output->set_status_header(200);
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    protected function validatorStore(array $data)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('email', 'Địa chỉ email', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required');
        $this->form_validation->set_rules('password_confirmation', 'Nhập lại mật khẩu', 'required|matches[password]');
        return $this->form_validation;
    }

    protected function reditectTo()
    {
        return base_url('/');
    }
}
