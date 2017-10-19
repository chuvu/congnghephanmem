<?php echo $header ?>
<div class="container">
    <br /><br /><br /><br /><br /><br />
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Đăng ký tài khoản</h3></div>
                <div class="panel-body">
                    <form method="POST" action="api/register/store" data-toggle="ajax-form">
                        <div class="form-group">
                            <label for="email" class="control-label">Địa chỉ email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                <input id="email" placeholder="Địa chỉ email" type="email" class="form-control" name="email" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label">Mật khẩu</label>
                            
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="password" placeholder="Mật khẩu" type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Nhập lại mật khẩu</label>
                            
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="password" placeholder="Nhập lại mật khẩu" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary" id="button-login">
                                <i class="fa fa-user-plus"></i> Đăng ký
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <a class="" href="forgot-password">Quên mật khẩu</a>
        </div>
    </div>
</div>
<?php echo $footer ?>