@extends('layout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng Nhập Thành Viên</h2>
						<form action="{{url('/customer_login')}}" method="post">
                        {{csrf_field()}}
							<input type="email" required="" placeholder="Email" name="customer_email" required="" />
							<input type="password" placeholder="Password" name="password" required=""/>
							<button type="submit" class="btn btn-default">Đăng Nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng Kí Thành Viên</h2>
						<form action={{url('/customer_registration')}} method="post" id="form-validate">
                            {{csrf_field()}}
							<input type="text" placeholder="Tên" name="customer_name">
							<input type="email" placeholder="Địa chỉ Email" name="customer_email">
                            <input type="password" placeholder="Mật khẩu" name="password" id="password" >
                            <input type="password" placeholder="Nhập lại Mật khẩu" name="confirm_password" >
                            <input type="text" placeholder="Số Điện thoại" name="mobile_number">
							<button type="submit" class="btn btn-default">Đăng Kí</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection
