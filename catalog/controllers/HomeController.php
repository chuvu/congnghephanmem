<?php

class HomeController extends MY_Controller
{
    public function index()
    {
        $this->data['document_title'] = 'Website mỹ phẩm hàng đầu thế giới';
        $this->load->model('Blog/BlogPostModel');

        // $posts = $this->BlogPostModel->getMany();
        // foreach ($posts as &$post) {
        //     $Parsedown = new Parsedown();
        //     $subContent = word_limiter(strip_tags($Parsedown->text($post->content)), 50);
        //     $post->sub_content = $subContent;
        // }
        // $this->data['posts'] = $posts;

        $this->load->model('Forum/ForumPostModel');
        $this->data['discussions'] = $this->ForumPostModel
            ->with('post')
            ->with('comments_count')
            ->with('author')
            ->getMany();

        return $this->layout('home');
    }
}
