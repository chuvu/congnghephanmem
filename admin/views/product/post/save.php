<?php echo $header ?>
<?php echo $column_left ?>
<div id="content">
    <div class="page-header">
        <div class="container">
            <div class="pull-right">
                <button class="btn btn-primary" id="btn-save"><i class="fa fa-save"></i> Lưu</button>
                <button class="btn btn-default"><i class="fa fa-reply"></i> Hủy</button>
            </div>
            <h1><?php echo $mode == 'create' ? 'Thêm sản phẩm tại ' . $category->name : $post->name ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) : ?>
                    <li><a href="<?php echo $breadcrumb['url'] ?>"><?php echo $breadcrumb['name'] ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div class="container">
        <div role="tabpanel">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active">
                    <a href="#post" aria-controls="post" role="tab" data-toggle="tab"><i class="fa fa-file-o"></i> Đămg sản phẩm</a>
                </li>
                <li role="presentation">
                    <a href="#discuss" aria-controls="discuss" role="tab" data-toggle="tab"><i class="fa fa-discussions"></i> Bình luận</a>
                </li>
            </ul>
        
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="post">
                    <form data-toggle="ajax-form" method="post" action="<?php echo $mode == 'create' ? 'api/product/post/store' : 'api/product/post/'. $post->id .'/update' ?>">
                        <input type="hidden" name="redirect" value="<?php echo url('product/category/' . $category->id) ?>">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-file-o"></i> Nội dung sản phẩm</h3>
                            </div>
                            <div class="panel-body">
                                <div class="">
                                    <div class="form-group">
                                        <input type="text" value="<?php echo $post->name ?>" class="form-control" name="name" placeholder="Tên sản phẩm" />
                                    </div>
                                    <div class="form-group">
                                        <textarea name="content" data-toggle="markdown-editor"><?php echo $post->content ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($mode == 'create') : ?>
                            <input type="hidden" name="author_id" value="<?php echo $this->auth->user()->id ?>" />
                        <?php endif ?>
                        <input type="hidden" name="category_id" value="<?php echo $category->id ?>" />
                        <input type="hidden" name="status" value="1" />
                        <input type="submit" class="hidden" />
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="discuss">
                    <?php if ($mode == 'create') : ?>
                        Chỉ có thể bình luận khi đã lưu sản phẩm
                    <?php else : ?>
                        <div class="table-responsive">
                            <table class="table master-table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Chủ đề</th>
                                        <th>Tác giả</th>
                                        <th>Trạng thái</th>
                                        <th>Đăng lúc</th>
                                        <th class="text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $discussion_row = 1 ?>
                                    <?php if ($discussions) : ?>
                                        <?php foreach ($discussions as $discussion) : ?>
                                            <tr>
                                                <td>#<?php echo $discussion_row ?></td>
                                                <td>
                                                    <a href="<?php echo url('product/discussion/' . $discussion->id) ?>"><strong><?php echo $discussion->name ?></strong></a>    
                                                </td>
                                                <td>
                                                    <a href=""><img class="img-circle" src="photo/resize/30x30/<?php echo $discussion->avatar ?>" alt="" /> <?php echo $discussion->lastname ?> <?php echo $discussion->firstname ?></a>
                                                </td>
                                                <td>
                                                    <select class="form-control input-sm post-status">
                                                        <option <?php echo $discussion->status == 1 ? 'selected' : '' ?> value="1">Đăng</option>
                                                        <option <?php echo $discussion->status == 0 ? 'selected' : '' ?> value="0">Ẩn</option>
                                                    </select>
                                                </td>
                                                <td><?php echo $discussion->created_at ?></td>
                                                <td class="text-right">
                                                    <a href="<?php echo url('product/discussion/' . $discussion->id) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="6">
                                                <i class="fa fa-warning"></i> Không có chủ đề bình luận nào!
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/assets/admin/css/components/bootstrap-markdown-editor.css" />
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/bootstrap-markdown-editor/bootstrap-markdown-editor.js"></script>
<script type="text/javascript" src="/assets/admin/js/bootstrap-markdown-editor/handle.js"></script>
<script type="text/javascript">
    $(function () {
        $('#btn-save').click(function (e) {
            e.preventDefault();
            $('form input[type="submit"]').trigger('click');
        });
    });
</script>
<?php echo $footer ?>