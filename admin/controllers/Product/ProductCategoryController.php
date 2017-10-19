<?php

class ProductCategoryController extends MY_Controller
{
    public function index($parentId = 0)
    {
        $this->load->model(array('Product/ProductCategoryModel', 'Product/ProductPostModel'));
        
        $pathIds = array();
        if ($parentId == 0) {
            $category = new stdClass();
            $category->id = 0;
            $category->name = 'Danh mục gốc';
        } else {
            $category = $this->ProductCategoryModel->get($parentId);
            $pathIds = $this->ProductCategoryModel->getPathIds($parentId);
        }

        if (!$category) {
            show_404();
        }
        
        $this->data['category'] = $category;

        $this->data['document_title'] = 'Danh sách danh mục';
        
        $this->data['breadcrumbs'] = [];
        $this->data['breadcrumbs'][] = [
            'name' => 'Quản trị',
            'url'=> url('/'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Sản phẩm',
            'url'=> url('product/category'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Danh mục sản phẩm',
            'url'=> url('product/category'),
        ];

        if ($pathIds) {
            $paths = $this->db->where_in('id', $pathIds)->get('product_categories')->result();
            foreach ($paths as $path) {
                $this->data['breadcrumbs'][] = [
                    'name' => $path->name,
                    'url'=> url('product/category/'. $path->id),
                ];
            }
        }
        
        $filter = array(
            'category_id' => $parentId,
        );
        $this->data['posts'] = $this->ProductPostModel->with('author')->getMany($filter);
        
        $filter = array(
            'parent_id' => $parentId,
        );
        $this->data['categories'] = $this->ProductCategoryModel->getMany($filter);

        $this->layout('product/category/index');
    }
}
