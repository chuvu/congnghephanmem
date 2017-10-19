<?php echo $header ?>
<div class="page-container container-fluid">
    <div class="col-md-3 menu">
        <nav class="col-md-3">
            <?php echo $column_left ?> <!-- cột trái trang chủ -->
        </nav>
    </div>
    <div class="col-md-9 content">
        <h2># Chủ đề thảo luận mới</h2>
        <?php if ($discussions) : ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Chủ đề</th>
                        <th>Thành viên</th>
                        <th>Trả lời</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $discussion_row = 1 ?>
                    <?php foreach ($discussions as $discussion) : ?>
                        <tr>
                            <td>#<?php echo $discussion_row ?></td>
                            <td><a href="<?php echo url('forum/post/' . $discussion->id) ?>"><?php echo $discussion->name ?></a></td>
                            <td>
                                <a href=""><img class="img-circle" src="photo/resize/30x30/<?php echo $discussion->avatar ?>" alt="" /> <?php echo $discussion->lastname ?> <?php echo $discussion->firstname ?></a>
                            </td>
                            <td><?php echo $discussion->comments_count ?></td>
                        </tr>
                    <?php $discussion_row++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Không có chủ đề nà1o!</p>
        <?php endif ?>
        <?php if ($posts) : ?>
            <h2># Blog mới</h2>
            <?php foreach ($posts as $post) : ?>
                <div class="articles-list">
                    <article>
                        <h3> - <a href="<?php echo url('blog/post/' . $post->id) ?>"><?php echo $post->name ?></a> - <?php echo $post->updated_at ?></h3>
                        <p><?php echo $post->sub_content ?></p>
                    </article>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>
<?php echo $footer ?>