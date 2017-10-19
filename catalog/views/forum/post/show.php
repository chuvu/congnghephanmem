<?php echo $header ?>
<div class="page-container container-fluid">
    <div class="col-md-3 menu">
        <nav class="col-md-3">
            <?php echo $column_left ?>
        </nav>
    </div>
    <div class="col-md-9 content">
        <h1># <?php echo $post->name ?></h1>
        <ul>
            <li>Tác giả: <a href="">Phạm Quang Bình</a></li>
            <li>Đăng lúc <?php echo $post->created_at ?> - Cập nhật lần cuối <?php echo $post->updated_at ?></li>
            <?php if ($category) : ?>
                <li>Đăng trong danh mục: <a href="<?php echo url('forum/category/' . $category->id) ?>"><?php echo $category->name ?></a></li>
            <?php endif ?>
            <?php if ($blog_post) : ?>
                <li>Đăng trong bài viết: <a href="<?php echo url('forum/category/' . $blog_post->id) ?>"><?php echo $blog_post->name ?></a></li>
            <?php endif ?>
            <li><a href="">Phản hồi:</a> <?php echo $post->comments_count ? $post->comments_count : 'Chưa có' ?></li>
        </ul>
        <?php echo $post->content ?>
        <br />
        <br />
        <h3>Các phản hồi
            <?php if ($logged_in) : ?>
                {<a class="btn btn-link create-comment">Viết phản hồi của bạn</a>}
            <?php endif ?>
        </h3>
        <?php if (!$logged_in) : ?>
            Bạn cần phải <a data-toggle="modal" href="#modal-login">đăng nhập</a> hoặc <a data-toggle="modal" href="#modal-register">tạo tài khoản</a> để có thể phản hồi trong chủ đề thảo luận này.
        <?php endif ?>

        <?php if ($comments) : ?>
            <section class="comment-list">
                <?php $comment_row = 1 ?>
                <?php foreach ($comments as $comment) : ?>
                    <article class="row">
                        <div class="col-md-1 col-sm-1 hidden-xs">
                            <div class="text-center">#<?php echo $comment_row ?></div>
                            <figure class="thumbnail">
                                <img class="img-responsive img-circle" src="photo/resize/70x70<?php echo $comment->avatar ?>">
                            </figure>
                        </div>
                        <div class="col-md-11 col-sm-11">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <header class="text-left">
                                        <div class="comment-user">
                                            <i class="fa fa-user"></i>
                                            <strong><?php echo $comment->lastname ?> <?php echo $comment->firstname ?></strong>
                                        </div>
                                        <time class="comment-date" datetime="13-08-2017 09:16"><i class="fa fa-clock-o"></i> 13-08-2017 09:16</time>
                                    </header>
                                    <div class="comment-post">
                                        <?php echo $comment->content ?>
                                    </div>
                                    <!-- <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> Trả lời</a></p> -->
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php $comment_row++ ?>
                <?php endforeach ?>
            </section>
        <?php else : ?>
            Chưa có phản hồi nào.
        <?php endif ?>
        <?php if ($logged_in) : ?>
            <div id="panel-create-comment">
                <h4>
                    Phản hồi của bạn
                    {<button class="btn btn-link create-comment"><i class="fa fa-times"></i> Hủy</button>}
                </h4>
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea data-toggle="markdown-editor" data-height="150px"></textarea>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Gửi</button>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>
<?php if ($logged_in) : ?>
    <style>
        #panel-create-comment {
            position: fixed;
            bottom: -100%;
            width: 75%;
            background: #001f27;
            left: 25%;
            padding: 15px;
            border: 1px solid #002b36;
        }
    </style>
    <link rel="stylesheet" href="/assets/catalog/css/components/bootstrap-markdown-editor.css" />
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js"></script>
    <script type="text/javascript" src="/assets/catalog/js/bootstrap-markdown-editor/bootstrap-markdown-editor.js"></script>
    <script type="text/javascript" src="/assets/catalog/js/bootstrap-markdown-editor/handle.js"></script>

    <script type="text/javascript">
        $(function () {
            var show = false;
            $('.create-comment').on('click', function (e) {
                show = !show;
                e.preventDefault();
                if (show) {
                    $('#panel-create-comment').animate({
                        'bottom': 0,
                    });
                } else {
                    $('#panel-create-comment').animate({
                        'bottom': '-100%',
                    });
                }
            });
        });
    </script>
<?php endif ?>
<?php echo $footer ?>