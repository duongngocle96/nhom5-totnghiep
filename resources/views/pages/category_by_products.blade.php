@extends('layout')
@section('content')
<h2 class="title text-center">{{ $category_name->category_name }}</h2>
    <?php foreach($product_by_category as $v_category_by_product){ ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to($v_category_by_product->product_image)}}" alt="" />
											<h2>{{$v_category_by_product->product_price}} VNĐ</h2>
											<p>{{$v_category_by_product->product_name}}</p>
											<a href="{{URL::to('/view_product/'.$v_category_by_product->product_id )}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{$v_category_by_product->product_price}} VNĐ</h2>
												<p>{{$v_category_by_product->product_name}}</p>
												<a href="{{URL::to('/view_product/'.$v_category_by_product->product_id )}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>{{$v_category_by_product->product_name}}</a></li>
										<li><a href="{{URL::to('/view_product/'.$v_category_by_product->product_id )}}"><i class="fa fa-plus-square"></i>Chi Tiết</a></li>
									</ul>
								</div>
							</div>
						</div>
    <?php } ?>
					</div><!--features_items-->




@endsection
