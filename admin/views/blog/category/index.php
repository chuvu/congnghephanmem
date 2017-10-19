<?php echo $header ?>
<?php echo $column_left ?>
<div id="content">
    <div class="page-header">
        <div class="container">
            <div class="pull-right">
                <?php if (can('blog.category.create')) : ?>
                    <a id="btn-new-folder" href="<?php echo url('blog/category/' . $category->id . '/post/create') ?>" class="btn btn-primary"><i class="fa fa-folder-open"></i> Danh mục mới</a>
                <?php endif ?>
                <?php if (can('blog.post.create')) : ?>
                    <a href="<?php echo url('blog/category/' . $category->id . '/post/create') ?>" class="btn btn-primary"><i class="fa fa-file-o"></i> Bài viết mới</a>
                <?php endif ?>
            </div>
            <h1><?php echo $category->name ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) : ?>
                    <li><a href="<?php echo $breadcrumb['url'] ?>"><?php echo $breadcrumb['name'] ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div class="container">
        <table class="table master-table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Loại</th>
                    <th>Tác giả</th>
                    <th>Trạng thái</th>
                    <th>Ngày thay đổi</th>
                    <th class="text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $row = 1 ?>
                <?php foreach ($categories as $item) : ?>
                    <tr data-category='<?php echo json_encode($item, JSON_HEX_APOS) ?>'>
                        <td>#<?php echo $row ?></td>
                        <td><strong><?php echo $item->id ?></strong></td>
                        <td class="category-name">
                            <a href="<?php echo url('blog/category/' . $item->id) ?>"><strong><i class="fa fa-folder-open"></i>  <span class="name"><?php echo $item->name ?></span></strong></a>
                        </td>
                        <td>Danh mục bài viết</td>
                        <td>Chu Vụ</td>
                        <td>...</td>
                        <td>...</td>
                        <td class="text-right">
                            <?php if (can('blog.category.edit')) : ?>
                                <a href="" class="btn btn-primary btn-sm btn-edit-category"><i class="fa fa-pencil"></i></a>
                            <?php endif ?>
                            <?php if (can('blog.category.destroy')) : ?>
                                <button class="btn btn-danger btn-sm btn-remove-category"><i class="fa fa-trash"></i></button>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $row++ ?>
                <?php endforeach ?>
                <?php foreach ($posts as $item) : ?>
                    <tr data-post='<?php echo json_encode($item, JSON_HEX_APOS) ?>'>
                        <td>#<?php echo $row ?></td>
                        <td><strong><?php echo $item->id ?></strong></td>
                        <td><a href="<?php echo url('blog/post/'. $item->id .'/edit/') ?>"><strong><i class="fa fa-file-o"></i> <?php echo $item->name ?></strong></a></td>
                        <td>Bài viết</td>
                        <td>
                            <img class="img-circle" src="photo/resize/30x30/<?php echo $item->avatar ?>" alt="" />
                        </td>
                        <td>
                            <select class="form-control input-sm post-status">
                                <option <?php echo $item->status == 1 ? 'selected' : '' ?> value="1">Đăng</option>
                                <option <?php echo $item->status == 0 ? 'selected' : '' ?> value="0">Ẩn</option>
                            </select>
                        </td>
                        <td>
                            <?php echo $item->updated_at ?>
                        </td>
                        <td class="text-right">
                            <?php if (can('blog.post.edit')) : ?>
                                <a href="<?php echo url('blog/post/'. $item->id .'/edit/') ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <?php endif ?>
                            <?php if (can('blog.post.destroy')) : ?>
                                <button class="btn btn-danger btn-sm btn-remove-post"><i class="fa fa-trash"></i></button>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $row++ ?>
                <?php endforeach ?>
                <?php if ($row == 1) : ?>
                    <tr>
                        <td class="text-center" colspan="8">
                            <p><i class="fa fa-warning"></i> Danh mục trống!</p>
                        </td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(function () {
        <?php if (can('blog.category.create')) : ?>
            $('#btn-new-folder').on('click', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'api/blog/category/store',
                    dataType: 'json',
                    data: {
                        name: 'New folder',
                        parent_id: '<?php echo $category->id ?>',
                    },
                    success: function () {
                        location.reload(true);
                    },
                });
            });
        <?php endif ?>

        <?php if (can('blog.category.edit')) : ?>
            $('.btn-edit-category').click(function (e) {
                e.preventDefault();
                var $tr = $(this).closest('tr');
                var category = $.parseJSON($tr.attr('data-category'));
                var $grid = $tr.find('.category-name');
                $grid.find('>a').hide();

                if ($grid.find('.input-group').length == 0) {
                    $grid.append(`
                        <div class="input-group">
                            <input style="width: auto" autofocus type="text" name="category_name" value="`+ category.name +`" class="form-control input-sm" placeholder="" />
                            <span class="input-group-btn" style="display: block">
                                <button class="btn btn-default btn-sm btn-category-save" type="button"><i class="fa fa-save"></i></button>
                            </span>
                        </div>
                    `);
                }
            });
        <?php endif ?>

        <?php if (can('blog.category.edit')) : ?>
            $('.post-status').on('change', function (e) {
                var value = $(this).val();
                var $tr = $(this).closest('tr');
                var post = $.parseJSON($tr.attr('data-post'));

                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: 'api/blog/post/' + post.id + '/update',
                    data: {
                        status: value
                    },
                    success: function (res) {
                        if (res.hasOwnProperty('message')) {
                            toastr.success(res.message, 'Đã thực hiện');
                        }
                    },
                    error: function (xhr, status, error) {
                        return ajaxFormError(xhr, status, error, $tr);
                    },
                })
            });
        <?php endif ?>

        <?php if (can('blog.category.destroy')) : ?>
            $('.btn-remove-category').on('click', function (e) {
                e.preventDefault();
                var $tr = $(this).closest('tr');
                var category = $.parseJSON($tr.attr('data-category'));
                if (!confirm('Bạn có chắc muốn xóa')) {
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: 'api/blog/category/' + category.id + '/destroy',
                    success: function () {
                        toastr.success('Đã xóa', 'Đã thực hiện');
                        $tr.fadeOut(function () {
                            $(this).remove();
                        });
                    },
                    error: function (xhr, status, error) {
                        return ajaxFormError(xhr, status, error, $tr);
                    },
                });
            });
        <?php endif ?>

        <?php if (can('blog.post.destroy')) : ?>
            $('.btn-remove-post').on('click', function (e) {
                e.preventDefault();
                var $tr = $(this).closest('tr');
                var post = $.parseJSON($tr.attr('data-post'));
                if (!confirm('Bạn có chắc muốn xóa')) {
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: 'api/blog/post/' + post.id + '/destroy',
                    success: function () {
                        toastr.success('Đã xóa', 'Đã thực hiện');
                        $tr.fadeOut(function () {
                            $(this).remove();
                        });
                    },
                    error: function (xhr, status, error) {
                        return ajaxFormError(xhr, status, error, $tr);
                    },
                });
            });
        <?php endif ?>

        <?php if (can('blog.category.edit')) : ?>
            $(document).off('click').on('click', '.btn-category-save', function (e) {
                e.preventDefault();
                var $button = $(this);
                var $tr = $(this).closest('tr');
                var $input = $(this).closest('.input-group').find('input[name="category_name"]');
                var $grid = $tr.find('.category-name');
                var category = $.parseJSON($tr.attr('data-category'));
                var categoryName = $input.val();

                $input.parent().removeClass('has-error');
                $button.button('loading');

                if (categoryName.trim() == '') {
                    $input.parent().addClass('has-error');
                    $input.focus();
                    $button.button('reset');
                    return false;
                }

                $.ajax({
                    type: 'post',
                    url: 'api/blog/category/' + category.id +'/update',
                    data: {
                        name: categoryName,
                    },
                    complete: function () {
                        $button.button('reset');
                    },
                    success: function (res) {
                        $grid.find('>a span.name').text(res.category.name);
                        $grid.find('>a').show();
                        $grid.find('.input-group').remove();
                        $tr.attr('data-category', JSON.stringify(res.category));
                    },
                });
            });
        <?php endif ?>
        
        <?php if (can('blog.category.edit')) : ?>
            $(document).on('keyup', 'input[name="category_name"]', function (e) {
                if (e.which == 13) {
                    var $tr = $(this).closest('tr');
                    $tr.find('.btn-category-save').trigger('click');
                }
            });
        <?php endif ?>

        <?php if (can('blog.category.edit')) : ?>
            $(document).on('blur', 'input[name="category_name"]', function (e) {
                var $tr = $(this).closest('tr');
                $tr.find('.btn-category-save').trigger('click');
            });
        <?php endif ?>
    });
</script>
<?php echo $footer ?>
