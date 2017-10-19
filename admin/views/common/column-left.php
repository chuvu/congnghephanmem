<nav id="column-left" class="active">
    <div id="header">
        <a href="<?php echo url('/') ?>">
            <!-- <img style="height: 24px" src="/storage/logo.png" alt="" title="" /> -->
            <h2>HuuToanShop</h2>
        </a>
        <a target="_blank" href="<?php e($home) ?>" title="Xem trang" class="pull-right"><i class="fa fa-external-link"></i></a>
    </div>
    <div id="sidebar-menu">
        <div id="profile">
            <div>
                <img src="photo/resize/50x50/<?php e($avatar) ?>" alt="<?php e($firstname) ?> <?php e($lastname) ?>" title="<?php e($fullname) ?>" class="img-circle" />
            </div>
            <div>
                <h4><?php e($firstname) ?> <?php e($lastname) ?></h4>
                <small><?php e($email) ?></small>
            </div>
        </div>
        <div id="menu">
            <?php foreach ($menus as $menu) : ?>
            <div class="menu-group" id="<?php echo $menu['id'] ?>">
                <?php if (!empty($menu['name'])) : ?>
                    <span class="menu-name"></span>
                <?php endif ?>
                <?php if ($menu['childrens']) : ?>
                    <ul class="menu-body">
                        <?php foreach ($menu['childrens'] as $children_1) : ?>
                            <li>
                                <?php if ($children_1['childrens']) : ?>
                                    <a class="parent"><i class="fa <?php echo $children_1['icon'] ?> fa-fw"></i><span><?php echo $children_1['name'] ?></span></a>
                                    <ul class="collapse">
                                        <?php foreach ($children_1['childrens'] as $children_2) : ?>
                                            <li>
                                                <?php if ($children_2['url']) : ?>
                                                    <a <?php echo isset($children_2['id']) ? 'id="'.$children_2['id'].'"' : '' ?> href="<?php echo $children_2['url'] ?>"><?php echo $children_2['name'] ?></a>
                                                <?php else : ?>
                                                    <a class="parent"><?php echo $children_2['name'] ?></a>
                                                <?php endif ?>
                                                <?php if ($children_2['childrens']) : ?>
                                                    <ul>
                                                        <?php foreach ($children_2['childrens'] as $children_3) : ?>
                                                            <li><a href="<?php echo $children_3['url'] ?>"><?php echo $children_3['name'] ?></a></li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                <?php endif ?>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                <?php else : ?>
                                    <a href="<?php echo $children_1['url'] ?>"><i class="fa <?php echo $children_1['icon'] ?> fa-fw"></i><span><?php echo $children_1['name'] ?></span></a>
                                <?php endif ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                <?php endif ?>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</nav>
