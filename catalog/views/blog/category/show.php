<?php echo $header ?>
<div class="page-container container-fluid">
    <div class="col-md-3 menu">
        <nav class="col-md-3">
            <?php echo $column_left ?>
        </nav>
    </div>
    <div class="col-md-9 content">
        <h1># <?php echo $category->name ?></h1>
        <?php if ($posts) : ?>
            <?php foreach ($posts as $post) : ?>
                <div class="articles-list">
                    <article>
                        <h3> - <a href="<?php echo url('blog/post/' . $post->id) ?>"><?php echo $post->name ?></a></h3>
                    </article>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>
<?php echo $footer ?>