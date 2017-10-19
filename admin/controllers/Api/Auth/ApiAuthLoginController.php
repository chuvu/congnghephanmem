<?php

class ApiAuthLoginController extends MY_Controller
{
    public function attempt()
    {
        $validator = $this->validatorAttempt($this->input->post());
        
        $errors = array();
        $response = array();

        if ($validator->run()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            if ($this->input->post('remember')) {
                $this->auth->isRemember = true;
            }

            if (!$this->auth->attempt($email, $password)) {
                $errors['email'] = 'Tên tài khoản hoặc mật khẩu không chính xác';
            }
        } else {
            $errors = $validator->getErrorsArray();
        }

        if ($errors) {
            $response = array(
                'success'   => false,
                'message'   => 'Không thể đăng nhập',
                'errors'    => $errors,
            );

            $this->output->set_status_header(405);
        } else {
            $response = array(
                'success'   => true,
                'message'   => 'Đăng nhập thành công',
                'redirect'  => $this->input->post('redirect') ? $this->input->post('redirect') : $this->reditectTo(),
            );

            $this->output->set_status_header(200);
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    protected function validatorAttempt(array $data)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('email', 'Địa chỉ email', 'required');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required');
        return $this->form_validation;
    }

    protected function reditectTo()
    {
        return base_url('/');
    }
}
