<?php

class BlogPostModel extends MY_Model
{
    public function get($postId)
    {
        return $this->db->select('blog_posts.*')->where('blog_posts.id', $postId)->get('blog_posts')->first_row();
    }

    public function latest()
    {
        $this->db->order_by('updated_at', 'DESC');
        return $this;
    }

    public function with($data)
    {
        if ($data == 'author') {
            $this->db
                ->select('users.firstname,users.lastname,users.avatar')
                ->join('users', 'blog_posts.author_id=users.id');
        }

        if ($data == 'discussions_count') {
            $this->db
                ->select('COUNT(forum_posts.content) as discussions_count')
                ->join('forum_posts', 'blog_posts.id=forum_posts.blog_post_id', 'left')
                ->group_by('id');
        }

        return $this;
    }
    
    public function getMany($data = array())
    {
        if (isset($data['category_id'])) {
            $this->db->where('category_id', (int)$data['category_id']);
        }

        if (isset($data['limit'])) {
            $this->db->limit((int)$data['limit']);
        }

        return $this->db
            ->where('status', 1) // get only publish
            ->get('blog_posts')->result();
    }
}
