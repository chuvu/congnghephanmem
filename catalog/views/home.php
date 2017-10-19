<?php echo $header ?>
<!-- begin content -->
<div class="content">
    <!-- begin main slide -->
    <div class="mainslie">
        <div class="slides">
            <!-- slide bs3 -->
            <div class="container">
                <div id="main-slide" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#main-slide" data-slide-to="0" class=""></li>
                        <li data-target="#main-slide" data-slide-to="1" class=""></li>
                        <li data-target="#main-slide" data-slide-to="2" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item">
                            <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="<?php echo base_url(); ?>/vendor/images/slide4.jpg">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1>Sản phẩm bán chạy nhất</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut beatae architecto hic repudiandae perferendis, provident aliquid quod fugit consequuntur nemo.</p>
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Khuyến mại</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="<?php echo base_url(); ?>/vendor/images/slide4.jpg">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1>Sản phẩm mới nhất</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit nobis soluta possimus. Assumenda facilis, quo omnis fugit ipsum molestiae?</p>
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Xem thêm</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item active">
                            <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="<?php echo base_url(); ?>/vendor/images/slide4.jpg">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1>Sản phẩm được mua nhiều nhất</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure porro quibusdam delectus eaque quo veniam! Sit minus quam fuga magnam!</p>
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Mua ngay</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#main-slide" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#main-slide" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
            <!-- /.END bs3 -->
        </div>
    </div>
    <!-- /.END main slide -->
    
    <div class="background-content">
        <!-- bengin tab below main slide -->
        <div class="container">
            <!-- begin tab first -->
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#myphamhot" aria-controls="myphamhot" role="tab" data-toggle="tab">Mỹ phẩm hót</a>
                    </li>
                    <li role="presentation">
                        <a href="#myphamcu" aria-controls="tab" role="tab" data-toggle="tab">Mỹ phẩm cũ</a>
                    </li>
                </ul>
            
                <!-- Tab panes -->
                
                <div class="tab-content">
                    <!-- BEGIN tab mỹ phẩm hót -->
                    <div role="tabpanel" class="tab-pane active" id="myphamhot">
                        <div class="row">
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                            <div class="quickview">
                                                <a class="btn btn-primary btnquickviewct" data-toggle="modal" href='#modal-id'>Xem nhanh</a>
                                                <div class="modal fade" id="modal-id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Thông tin chi tiết</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="vovan">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            

                        </div>
                    </div>
                    <!-- /.END tab mỹ phẩm hót -->
                    <div role="tabpanel" class="tab-pane" id="myphamcu">
                        <div class="row">
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- end tab first -->

            <!-- begin tab 2 -->
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#sanphamnoibat" aria-controls="sanphamnoibat" role="tab" data-toggle="tab">Sản phẩm nổi bật</a>
                    </li>
                    <li role="presentation">
                        <a href="#sanphambanchay" aria-controls="sanphambanchay" role="tab" data-toggle="tab">Sản phẩm bán chạy</a>
                    </li>
                </ul>
            
                <!-- Tab panes -->
                
                <div class="tab-content">
                    <!-- BEGIN tab mỹ phẩm hót -->
                    <div role="tabpanel" class="tab-pane active" id="sanphamnoibat">
                        <div class="row">
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>

                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            

                        </div>
                    </div>
                    <!-- /.END tab mỹ phẩm hót -->
                    <div role="tabpanel" class="tab-pane" id="sanphambanchay">
                        <div class="row">
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>

                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- end tab 2 -->

            <!-- begin tab 3 -->
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#sanphammoi" aria-controls="sanphammoi" role="tab" data-toggle="tab">Sản phẩm mới</a>
                    </li>
                    <li role="presentation">
                        <a href="#sanphamhangdau" aria-controls="sanphamhangdau" role="tab" data-toggle="tab">Sản phẩm hàng đầu</a>
                    </li>
                </ul>
            
                <!-- Tab panes -->
                
                <div class="tab-content">
                    <!-- BEGIN tab mỹ phẩm hót -->
                    <div role="tabpanel" class="tab-pane active" id="sanphammoi">
                        <div class="row">
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>

                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp2.png" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            

                        </div>
                    </div>
                    <!-- /.END tab mỹ phẩm hót -->
                    <div role="tabpanel" class="tab-pane" id="sanphamhangdau">
                        <div class="row">
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>

                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/sp4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>
                            <div class="col-sm-6 col-md-512">
                                <!-- one product -->
                                <div class="oneproduct">
                                    <div class="content-oneproduct">
                                        <div class="image-product">
                                            <a href="#prd">
                                                <img src="<?php echo base_url(); ?>/vendor/images/anh4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-product text-center">
                                        <div class="name-prd">
                                            <a href="">Mỹ phẩm cao cấp</a>
                                        </div>
                                        <div class="price">200.000đ</div>

                                    </div>
                                    <a href="<?php echo base_url(); ?>product/detail" class="link-product">
                                        <div class="more-info">
                                            <ul>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                                <li>✎ Lorem ipsum dolor sit.</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <!-- /END one product -->
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- end tab 3 -->
        </div> <!-- end container -->
        <!-- /.END tab below main slide -->

    </div>
</div>
<!-- /.END content -->
<?php echo $footer ?>