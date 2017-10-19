<!DOCTYPE html>
<html lang="vi">
<head>
    <base href="<?php echo base_url() ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($document_title) ? $document_title : '' ?></title>

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
    <script src="/assets/admin/js/common.js"></script>
    <link href="/assets/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/css/components.css" rel="stylesheet" type="text/css" />
</head>
<body class="<?php echo isset($body_class) ? $body_class : '' ?>">
    <div id="container">
        <?php echo isset($content) ? $content : '' ?>
    </div>
</body>
</html>
