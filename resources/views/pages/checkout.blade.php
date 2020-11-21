@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="register-req">
				<p>Xin vui lòng điền vào mẫu này...</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Chi tiết vận chuyển</p>
							<div class="form-one">
                                <form action="{{url('/save-shipping-details')}}" method="post" id="form-validate">
                                {{csrf_field()}}
									<input type="text" name="shipping_email" placeholder="Email*" requied="">
									<input type="text" name="shipping_first_name" placeholder="Họ *" requied="">
									<input type="text" name="shipping_last_name" placeholder="Tên *" requied="">
									<input type="text" name="shipping_address" placeholder="Địa chỉ *" requied="">
                                    <input type="text" name="shipping_mobile_number" placeholder="Số điện thoại" requied="">
                                    <input type="text" name="shipping_city" placeholder="Thành phố" requied="">
                                    <input type="submit" class="btn btn-default" value="Xong">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection
