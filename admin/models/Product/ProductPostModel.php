<?php

class ProductPostModel extends MY_Model
{
    protected $errors = array();

    protected $fillable = array(
        'name', 'content', 'slug', 'status', 'author_id', 'category_id', 'created_at', 'updated_at',
    );

    /**
     * Trả về chi tiết
     */
    public function get($postId)
    {
        return $this->db->where('id', $postId)->get('product_posts')->first_row();
    }

    public function with($data)
    {
        if ($data == 'author') {
            $this->db
                ->select('users.firstname,users.lastname,users.avatar')
                ->join('users', 'product_posts.author_id=users.id');
        }

        return $this;
    }

    public function getMany(array $data = array())
    {
        $this->db->select('product_posts.*');
        
        if (isset($data['category_id'])) {
            $this->db->where('category_id', (int)$data['category_id']);
        }

        return $this->db->get('product_posts')->result();
    }

    public function create(array $data)
    {
        $this->db->set('created_at', 'NOW()', false);
        $this->db->set('updated_at', 'NOW()', false);
        $this->db->insert('product_posts', array_only($data, $this->fillable));

        return $this->get($this->db->insert_id());
    }

    public function update(array $data, $postId)
    {
        $this->db->set('updated_at', 'NOW()', false);
        $this->db->where('id', $postId)->update('product_posts', array_only($data, $this->fillable));

        return $this->get($postId);
    }

    public function delete($postId)
    {
        $this->db->where('id', $postId)->delete('product_posts');
        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function enable($postId)
    {
        $this->db->where('id', $postId)->update('product_posts', array('status' => 1));
        return $this->get($postId);
    }

    public function disable($postId)
    {
        $this->db->where('id', $postId)->update('product_posts', array('status' => 0));
        return $this->get($postId);
    }
}
