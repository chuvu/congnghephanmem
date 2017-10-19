<?php

class ForumCommentModel extends MY_Model
{
    protected $fillable = array(
        'content', 'author_id', 'post_id', 'parent_id',
    );

    public function get($postId)
    {
        return $this->db->select('forum_comments.*')->where('forum_comments.id', $postId)->get('forum_comments')->first_row();
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
                ->join('users', 'forum_comments.author_id=users.id');
        }

        return $this;
    }

    public function getMany(array $data = array())
    {
        $this->db->select('forum_comments.*');

        if (isset($data['post_id'])) {
            $this->db->where('post_id', (int)$data['post_id']);
        }
        
        if (isset($data['limit'])) {
            $this->db->limit((int)$data['limit']);
        }


        return $this->db
            ->get('forum_comments')->result();
    }

    public function create(array $data)
    {
        $this->db->set('created_at', 'NOW()', false);
        $this->db->set('updated_at', 'NOW()', false);
        $this->db->insert('forum_comments', array_only($data, $this->fillable));

        return $this->get($this->db->insert_id());
    }

    public function countAuthor($postId)
    {
        return $this->db->distinct()->select('author_id')->from('forum_comments')->where('post_id', (int)$postId)->count_all_results();
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
