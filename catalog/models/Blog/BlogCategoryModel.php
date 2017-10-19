<?php

class BlogCategoryModel extends MY_Model
{
    public function get($categoryId)
    {
        return $this->db->select('blog_categories.*')->where('blog_categories.id', $categoryId)->get('blog_categories')->first_row();
    }

    public function getMany($data = array())
    {
        if (isset($data['parent_id'])) {
            $this->db->where('parent_id', (int)$data['parent_id']);
        }

        if (isset($data['limit'])) {
            $this->db->limit((int)$data['limit']);
        }

        return $this->db->get('blog_categories')->result();
    }
}
