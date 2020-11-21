@extends('layout')
@section('content')
<section id="cart_items">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Trang Chủ</a></li>
				  <li class="active">Giỏ Hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
                <?php
                $contents = Cart::Content();
                
                ?>
				<table class="table table-condensed ">
					<thead>
						<tr class="cart_menu">
                            <td class="image">Ảnh</td>
							<td class="description">Tên</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
							<td>Hành động</td>
						</tr>
					</thead>
					<tbody>
                    <?php foreach ($contents as $v_contents) {?>
						<tr>
                            <td class="cart_product">
								<h4><a href=""><img src="{{URL::to($v_contents->options->image)}}" height="80px" width="80px"></a></h4>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_contents->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{$v_contents->price}}đ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{url('/update-cart')}}" method="post">
                                    {{csrf_field()}}
                                        <input class="cart_quantity_input" type="number" name="qty" value="{{$v_contents->qty}}" autocomplete="off" size="2">
                                        <input class="cart_quantity_input" type="hidden" name="rowId" value="{{$v_contents->rowId}}" autocomplete="off" size="2">
                                        <input type="submit" name="submit" value="Update" class="btn btn-sm btn-default">
                                    </form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_contents->total}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_contents->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                    <?php } ?>
					</tbody>
				</table>
			</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Tổng tiền trong giỏ hàng <span>{{Cart::subtotal()}}</span></li>
							<li>Thuế <span>{{Cart::tax()}}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Tổng cộng <span>{{Cart::total()}}</span></li>
						</ul>
                            <a class="btn btn-default update" href="">Cập nhật</a>
                            <?php $customer_id=Session::get('customer_id');?>
                                <?php if($customer_id != NULL){?>
                                    <li><a class="btn btn-default " href="{{URL::to('/checkout')}}"> Thanh toán</a></li>
                                <?php }else{ ?>
                                    <li><a class="btn btn-default check_out" href="{{URL::to('/login-check')}}"> Thanh toán</a></li>
                                    <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection
