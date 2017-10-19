<?php

class BlogPostController extends MY_Controller
{
    public function index($postId)
    {
        $this->load->model('Blog/BlogPostModel');
        
        $posts = $this->BlogPostModel->getMany();

        $this->data['posts'] = $posts;
        $this->data['document_title'] = 'Blog';

        return $this->layout('blog/index');
    }
}
