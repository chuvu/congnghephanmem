<?php echo $header ?>
<div class="container">
    <br /><br /><br /><br /><br /><br />
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Đặt lại mật khẩu</h3></div>
                <div class="panel-body">
                    <form method="POST" action="api/reset-password" data-toggle="ajax-form">
                        <input type="hidden" name="token" value="<?php echo $token ?>">
                        <div class="form-group">
                            <label for="email" class="control-label">Mật khẩu mới</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                <input placeholder="Nhập mật khẩu" type="password" class="form-control" name="password" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label">Nhập lại mật khẩu</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-unlock"></i></span>
                                <input placeholder="Nhập lại mật khẩu" type="password" class="form-control" name="password_confirmation" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Đổi mật khẩu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <a class="" href="login">Đăng nhập</a>
        </div>
    </div>
</div>
<?php echo $footer ?>