<?php

class BlogCategoryController extends MY_Controller
{
    public function index($parentId = 0)
    {
        $this->load->model(array('Blog/BlogCategoryModel', 'Blog/BlogPostModel'));
        
        $pathIds = array();
        if ($parentId == 0) {
            $category = new stdClass();
            $category->id = 0;
            $category->name = 'Danh mục gốc';
        } else {
            $category = $this->BlogCategoryModel->get($parentId);
            $pathIds = $this->BlogCategoryModel->getPathIds($parentId);
        }

        if (!$category) {
            show_404();
        }
        
        $this->data['category'] = $category;

        $this->data['document_title'] = 'Danh sách danh mục';
        
        $this->data['breadcrumbs'] = [];
        $this->data['breadcrumbs'][] = [
            'name' => 'Quản trị',
            'url'=> url('/'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Bài viết',
            'url'=> url('blog/category'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Danh mục bài viết',
            'url'=> url('blog/category'),
        ];

        if ($pathIds) {
            $paths = $this->db->where_in('id', $pathIds)->get('blog_categories')->result();
            foreach ($paths as $path) {
                $this->data['breadcrumbs'][] = [
                    'name' => $path->name,
                    'url'=> url('blog/category/'. $path->id),
                ];
            }
        }
        
        $filter = array(
            'category_id' => $parentId,
        );
        $this->data['posts'] = $this->BlogPostModel->with('author')->getMany($filter);
        
        $filter = array(
            'parent_id' => $parentId,
        );
        $this->data['categories'] = $this->BlogCategoryModel->getMany($filter);

        $this->layout('blog/category/index');
    }
}
