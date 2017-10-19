<?php

class BlogPostController extends MY_Controller
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
            $this->load->model('Blog/BlogCategoryModel');
            $category = $this->BlogCategoryModel->get($categoryId);
        }

        $this->data['document_title'] = 'Viết bài';

        return $this->form($category, $post);
    }

    public function edit($postId)
    {
        $this->load->model('Blog/BlogPostModel');
        $post = $this->BlogPostModel->get($postId);
        
        if ($post->category_id == 0) {
            $category = new stdClass();
            $category->id = 0;
            $category->name = 'Danh mục gốc';
        } else {
            $this->load->model('Blog/BlogCategoryModel');
            $category = $this->BlogCategoryModel->get($post->category_id);
        }

        $this->data['document_title'] = 'Chỉnh sửa bài viết';

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
            'name' => 'Bài viết',
            'url'=> url('blog/post'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => ($mode == 'create' ?'Viết bài' : 'Chỉnh sửa'),
            'url'=> url('blog/post/create'),
        ];

        $this->data['category'] = $category;
        $this->data['post'] = $post;
        $this->data['mode'] = $mode;

        $discussions = array();
        if ($mode != 'create') {
            $this->load->model('Forum/ForumPostModel');
            $filter = array(
                'blog_post_id' => $post->id,
            );
            $discussions = $this->ForumPostModel->with('author')->getMany($filter);
        }

        $this->data['discussions'] = $discussions;

        $this->layout('blog/post/save');
    }
}
