<?php

class ApiForumCommentController extends MY_Controller
{
    public function store()
    {
        $response = array();
        $validator = $this->validatorStore($this->input->post());

        if ($validator->run() == false) {
            $response = array(
                'success' => false,
                'message' => 'Vui lòng kiểm tra các trường thông tin',
                'error' => $validator->getErrorsArray(),
            );
             $this->output->set_status_header(406);
        } else {
            $this->load->model('Forum/ForumCommentModel');
            $post = $this->ForumCommentModel->create($this->input->post());
            $response = array(
                'success' => true,
                'message' => 'Đã thêm bình luận mới',
                'post' => $post
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

    public function update($postId)
    {
        $response = array();
        $validator = $this->validatorUpdate($this->input->post(), $postId);

        if ($validator->run() == false) {
            $response = array(
                'success' => false,
                'message' => 'Vui lòng kiểm tra các trường thông tin',
                'errors' => $validator->getErrorsArray(),
            );
            $this->output->set_status_header(406);
        } else {
            $this->load->model('Forum/ForumCommentModel');
            $post = $this->ForumCommentModel->update($this->input->post(), $postId);
            $response = array(
                'success' => true,
                'message' => 'Đã lưu',
                'post' => $post
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

    public function destroy($postId)
    {
        $this->load->model('Forum/ForumCommentModel');
        $post = $this->ForumCommentModel->delete($postId);
        
        $response = array();

        if (!$post) {
            $response = array(
                'success' => false,
                'message' => $this->ForumCommentModel->getErrors(),
            );
            $this->output->set_status_header(406);
        } else {
            $response = array(
                'success' => true,
                'message' => 'Đã xóa',
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

    protected function validatorStore(array $data)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('content', 'Nội dung', 'required|max_length[255]');
        $this->form_validation->set_rules('author_id', 'Tác giả', 'integer');
        $this->form_validation->set_rules('parent_id', 'Tác giả', 'integer');
        $this->form_validation->set_rules('post_id', 'Chủ đề', 'integer');

        return $this->form_validation;
    }

    protected function validatorUpdate(array $data, $postId)
    {
        $this->load->library('form_validation');

        // if (isset($data['name'])) {
        //     $this->form_validation->set_rules('name', 'Tên bài', 'required|max_length[255]');
        // }

        // if (isset($data['slug'])) {
        //     $this->form_validation->set_rules('slug', 'Slug', 'max_length[255]');
        // }

        // if (isset($data['author_id'])) {
        //     $this->form_validation->set_rules('author_id', 'Tác giả', 'integer');
        // }

        // if (isset($data['category_id'])) {
        //     $this->form_validation->set_rules('category_id', 'Danh mục', 'integer');
        // }

        // if (isset($data['status'])) {
        //     $this->form_validation->set_rules('status', 'Trạng thái', 'in_list[0,1]');
        // }

        return $this->form_validation;
    }
}
