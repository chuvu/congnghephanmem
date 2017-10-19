<?php echo $header ?>
<div class="container">
    <br /><br /><br /><br /><br /><br />
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Quên mật khẩu</h3></div>
                <div class="panel-body">
                    <form method="POST" action="api/forgot-password/send-email" data-toggle="ajax-form">
                        <div class="form-group">
                            <label for="email" class="control-label">Địa chỉ email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input id="email" placeholder="Địa chỉ email" type="email" class="form-control" name="email" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-paper-plane"></i> Gửi liên kết khôi phục mật khẩu
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