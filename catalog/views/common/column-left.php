<h3 class="home-link"><a href="<?php echo url('/') ?>">Trang chủ - PhamBinh.net</a></h3>
<div id="auth">
    <div style="padding: 4px 0px 4px 15px;">
        <?php if ($logged_in) : ?>
            <a href=""><?php echo $user->lastname ?> <?php echo $user->firstname ?></a> - <a id="logout" href="logout">Đăng xuất</a>
        <?php else : ?>
            Đang duyệt với tư cách khách <br />
            <a data-toggle="modal" href="#modal-login">Đăng nhập</a> / <a data-toggle="modal" href="#modal-register">Đăng ký</a>
        <?php endif ?>
    </div>
</div>
<?php if ($posts) : ?>
<div id="last-posts" class="open">
    <h3 data-open="last-posts">Bài viết mới</h3>
    <ul>
        <?php foreach ($posts as $post) : ?>
            <li><a href="<?php echo url('blog/post/' . $post->id) ?>"><?php echo $post->name ?></a></li>
        <?php endforeach ?>
    </ul>
</div>
<?php endif ?>
<?php if ($categories) : ?>
<div id="categories" class="open">
    <h3 data-open="categories">Danh mục</h3>
        <ul class="categories">
            <?php foreach ($categories as $category) : ?>
                <li>
                    <a href="<?php echo url('blog/category/' . $category->id) ?>"><?php echo $category->name ?></a>
                </li>
            <?php endforeach ?>
        </ul>
</div>
<?php endif ?>
