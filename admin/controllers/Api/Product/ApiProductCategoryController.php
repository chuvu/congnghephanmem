<?php

class ApiProductCategoryController extends MY_Controller
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
            $this->load->model('Product/ProductCategoryModel');
            $category = $this->ProductCategoryModel->create($this->input->post());
            $response = array(
                'success' => true,
                'message' => 'Đã thêm danh mục mới',
                'category' => $category
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

    public function update($categoryId)
    {
        $response = array();
        $validator = $this->validatorUpdate($this->input->post(), $categoryId);

        if ($validator->run() == false) {
            $response = array(
                'success' => false,
                'message' => 'Vui lòng kiểm tra các trường thông tin',
                'errors' => $validator->getErrorsArray(),
            );
            $this->output->set_status_header(406);
        } else {
            $this->load->model('Product/ProductCategoryModel');
            $category = $this->ProductCategoryModel->update($this->input->post(), $categoryId);
            
            $response = array(
                'success' => true,
                'message' => 'Đã lưu',
                'category' => $category
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

    public function destroy($categoryId)
    {
        $this->load->model('Product/ProductCategoryModel');
        $category = $this->ProductCategoryModel->delete($categoryId);
        
        $response = array();

        if (!$category) {
            $response = array(
                'success' => false,
                'message' => $this->ProductCategoryModel->getErrors(),
            );
            $this->output->set_status_header(406);
        } else {
            $response = array(
                'success' => true,
                'message' => 'Đã xóa',
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
        $this->form_validation->set_rules('name', 'Tên danh mục', 'required|max_length[255]');
        $this->form_validation->set_rules('slug', 'Slug', 'max_length[255]');
        $this->form_validation->set_rules('Danh mục cha', 'parent_id', 'integer|exists[product_categories,id]');//chu thuong

        return $this->form_validation;
    }

    protected function validatorUpdate(array $data, $categoryId)
    {
        $this->load->library('form_validation');

        if (isset($data['name'])) {
            $this->form_validation->set_rules('name', 'Tên danh mục', 'required|max_length[255]');
        }

        if (isset($data['slug'])) {
            $this->form_validation->set_rules('slug', 'Slug', 'max_length[255]');
        }

        return $this->form_validation;
    }
}
