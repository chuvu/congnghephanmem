<?php echo $header ?>

<!-- begin content -->

<div class="product-details">
    <div class="container">
        <div class="row">
            <h2 class="text-center bg-danger">Chi tiết sản phẩm</h2>
            <div class="col-sm-5">
                <div class="imgproductdetail">
                    <img src="<?php echo base_url(); ?>vendor/images/sp2.png" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-7">
                <div class="khuyenmai bg-success">
                    <h2>Khuyến mại - Hỗ trợ</h2>
                    <ul>
                        <li>✎ Mua 1 tặng 2</li>
                        <li>✎ Mua 1 tặng 2</li>
                        <li>✎ Mua 1 tặng 2</li>
                        <li>✎ Mua 1 tặng 2</li>
                    </ul>
                </div>
                <div class="tinhtrang bg-danger">
                    <h2>Tình trạng hiện tại</h2>
                    <ul>
                        <li>✎ Sản phẩm mới 100%</li>
                        <li>✎ Sản phẩm mới 100%</li>
                        <li>✎ Sản phẩm mới 100%</li>
                        <li>✎ Sản phẩm mới 100%</li>
                    </ul>
                </div>
                <div class="giaohangtannoi bg-primary">
                    <h2>Giao hàng tận nơi</h2>
                    <ul>
                        <li>✎ Giao hàng miễn phí</li>
                        <li>✎ Giao hàng miễn phí</li>
                        <li>✎ Giao hàng miễn phí</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="thongso">
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#thongtin" aria-controls="thongtin" role="tab" data-toggle="tab">Thông tin</a>
                    </li>
                    <li role="presentation">
                        <a href="#nhanxet" aria-controls="nhanxet" role="tab" data-toggle="tab">Nhận xét</a>
                    </li>
                </ul>
            
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="thongtin">Đây là phần thông tin của sản phẩm...</div>
                    <div role="tabpanel" class="tab-pane" id="nhanxet">Đây là phần nhận xét về sản phẩm...</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.END content -->

<?php echo $footer ?>