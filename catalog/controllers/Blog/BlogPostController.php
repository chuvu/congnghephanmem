<?php

class BlogPostController extends MY_Controller
{
    public function show($postId)
    {
        $this->load->model('Blog/BlogPostModel');
        $Parsedown = new Parsedown();
        
        $post = $this->BlogPostModel->with('discussions_count')->get($postId);
        $post->content = $Parsedown->text($post->content);

        $this->data['post'] = $post;
        $this->data['document_title'] = $post->name;
        $this->data['logged_in'] = $this->auth->check();
        
        $this->load->model('Forum/ForumPostModel');
        $filter = array(
            'blog_post_id' => $post->id
        );
        $discussions = $this->ForumPostModel->with('comments_count')->getMany($filter);

        $this->data['discussions'] = $discussions;

        return $this->layout('blog/post/show');
    }
}
