<?php

class ProductCategoryModel extends MY_Model
{
    protected $errors = array();

    protected $fillable = array(
        'name', 'slug', 'level', 'parent_id', 'sort_order',
    );

    public function get($categoryId)
    {
        return $this->db->where('id', $categoryId)->get('product_categories')->first_row();
    }

    public function getMany(array $data = array())
    {
        if (isset($data['parent_id'])) {
            $this->db->where('parent_id', (int)$data['parent_id']);
        }
        
        return $this->db->get('product_categories')->result();
    }

    public function create(array $data)
    {
        $level = 0;

        if (isset($data['parent_id'])) {
            $parent = $this->db->select('level')->where('id', (int)$data['parent_id'])->get('product_categories')->first_row();
            if ($parent) {
                $level = $parent->level + 1;
            }
        }

        $data['level'] = $level;
        
        $this->db->insert('product_categories', array_only($data, $this->fillable));

        return $this->get($this->db->insert_id());
    }

    public function update(array $data, $categoryId)
    {
        if (isset($data['parent_id'])) {
            $parent = $this->db->select('level')->where('id', (int)$data['parent_id'])->get('product_categories')->first_row();
            $level = 0;
            if ($parent) {
                $level = $parent->level++;
            }

            $data['level'] = $level;
        }

        $this->db->where('id', $categoryId)->update('product_categories', array_only($data, $this->fillable));

        return $this->get($categoryId);
    }

    /**
     * Hàm này chưa được tối ưu
     */
    public function getPathIds($categoryId)
    {
        $sql = "
            SELECT id, parent_id FROM product_categories
            WHERE id in (
                SELECT id FROM product_categories where id = " . $this->db->escape((int)$categoryId) . " OR level < (
                    SELECT level from product_categories WHERE id = " . $this->db->escape((int)$categoryId) . "
                )
            )";

        $stacks = array();
        $results = $this->db->query($sql)->result();

        foreach ($results as $result) {
            if ($result->id == $categoryId) {
                array_unshift($stacks, $result->id);
                $parentId = $result->parent_id;

                while (true) {
                    if ($parentId == 0) {
                        break;
                    }

                    foreach ($results as $key => $result) {
                        if ($result->id == $parentId) {
                            array_unshift($stacks, $result->id);
                            $parentId = $result->parent_id;
                            break;
                        }
                    }
                }

                break;
            }
        }

        return $stacks;
    }

    public function delete($categoryId)
    {
        $countPost = $this->db->from('product_posts')->where('category_id', $categoryId)->count_all_results();
        if ($countPost) {
            $this->errors = 'Danh mục này có dữ liệu sản phẩm';
            return false;
        }

        $countChild = $this->db->from('product_categories')->where('parent_id', $categoryId)->count_all_results();
        if ($countChild) {
            $this->errors = 'Danh mục này có danh mục con';
            return false;
        }

        $this->db->where('id', $categoryId)->delete('product_categories');
        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
