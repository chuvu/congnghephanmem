<?php

class BlogCategoryController extends MY_Controller
{
    public function show($categoryId)
    {
        $this->load->model('Blog/BlogCategoryModel');
        $this->load->model('Blog/BlogPostModel');

        $category = $this->BlogCategoryModel->get($categoryId);

        $filter = array(
            'category_id' => $category->id
        );
        $posts = $this->BlogPostModel->getMany($filter);
        
        foreach ($posts as &$post) {
            $Parsedown = new Parsedown();
            $subContent = word_limiter(strip_tags($Parsedown->text($post->content)), 50);
            $post->sub_content = $subContent;
        }

        $this->data['document_title'] = $category->name;
        $this->data['category'] = $category;
        $this->data['posts'] = $posts;

        return $this->layout('blog/category/show');
    }
}
