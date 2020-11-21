@extends('layout')
@section('content')
<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to($product_by_details->product_image)}}" style="width:auto;height:auto" />
								<h3>ZOOM</h3>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$product_by_details->product_name}}</h2>
								<img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
								<span>
                                    <span>{{$product_by_details->product_price}}VNĐ</span>
                                    <form action="{{url('/add-to-cart')}}" method="post">
                                    {{ csrf_field() }}
                                        <label>Số lượng:</label>
                                        <input name="qty" type="number" value="1" />
                                        <input type="hidden" name="product_id" value="{{$product_by_details->product_id}}">
                                        <button type="submit" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Mua
                                        </button>
                                    </form>
								</span>
								<p><b>Tình Trạng:</b> Có sẵn</p>
                                <p><b>Thương Hiệu:</b> {{$product_by_details->manufacture_name}}</p>
                                <p><b>Mặt Hàng:</b> {{$product_by_details->category_name}}</p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Chi tiết</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Bình luận</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
                                <p>{{$product_by_details->product_long_description}}</p>
							</div>
							<div class="tab-pane fade active in" id="reviews" >
                            <?php $customer_id=Session::get('customer_id');
                                ?>
                            <?php if($customer_id != NULL){?>
                                <form action="{{url('/comment/'.$product_by_details->product_id)}}" method="post">
                                    {{csrf_field()}}
										<textarea placeholder="Viết bình luận của bạn (Vui lòng gõ tiếng Việt có dấu)" name="comment_text" ></textarea>
										<input type="submit" class="btn btn-default pull-right" value="Gửi Bình Luận">
									</form>

                                <?php }else{ ?>
                                    <form action="#">
										<textarea placeholder="Viết bình luận của bạn (Vui lòng gõ tiếng Việt có dấu)" ></textarea>
										<input type="submit" class="btn btn-default pull-right" value="Gửi Bình Luận">
									</form>
                                <?php } ?>
								<div class="col-sm-12">
									<ul class="comtent-comment">
                                        @foreach($comment_by_product as $comment)
                                        <div class="media">
                                        <div class="media-left">
                                            <img src="{{URL::to('image/img_avatar1.png')}}" class="media-object" style="width:60px">
                                        </div>
                                        <div class="media-body">
                                        <h4 class="media-heading">{{ $comment->customer_name }}</h4>
                                        <p>{{ $comment->comment_text }}</p>
                                        </div>
                                    </div>
										@endforeach
                                    </ul>

								</div>
							</div>

						</div>
					</div><!--/category-tab-->
@endsection
