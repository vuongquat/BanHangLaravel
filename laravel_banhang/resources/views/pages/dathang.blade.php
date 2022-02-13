@extends('master')
@section('content')
<div class="container">
		<div id="content">
			
			<form action="#" method="post" class="beta-form-checkout">
				<div class="row">
					<div class="col-sm-6">
						<h4>Thông tin khách hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="your_first_name">Họ tên</label>
							<input type="text" id="name" name="name" required>
						</div>

                        
						<div class="form-block">
							<label for="your_first_name">Giới tính</label>
							<input type="radio" id="gender" name="gender" value="Nam">Nam
                            <input type="radio" id="gender" name="gender" value="Nữ">Nữ
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ</label>
							<input type="text" id="address" name="name" value="Street Address" required>
						</div>

						<div class="form-block">
							<label for="email">Email: </label>
							<input type="email" name="email" id="email" required>
						</div>

						<div class="form-block">
							<label for="phone">Số điện thoaik=j</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes"name="note"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body">
								<div class="your-order-item">
									<div>
                                        @foreach($product_cart as $product)
                                        <!--  one item	 -->
                                            <div class="media">
                                                <img width="35%" height="100px" src="source/image/product/{{$product['item']['image']}}" alt="" class="pull-left">
                                                <div class="media-body">
                                                    <p class="font-large">{{$product['item']['name']}}</p>
                                                    <span class="color-gray your-order-info">Số lượng :{{$product['qty']}}</span>
                                                    <span class="color-gray your-order-info">Giá :{{$product['item']['unit_price']}}</span>
                                                </div>
                                            </div>
                                        @endforeach
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{$totalPrice}}</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Phương thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="COD" value="bacs" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán trực tiếp</label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Thanh toán sau khi nhận hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="CK" value="cheque" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản</label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển khoản qua :   <br> CTK:Trương Vương Quát
                                            <br>STK: 123456789
                                            <br>Chi nhánh Vietcombank - Đống Đa
										</div>						
									</li>
								</ul>
							</div>

							<div class="text-center"><a class="beta-btn primary" href="#">Checkout <i class="fa fa-chevron-right"></i></a></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div>
@endsection