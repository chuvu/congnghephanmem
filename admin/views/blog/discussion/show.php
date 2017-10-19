<?php echo $header ?>
<?php echo $column_left ?>
<div id="content">
    <div class="page-header">
        <div class="container">
            <h1><?php echo $discussion->name ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) : ?>
                <li><a href="<?php echo $breadcrumb['url'] ?>"><?php echo $breadcrumb['name'] ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-sm-offset-1">

                <section class="comment-list">
                    <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <div class="text-center">#1</div>
                            <figure class="thumbnail">
                                <img class="img-responsive" src="photo/resize/70x70/<?php echo !empty($discussion->avatar) ? $discussion->avatar : 'storage/no-avatar.png' ?>" />
                            </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <header class="text-left">
                                        <div class="comment-user">
                                            <i class="fa fa-user"></i>
                                            <strong><?php echo $discussion->lastname ?> <?php echo $discussion->firstname ?></strong>
                                        </div>
                                        <time class="comment-date" datetime="<?php echo date_format(date_create($discussion->created_at), 'd-m-Y h:i') ?>"><i class="fa fa-clock-o"></i> <?php echo date_format(date_create($discussion->created_at), 'd-m-Y h:i') ?></time>
                                    </header>
                                    <div class="comment-post">
                                        <?php echo $discussion->content ?>
                                    </div>
                                    <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> Trả lời</a></p>
                                </div>
                            </div>
                        </div>
                    </article>
                </section>
                <table style="background: #fff;" class="table table-bordered">
                    <tr>
                        <td style="width: 50%" class="text-center"><h4><?php echo $comments_count ?></h4> Bình luận</td>
                        <td style="width: 50%" class="text-center"><h4><?php echo $authors_count ?></h4>Người tham gia trả lời</td>
                    </tr>
                </table>
                <!-- comments -->
                <?php $comment_row = 2 ?>
                <?php foreach ($comments as $item) : ?>
                    <section class="comment-list">
                        <article class="row">
                            <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
                                <div class="text-center">
                                    #<?php echo $comment_row ?>
                                </div>
                                <figure class="thumbnail">
                                    <img class="img-responsive" src="photo/resize/70x70/<?php echo !empty($item->avatar) ? $item->avatar : 'storage/no-avatar.png' ?>" />
                                </figure>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <div class="panel panel-default arrow left">
                                    <div class="panel-body">
                                        <header class="text-left">
                                            <div class="comment-user">
                                                <i class="fa fa-user"></i>
                                                <strong><?php echo $item->lastname ?> <?php echo $item->firstname ?></strong>
                                            </div>
                                            <time class="comment-date" datetime="<?php echo date_format(date_create($item->created_at), 'd-m-Y h:i') ?>"><i class="fa fa-clock-o"></i> <?php echo date_format(date_create($discussion->created_at), 'd-m-Y h:i') ?></time>
                                        </header>
                                        <div class="comment-post">
                                            <?php echo $item->content ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                    <?php $comment_row++ ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="page-footer">
        <div class="container">
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object thumbnail img-circle" src="photo/resize/45x45/<?php echo $user->avatar ?>" alt="Image">
                </a>
                <div class="media-body">
                    <div role="tabpanel">
                        <ul class="nav nav-tabs tab-sm" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#editor-basic" aria-controls="editor-basic" role="tab" data-toggle="tab">Trinh soạn cơ bản</a>
                            </li>
                            <li role="presentation">
                                <a href="#editor-markdown" aria-controls="editor-markdown" role="tab" data-toggle="tab">Trình soạn nâng cao</a>
                            </li>
                        </ul>
                    
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="editor-basic">
                                <form action="api/forum/comment/store" data-toggle="ajax-form" method="post" style="display: inline" />
                                    <input type="hidden" name="author_id" value="<?php echo $user->id ?>">
                                    <input type="hidden" name="post_id" value="<?php echo $discussion->id ?>">
                                    <input type="hidden" name="parent_id" value="0">
                                    <input type="hidden" name="redirect" value="<?php echo url('blog/discussion/' . $discussion->id) ?>">
                                    <input autocomplete="off" id="input-basic" name="content" class="form-control" style="border: none; box-shadow: none; width: 100%;" placeholder="Nhập bình luận của bạn và nhấn enter để gửi." />
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="editor-markdown">
                                <form action="api/forum/comment/store" data-toggle="ajax-form" method="post" style="display: inline" />
                                    <div style="margin-bottom: 15px">
                                        <input type="hidden" name="author_id" value="<?php echo $user->id ?>">
                                        <input type="hidden" name="post_id" value="<?php echo $discussion->id ?>">
                                        <input type="hidden" name="parent_id" value="0">
                                        <input type="hidden" name="redirect" value="<?php echo url('blog/discussion/' . $discussion->id) ?>">
                                        <textarea autocomplete="off" name="content" data-toggle="markdown-editor" data-height="200px"></textarea>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/assets/admin/css/components/bootstrap-markdown-editor.css" />
<script type="text/javascript" src="/vendor/js/ace.js"></script>
<script type="text/javascript" src="/vendor/js/marked.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/bootstrap-markdown-editor/bootstrap-markdown-editor.js"></script>
<script type="text/javascript" src="/assets/admin/js/bootstrap-markdown-editor/handle.js"></script>

<script type="text/javascript">
    $(function () {
        $('#content').css({
            'padding-bottom': ($('.page-footer').height() + 30),
        });
    });
</script>
<?php echo $footer ?>