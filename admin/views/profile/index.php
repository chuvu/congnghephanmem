<?php echo $header ?>
<?php echo $column_left ?>
<div id="content">
    <div class="page-header">
        <div class="container">
            <div class="pull-right">
                <button class="btn btn-primary" id="btn-save"><i class="fa fa-save"></i> Lưu</button>
                <button class="btn btn-default"><i class="fa fa-reply"></i> Hủy</button>
            </div>
            <h1>Thông tin cá nhân</h1>
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
                <form action="api/profile/update" data-toggle="ajax-form" method="post">
                    <div class="panel panel-default form">
                        <div class="panel-heading"><h3 class="panel-title"><?php e($user->lastname) ?> <?php e($user->firstname) ?></h3></div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Ảnh đại diện</label>
                                    <div class="col-sm-10">
                                        <div class="input-image" data-toggle="input-image">
                                            <img src="photo/resize/100x100/<?php e($user->avatar_preview) ?>" />
                                            <input type="hidden" name="avatar" value="<?php e($user->avatar) ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="control-label col-sm-2">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php e($user->email) ?>" class="form-control" name="email" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="control-label col-sm-2">Họ và tên</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" value="<?php e($user->lastname) ?>"  class="form-control" name="lastname" placeholder="Họ và tên đệm" />
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
                                        <input type="text" class="form-control" value="<?php e($user->birth) ?>" name="birth" placeholder="Ngày sinh" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Số điện thoại</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php e($user->phone) ?>" name="phone" placeholder="Số điện thoại" />
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