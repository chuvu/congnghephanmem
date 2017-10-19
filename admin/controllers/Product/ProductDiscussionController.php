<?php

class ProductDiscussionController extends MY_Controller
{
    public function show($discussionId)
    {
        $this->load->model('Forum/ForumPostModel');

        $discussion = $this->ForumPostModel
            ->with('product_post')
            ->with('author')
            ->get($discussionId);

        $this->data['discussion'] = $discussion;

        $this->data['document_title'] = $discussion->name;
        $this->data['breadcrumbs'] = [];
        $this->data['breadcrumbs'][] = [
            'name' => 'Quản trị',
            'url'=> url('/'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Sản phẩm',
            'url'=> url('product/post'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => $discussion->product_post_name,
            'url'=> url('product/post/' . $discussion->product_post_id . '/edit'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Bình luận',
            'url'=> url('product/post/' . $discussion->product_post_id . '/edit'),
        ];

        $this->load->model('Forum/ForumCommentModel');
        $filter = array(
            'post_id' => $discussion->id,
        );
        $comments = $this->ForumCommentModel->with('author')->getMany($filter);

        foreach ($comments as $comment) {
            $Parsedown = new Parsedown();
            $comment->content = $Parsedown->text($comment->content);
        }

        $this->data['comments'] = $comments;
        $this->data['comments_count'] = count($this->data['comments']);
        $this->data['authors_count'] = $this->ForumCommentModel->countAuthor($discussion->id);


        $this->data['user'] = $this->auth->user();

        $this->layout('product/discussion/show');
    }
}
