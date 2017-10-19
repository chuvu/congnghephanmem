<?php

class ForumPostModel extends MY_Model
{
    public function get($postId)
    {
        return $this->db->select('forum_posts.*')->where('forum_posts.id', $postId)->get('forum_posts')->first_row();
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
                ->join('users', 'forum_posts.author_id=users.id');
        }

        if ($data == 'blog_post') {
            $this->db
                ->select('blog_posts.name as blog_post_name')
                ->join('blog_posts', 'blog_posts.id=forum_posts.blog_post_id');
        }

        if ($data == 'comments_count') {
            $this->db
                ->select('COUNT(forum_comments.content) as comments_count')
                ->join('forum_comments', 'forum_posts.id=forum_comments.post_id', 'left')
                ->group_by('id');
        }

        return $this;
    }

    public function getMany(array $data = array())
    {
        $this->db->select('forum_posts.*');

        if (isset($data['blog_post_id'])) {
            $this->db->where('blog_post_id', (int)$data['blog_post_id']);
        }

        if (isset($data['parent_id'])) {
            $this->db->where('parent_id', (int)$data['parent_id']);
        }
        
        if (isset($data['limit'])) {
            $this->db->limit((int)$data['limit']);
        }

        return $this->db
            ->where('status', 1) // get only publish
            ->get('forum_posts')->result();
    }

    public function create(array $data)
    {
        //
    }

    public function update(array $data, $postId)
    {
        //
    }

    public function delete($postId)
    {
        //
    }
}
