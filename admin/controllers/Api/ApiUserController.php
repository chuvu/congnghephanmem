<?php

class ApiUserController extends MY_Controller
{
    public function store()
    {
        $response = array();
        $validator = $this->validateStore($this->input->post());

        if ($validator->run() == false) {
            $response = array(
                'success' => false,
                'message' => 'Vui lòng kiểm tra các trường thông tin',
                'errors' => $validator->getErrorsArray(),
            );
             $this->output->set_status_header(406);
        } else {
            $this->load->model('UserModel');
            
            $data = array_merge($this->input->post(), array(
                'password' => encrypt($this->input->post('password')),
            ));

            $user = $this->UserModel->create($data);
            $response = array(
                'success' => true,
                'message' => 'Đã thêm nhân viên mới',
                'user' => $user
            );
            
            if ($this->input->post('redirect')) {
                $response['redirect'] = $this->input->post('redirect');
            }

            $this->output->set_status_header(200);
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function update($userId)
    {
        $response = array();
        $validator = $this->validatorUpdate($this->input->post(), $userId);

        if ($validator->run() == false) {
            $response = array(
                'success' => false,
                'message' => 'Vui lòng kiểm tra các trường thông tin',
                'errors' => $validator->getErrorsArray(),
            );
            $this->output->set_status_header(406);
        } else {
            $this->load->model('UserModel');
            $data = $this->input->post();
            
            // Mật khẩu không được phép cập nhật qua api này
            if (isset($data['password'])) {
                uset($data['password']);
            }

            $user = $this->UserModel->update($data, $userId);
            $response = array(
                'success' => true,
                'message' => 'Đã lưu',
                'user' => $user
            );

            if ($this->input->post('redirect')) {
                $response['redirect'] = $this->input->post('redirect');
            }
            
            $this->output->set_status_header(200);
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function destroy()
    {
        //
    }

    protected function validateStore(array $data)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('firstname', 'Tên đầu', 'required|max_length[255]');
        $this->form_validation->set_rules('lastname', 'Họ và tên đệm', 'required|max_length[255]');
        $this->form_validation->set_rules('birth', 'Ngày sinh', 'dateFormat[d-m-Y]');
        $this->form_validation->set_rules('email', 'Địa chỉ email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone', 'Số điện thoại', 'max_length[255]');
        $this->form_validation->set_rules('avatar', 'Ảnh đại diện', 'max_length[255]');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required|max_length[255]');

        return $this->form_validation;
    }

    protected function validatorUpdate(array $data, $userId)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_data($data);

        if (isset($data['firstname'])) {
            $this->form_validation->set_rules('firstname', 'Tên đầu', 'required|max_length[255]');
        }

        if (isset($data['lastname'])) {
            $this->form_validation->set_rules('lastname', 'Họ và tên đệm', 'required|max_length[255]');
        }

        if (isset($data['birth'])) {
            $this->form_validation->set_rules('birth', 'Ngày sinh', 'dateFormat[d-m-Y]');
        }

        if (isset($data['email'])) {
            $this->form_validation->set_rules('email', 'Địa chỉ email', 'required|valid_email|callback_uniqueEmail['.$userId.']');
        }

        if (isset($data['phone'])) {
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'max_length[255]');
        }

        if (isset($data['avatar'])) {
            $this->form_validation->set_rules('avatar', 'Ảnh đại diện', 'max_length[255]');
        }

        return $this->form_validation;
    }

    public function uniqueEmail($email, $userId)
    {
        $count = $this->db->where('email', $email)->where('id !=', $userId)->count_all_results('users');
        if ($count != 0) {
            $this->form_validation->set_message(__FUNCTION__, 'Địa chỉ email đã tồn tại');
            return false;
        }

        return true;
    }
}
