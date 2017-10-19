<?php

class BlogDiscussionController extends MY_Controller
{
    public function show($discussionId)
    {
        $this->load->model('Forum/ForumPostModel');

        $discussion = $this->ForumPostModel
            ->with('blog_post')
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
            'name' => 'Bài viết',
            'url'=> url('blog/post'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => $discussion->blog_post_name,
            'url'=> url('blog/post/' . $discussion->blog_post_id . '/edit'),
        ];

        $this->data['breadcrumbs'][] = [
            'name' => 'Thảo luận',
            'url'=> url('blog/post/' . $discussion->blog_post_id . '/edit'),
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

        $this->layout('blog/discussion/show');
    }
}
