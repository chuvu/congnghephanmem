<?php

class ForumPostController extends MY_Controller
{
    public function show($postId)
    {
        $this->load->model('Forum/ForumPostModel');
        $Parsedown = new Parsedown();
        
        $post = $this->ForumPostModel->with('comments_count')->get($postId);
        $post->content = $Parsedown->text($post->content);

        $this->data['post'] = $post;
        $this->data['document_title'] = $post->name;
        $this->data['logged_in'] = $this->auth->check();
        $this->load->model('Forum/ForumCommentModel');
        
        $filter = array(
            'post_id' => $post->id,
        );
        $this->data['comments'] = $this->ForumCommentModel->with('author')->getMany($filter);

        // Chủ đề này được tạo trong một bài viết
        $blog_post = array();
        if ($post->blog_post_id) {
            $this->load->model('Blog/BlogPostModel');
            $blog_post = $this->BlogPostModel->get($post->blog_post_id);
        }

        // Chủ đề này được tạo trong một danh mục
        $category = array();
        if ($post->category_id) {
            $this->load->model('Forum/ForumCategoryModel');
            $category = $this->ForumCategoryModel->get($post->category_id);
        }

        $this->data['category'] = $category;
        $this->data['blog_post'] = $blog_post;

        $this->layout('forum/post/show');
    }
}
