<?php echo $header ?>
<?php echo $column_left ?>
<div id="content">
    <div class="page-header">
        <div class="container">
            <div class="pull-right">
                <button id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                <a href="<?php echo url('user') ?>" class="btn btn-default"><i class="fa fa-reply"></i> Hủy</a>
            </div>
            <h1><?php echo $mode == 'create' ? 'Thêm thành viên' : 'Chỉnh sửa thành viên' ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) : ?>
                    <li><a href="<?php echo $breadcrumb['url'] ?>"><?php echo $breadcrumb['name'] ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div class="container">
        <form action="<?php echo $mode == 'create' ? 'api/user/store' : 'api/user/'.$user->id.'/update' ?>" data-toggle="ajax-form" method="post">
            <input type="hidden" name="redirect" value="<?php echo url('user') ?>">
            <div class="panel panel-default form">
                <div class="panel-heading"><h3 class="panel-title">Thông tin thành viên</h3></div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-2">Ảnh đại diện</label>
                            <div class="col-sm-10">
                                <div class="input-image" data-toggle="input-image">
                                    <img src="/photo/resize/100x100/<?php echo $user->avatar_preview ?>">
                                    <input type="hidden" name="avatar" value="<?php echo $user->avatar ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-2">Email</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?php echo e($user->email) ?>" class="form-control" name="email" placeholder="Email" />
                                <p class="help-block">Email dùng để đăng nhập, lấy lại mật khẩu và nhận thông báo từ hệ thống.</p>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-2">Họ và tên</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" value="<?php e($user->lastname) ?>" class="form-control" name="lastname" placeholder="Họ và tên đệm" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" value="<?php e($user->firstname) ?>" class="form-control" name="firstname" placeholder="Tên đầu" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Ngày sinh</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php e($user->birth) ?>" name="birth" placeholder="00-00-0000">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php e($user->phone) ?>" name="phone" placeholder="Số điện thoại">
                            </div>
                        </div>
                        <?php if ($mode == 'create') : ?>
                            <div class="form-group required">
                                <label class="control-label col-sm-2">Mật khẩu</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input autocomplete="off" type="password" value="<?php e($user->password) ?>" class="form-control" name="password" placeholder="Mật khẩu">
                                        <span class="input-group-btn">
                                            <button id="view-password" class="btn btn-default" type="button"><i class="fa fa-eye"></i></button>
                                        </span>
                                    </div>
                                    <p class="help-block">Mật khẩu sau này có thể thiết lập lại được.</p>
                                </div>
                            </div>
                        <?php endif ?>
                        <input type="submit" id="trigger-save" class="hidden" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#btn-save').on('click', function (e) {
            e.preventDefault();
            $('#trigger-save').trigger('click');
        });

        $('#view-password').on('click', function (e) {
            e.preventDefault();
            var $input = $(this).closest('.input-group').find('input');
            var type = $input.attr('type') == 'text' ? 'password' : 'text';
            $input.attr('type', type);
        });
    });
</script>
<?php echo $footer ?>