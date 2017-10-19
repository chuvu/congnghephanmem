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
            <li>Tác giả: <a href="">Chu Văn Vụ</a></li>
            <li>Đăng lúc <?php echo $post->created_at ?> - Cập nhật lần cuối <?php echo $post->updated_at ?></li>
            <li><a href="">Chủ đề thảo luận</a>: <?php echo $post->discussions_count ? $post->discussions_count : 'Chưa có' ?></li>
        </ul>
        <?php echo $post->content ?>
        <br />
        <br />
        <?php if (!$logged_in) : ?>
            Bạn cần phải <a data-toggle="modal" href="#modal-login">đăng nhập</a> hoặc <a data-toggle="modal" href="#modal-register">tạo tài khoản</a> để có thể tạo chủ đề thảo luận về bài viết này.
        <?php endif ?>
        <h4>
            Chủ đề thảo luận xoay quanh bài viết này
            <?php if ($logged_in) : ?>
                - <a href="" class="create-topic">Tạo chủ đề</a>
            <?php endif ?>
        </h4>
        <?php if ($discussions) : ?>
            <ul>
                <?php foreach ($discussions as $discussion) : ?>
                    <li><a href="<?php echo url('forum/post/' . $discussion->id) ?>"><?php echo $discussion->name ?></a> (<?php echo $discussion->comments_count ? $discussion->comments_count . ' bình luân' : 'Chưa có bình luận nào' ?>)</li>
                <?php endforeach ?>
            </ul>
        <?php else : ?>
            Không có chủ đề nào
        <?php endif ?>

        <div id="panel-create-topic">
            <h4>Tạo chủ đề thảo luận {<button class="btn btn-link create-topic"><i class="fa fa-times"></i> Hủy</button>}</h4>
            <div class="form-horizontal">
                <div class="form-group">
                    <label for="" class="control-label col-sm-2">Tên chủ đề</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Câu hỏi, thắc mắc, ý kiến của bạn về bài viết này. Giới hạn 255 ký tự" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-2">Mô tả chi tiết về chủ đề này</label>
                    <div class="col-sm-10">
                        <textarea data-toggle="markdown-editor" data-height="150px"></textarea>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Gửi</button>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #panel-create-topic {
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
        $('.create-topic').on('click', function (e) {
            show = !show;
            e.preventDefault();
            if (show) {
                $('#panel-create-topic').animate({
                    'bottom': 0,
                });
            } else {
                $('#panel-create-topic').animate({
                    'bottom': '-100%',
                });
            }
        });
    });
</script>
<?php echo $footer ?>