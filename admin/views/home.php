<?php echo $header ?>
<?php echo $column_left ?>
<div id="content">
    <div class="page-header">
        <div class="container">
            <h1>Bảng quản trị</h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) : ?>
                    <li><a href="<?php echo $breadcrumb['url'] ?>"><?php echo $breadcrumb['name'] ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div class="container">
        
    </div>
</div>
<?php echo $footer ?>