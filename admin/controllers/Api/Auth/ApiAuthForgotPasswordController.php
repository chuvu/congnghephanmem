<?php

class ApiAuthForgotPasswordController extends MY_Controller
{
    public function sendEmail()
    {
        $validator = $this->validatorSendEmail($this->input->post());

        $errors = array();
        $response = array();

        if ($validator->run()) {
            $token = encrypt(time());
            $this->load->model('UserModel');
            $user = $this->UserModel->getByEmail($this->input->post('email'));
            
            $this->data['user'] = $user;
            $this->data['token'] = $token;

            $this->db->where('email', $user->email)->delete('password_resets');
            $this->db->insert('password_resets', array(
                'email' => $user->email,
                'token' => $token,
            ));

            $this->config->load('email', true);
            $this->load->library('email');
            $this->email->initialize($this->config->item('email'));

            $this->email->from($this->config->item('from', 'email'), $this->config->item('name', 'email'));
            $this->email->to($user->email);
            $this->email->subject('Email khôi phục mật khẩu');
            $this->email->message($this->load->view('email/forgot-password', $this->data, true));

            if (!$this->email->send()) {
                // echo $this->email->print_debugger(array('headers'));
                $errors = 'Không thể gửi email';
            }
        } else {
            $errors = $validator->getErrorsArray();
        }

        if (!$errors) {
            $response = array(
                'success' => true,
                'message' => 'Đã gửi email chứa liên kết đổi mật khẩu mới.'
            );
            $this->output->set_status_header(200);
        } else {
            $response = array(
                'success' => true,
                'message' => 'Không thể gửi email.',
                'errors' => $errors,
            );
            $this->output->set_status_header(405);
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    protected function validatorSendEmail(array $data)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Địa chỉ email', 'required|callback_emailExists['.(isset($data['email']) ? $data['email'] : '').']');
        $this->form_validation->set_data($data);
        return $this->form_validation;
    }

    public function emailExists($email)
    {
        if (!empty($email)) {
            $this->load->model('UserModel');
            $user = $this->UserModel->getByEmail($email);

            if (!$user) {
                $this->form_validation->set_message(__FUNCTION__, 'Địa chỉ email khồng tồn tại');
                return false;
            }
        } else {
            return false;
        }

        return true;
    }
}
