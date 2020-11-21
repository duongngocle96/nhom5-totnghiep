<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>T-SHOP</title>
    <link rel="shortcut icon" href="http://localhost:81/elaravel/public/backend/img/favicon.ico">
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
	<header id="header"><!--header-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="{{URL::to('/')}}"><img src="{{asset('frontend/images/home/unnamed.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{URL::to('/admin')}}"><i class="fa fa-user"></i>Quản Trị</a></li>
                                <?php
                                $customer_name=Session::get('customer_name');
                                $customer_id=Session::get('customer_id');
                                $shipping_id=Session::get('shipping_id');
                                // print_r($customer_id);
                                print_r($shipping_id);
                                echo $customer_name;
                                ?>

                                <?php if($customer_id != NULL && $shipping_id == NULL){?>
                                    <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i>Thanh Toán</a></li>

                                <?php }else{ ?>
                                    <li><a href="{{URL::to('/login-check')}}"><i class="fa fa-crosshairs"></i>Thanh Toán</a></li>
                                <?php } ?>

								<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng ({{ Cart::count() }})</a></li>
                                <?php
                                $customer_id=Session::get('customer_id');
                                 // $customer_id=Session::get('customer_id');
                                ?>
                                <?php if($customer_id != NULL){?>
                                <li><a href="{{URL::to('/customer_logout')}}"><i class="fa fa-lock"></i>Đăng Xuất</a></li>
                                <?php }else{ ?>
                                <li><a href="{{URL::to('/login-check')}}"><i ></i>Đăng Nhập</a></li>
                                <?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/')}}" class="active">Trang Chủ</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Sản Phẩm</a></li>
										<?php if($customer_id != NULL){?>
                                    <li><a href="{{URL::to('/checkout')}}">Thanh Toán</a></li>
                                    <?php }else{ ?>
                                    <li style="display: none;"><a href="{{URL::to('/login-check')}}">Thanh Toán</a></li>
                                    <?php } ?>
										<li><a href="{{URL::to('/show-cart')}}">Giỏ Hàng</a></li>
                                    </ul>
                                </li>
								<li><a href="contact-us.html">Liên Hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
    @yield('slider');
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh Mục</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
                                <?php
                                $all_published_category=DB::table('tbl_category')
                                ->where('publication_status',1)
                                ->get();
                                foreach($all_published_category as $v_category){ ?>
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/product_by_category/' .$v_category->category_id)}}">
                                    {{$v_category->category_name}}</a>
                                    </h4>
                                </div>
                                <?php } ?>
                            </div>
                        </div><!--/category-products-->

						<div class="brands_products"><!--brands_products-->
							<h2>Thương Hiệu</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                                <?php
                                $all_published_manufacture=DB::table('tbl_manufacture')
                                ->where('manufacture_status',1)
                                ->get();
                                foreach($all_published_manufacture as $v_manufacture){ ?>
                                <li><a href="{{URL::to('/product_by_manufacture/' .$v_manufacture->manufacture_id)}}"> {{$v_manufacture->manufacture_name}}</a>
                                </li>
                                <?php } ?>
								</ul>
							</div>
						</div><!--/brands_products-->
					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                    @yield('content')

				    </div>
			</div>
		</div>
	</section>

	<footer id="footer"><!--Footer-->
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>T-SHOP</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hỗ trợ Online</a></li>
								<li><a href="#">Liên lạc</a></li>
								<li><a href="#">Địa điểm</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>TƯ VẤN</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">lednpd03211@fpt.edu.vn</a></li>
								<li><a href="#">0905603525</a></li>
								<li><a href="#">Đà Nẵng</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>THÔNG TIN</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Thông tin công ty</a></li>
								<li><a href="#">IT</a></li>
								<li><a href="#">Địa chỉ</a></li>
								<li><a href="#">Chương trình khuyến mãi</a></li>
								<li><a href="#">Quà tặng</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2 col-sm-offset-1">
						<div class="single-widget">
							<h2>LIÊN HỆ</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />

							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</footer><!--/Footer-->



    <script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.validate.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>
