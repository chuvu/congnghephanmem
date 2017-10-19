<?php echo $header ?>
<?php echo $column_left ?>
<div id="content">
    <div class="page-header">
        <div class="container">
            <div class="pull-right">
                <button class="btn btn-primary" id="btn-save"><i class="fa fa-save"></i> Lưu</button>
                <button class="btn btn-default"><i class="fa fa-reply"></i> Hủy</button>
            </div>
            <h1>Đổi mật khẩu</h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) : ?>
                    <li><a href="<?php echo $breadcrumb['url'] ?>"><?php echo $breadcrumb['name'] ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="api/profile/change-password" data-toggle="ajax-form" method="post">
                    <div class="panel panel-default form">
                        <div class="panel-heading"><h3 class="panel-title">Đổi mật khẩu đăng nhập</div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                <div class="form-group required">
                                    <label class="control-label col-sm-2">Mật khẩu cũ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="" name="old_password" placeholder="Mật khẩu cũ" />
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="control-label col-sm-2">Mật khẩu mới</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="" name="old_password" placeholder="Mật khẩu mới" />
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="control-label col-sm-2">Nhập lại mật khẩu</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="" name="old_password" placeholder="Nhập lại mật khẩu" />
                                    </div>
                                </div>
                                <input type="submit" class="hidden" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#btn-save').click(function (e) {
            e.preventDefault();
            $('form input[type="submit"]').trigger('click');
        });
    });
</script>
<?php echo $footer ?>