<?php

class ApiAuthResetPasswordController extends MY_Controller
{
    public function index()
    {
        $validator = $this->validatorChange($this->input->post());

        $errors = array();
        $response = array();

        if ($validator->run()) {
            $this->load->model('UserModel');
            $token = str_replace(' ', '+', $this->input->post('token'));
            $reset = $this->db->select('email')->where('token', $token)->get('password_resets')->first_row();
            $user = $this->UserModel->getByEmail($reset->email);
            
            $user = $this->UserModel->update(array(
                'password' => encrypt($this->input->post('password'))
            ), $user->id);

            if (!$user) {
                $errors = $this->UserModel->getErrors();
            }
        } else {
            $errors = $validator->getErrorsArray();
        }

        if (!$errors) {
            $response = array(
                'success' => true,
                'message' => 'Đã đổi mật khẩu.',
                'redirect' => url('/login'),
            );
            $this->output->set_status_header(200);
        } else {
            $response = array(
                'success' => true,
                'message' => 'Không thể đổi mật khẩu.',
                'errors' => $errors,
            );
            $this->output->set_status_header(405);
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    protected function validatorChange(array $data)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('password', 'Mật khẩu mới', 'required');
        $this->form_validation->set_rules('password_confirmation', 'Nhập lại mật khẩu', 'required|matches[password]');
        $this->form_validation->set_rules('token', '', 'required|callback_tokenExists['.(isset($data['token']) ? str_replace(' ', '+', $data['token']) : '').']');
        return $this->form_validation;
    }

    public function tokenExists($token = '')
    {
        if (!empty($token)) {
            $token = $this->db->where('token', $token)->get('password_resets')->first_row();
            if (!$token) {
                $this->form_validation->set_message(__FUNCTION__, 'Token khôn tồn tại');
                return false;
            }
        } else {
            return false;
        }

        return true;
    }
}
