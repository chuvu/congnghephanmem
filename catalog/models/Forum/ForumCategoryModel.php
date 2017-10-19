<?php

class ForumCategoryModel extends MY_Model
{
    public function get($categoryId)
    {
        return $this->db->select('forum_categories.*')->where('forum_categories.id', $categoryId)->get('forum_categories')->first_row();
    }

    public function latest()
    {
        $this->db->order_by('updated_at', 'DESC');
        return $this;
    }

    public function getMany(array $data = array())
    {
        $this->db->select('forum_categories.*');

        if (isset($data['parent_id'])) {
            $this->db->where('parent_id', (int)$data['parent_id']);
        }
        
        if (isset($data['limit'])) {
            $this->db->limit((int)$data['limit']);
        }

        return $this->db
            ->where('status', 1) // get only publish
            ->get('forum_categories')->result();
    }

    public function create(array $data)
    {
        //
    }

    public function update(array $data, $categoryId)
    {
        //
    }

    public function delete($categoryId)
    {
        //
    }
}
