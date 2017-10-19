<!doctype html>
<html>
    <head>
        <base href="<?php echo base_url() ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="author" content="Chu Vụ">
        <meta name="description" content="">
        <title><?php echo isset($document_title) ? $document_title : '' ?></title>
        <link rel="stylesheet" href="/vendor/css/pojoaque.min.css">
        <script src="/vendor/js/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>

        <script src="/vendor/js/jquery.min.js"></script>
        <script src="/vendor/js/jquery.form.js" type="text/javascript" charset="utf-8"></script>
        
        <script src="/vendor/js/toastr.min.js" type="text/javascript" charset="utf-8"></script>
        <link href="/vendor/css/animate.min.css" rel="stylesheet" type="text/css" />
        
        <link href="/vendor/css/toastr.css" rel="stylesheet" type="text/css" />

        <link href="/assets/catalog/css/theme.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="/vendor/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/vendor/css/style.css">
        <link rel="stylesheet" type="text/css" href="/vendor/css/custom.css">

        <link rel="stylesheet" type="text/css" href="/vendor/fonts/fontawesome/css/font-awesome.min.css">
        

        
        <script src="/vendor/js/bootstrap.min.js"></script>
        
    </head>
    <body class="<?php echo isset($body_class) ? $body_class : '' ?>">
        <?php echo $content ?>

        <?php if (!$logged_in) : ?>
            <div class="modal fade" id="modal-login">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Đăng nhập</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="api/login/attempt" data-toggle="ajax-form">
                                <input type="hidden" name="redirect" value="<?php echo url(uri_string()) ?>" />
                                <div class="form-group">
                                    <label for="email" class="control-label">Địa chỉ email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input autocomplete="off" id="email" placeholder="Địa chỉ email" type="email" class="form-control" name="email" value="" required="" autofocus="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label">Mật khẩu</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input autocomplete="off" id="password" placeholder="Mật khẩu" type="password" class="form-control" name="password" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input checked="" type="checkbox" name="remember"> Nhớ mật khẩu
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary" id="button-login">
                                        <i class="fa fa-key"></i> Đăng nhập
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modal-register">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Đăng ký tài khoản</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="api/register/store" data-toggle="ajax-form">
                                <input type="hidden" name="redirect" value="<?php echo url(uri_string()) ?>" />
                                <div class="form-group">
                                    <label for="email" class="control-label">Địa chỉ email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                        <input id="email" placeholder="Địa chỉ email" type="email" class="form-control" name="email" value="" required="" autofocus="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label">Mật khẩu</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input id="password" placeholder="Mật khẩu" type="password" class="form-control" name="password" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Nhập lại mật khẩu</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input id="password" placeholder="Nhập lại mật khẩu" type="password" class="form-control" name="password_confirmation" required="">
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
                </div>
            </div>
        <?php else : ?>
            <form id="logout-form" action="logout" method="POST" style="display: none;"></form>
        <?php endif ?>

        <script src="/assets/catalog/js/common.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/vendor/js/custom.js"></script>
    </body>
</html>