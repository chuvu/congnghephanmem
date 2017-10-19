<?php

class ProductPostController extends MY_Controller
{
    public function create($categoryId)
    {
        $post = new stdClass();
        $attributes = array('name', 'slug', 'author_id', 'status', 'content', 'created_at', 'updated_at');
        foreach ($attributes as $attribute) {
            $post->{$attribute} = null;
        }
        
        if ($categoryId == 0) {
            $category = new stdClass();
            $category->id = 0;
            $category->name = 'Danh mục gốc';
        } else {
            $this->load->model('Product/ProductCategoryModel');
            $category = $this->ProductCategoryModel->get($categoryId);
        }

        $this->data['document_title'] = 'Viết bài';

        return $this->form($category, $post);
    }

    public function edit($postId)
    {
        $this->load->model('Product/ProductPostModel');
        $post = $this->ProductPostModel->get($postId);
        
        if ($post->category_id == 0) {
            $category = new stdClass();
            $category->id = 0;
            $category->name = 'Danh mục gốc';
        } else {
            $this->load->model('Product/ProductCategoryModel');
            $category = $this->ProductCategoryModel->get($post->category_id);
        }

        $this->data['document_title'] = 'Chỉnh sửa sản phẩm';

        return $this->form($category, $post, 'edit');
    }

    protected function form($category, $post, $mode = 'create')
    {   
        $this->data['breadcrumbs'] = [];
        $this->data['breadcrumbs'][] = [
            'name' => 'Quản trị',
            'url'=> url('/'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Sản phẩm',
            'url'=> url('product/post'), // chu thuong
        ];

        $this->data['breadcrumbs'][] = [
            'name' => ($mode == 'create' ?'Thêm sản phẩm' : 'Chỉnh sửa'),
            'url'=> url('product/post/create'),
        ];

        $this->data['category'] = $category;
        $this->data['post'] = $post;
        $this->data['mode'] = $mode;

        $discussions = array();
        if ($mode != 'create') {
            $this->load->model('Forum/ForumPostModel');
            $filter = array(
                'product_post_id' => $post->id,
            );
            $discussions = $this->ForumPostModel->with('author')->getMany($filter);
        }

        $this->data['discussions'] = $discussions;

        $this->layout('product/post/save');
    }
}
