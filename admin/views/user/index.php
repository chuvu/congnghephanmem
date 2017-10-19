<?php echo $header ?>
<?php echo $column_left ?>
<div id="content">
    <div class="page-header">
        <div class="container">
            <div class="pull-right">
                <a href="<?php echo url('user/create') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Thêm thành viên</a>
            </div>
            <h1>Danh sách thành viên</h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) : ?>
                    <li><a href="<?php echo $breadcrumb['url'] ?>"><?php echo $breadcrumb['name'] ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div class="container">
        <table class="table master-table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Thành viên</th>
                    <th>Email</th>
                    <th>Ngày sinh</th>
                    <th>Ngày sửa đổi</th>
                    <th class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                <?php $user_row = 1; ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td>#<?php echo $user_row ?></td>
                        <td><?php echo $user->id ?></td>
                        <td>
                            <img class="img-circle" src="photo/resize/30x30/<?php echo !empty($user->avatar) ? $user->avatar : 'storage/no-avatar.png' ?>" alt="" />
                            <a href="<?php echo url('user/' . $user->id) ?>"><strong><?php e($user->lastname . ' ' . $user->firstname, '...') ?></strong></a>
                        </td>
                        <td><?php echo $user->email ?></td>
                        <td><?php e($user->birth, '...') ?></td>
                        <td><?php echo $user->updated_at ?></td>
                        <td class="text-right">
                            <form style="display: inline" action="<?php echo url('user/'.$user->id.'/login-as') ?>" method="post">
                                <button type="submit" class="btn btn-info btn-sm btn-login-as"><i class="fa fa-sign-in"></i></button>
                            </form>
                            <a href="<?php echo url('user/' . $user->id . '/edit') ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $footer ?>