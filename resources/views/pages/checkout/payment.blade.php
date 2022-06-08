@extends('welcome')
@section('content')
<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Chọn hình thức thanh toán</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
								@php
	                                $message = Session::get('message');
	                                if($message){
	                                    echo '<h4 style="color: red;" class="text-alert">'.$message.'</h4>';
	                                    Session::put('message',null);
	                                }
	                            @endphp
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<form method="post" action="{{URL::to('/order-place')}}">
						      		{{csrf_field()}}
							<div class="accordion" id="accordionExample">
							  <div class="card single-accordion">
							    <div class="card-header" id="headingOne">
							      <h5 class="mb-0">
							        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							          Card details
							        </button>
							      </h5>
							    </div>

							    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
							      <div class="card-body">
							      	
								        <div class="billing-address-form">
								        	<span>
								        		<label><input type="radio" name="payment_option" value="1" class="boxed-btn">Trả bằng thẻ ATM</label>
								        	</span>
								        	<br>
								        	<span>
								        		<label><input type="radio" checked name="payment_option" value="2" class="boxed-btn">Trả bằng tiền mặt</label>
								        	</span>
								        	<br>
								        	
								        </div>
							    	
							      </div>
							    </div>
							  </div>
							  
							  
							</div>
							@if(Session::get('customer_id')==true)
								<div style="padding-top: 15px;">
									<input type="submit" value="Đặt hàng" class="boxed-btn">
								</div>
								@else
								<div style="padding-top: 15px;">
									<input disabled type="button" value="Đặt hàng" class="boxed-btn">&nbsp;<span>Bạn hãy đăng nhập để hoàn tất đặt hàng. <a href="{{URL::to('/checkout')}}">Đăng nhập</a></span>
								</div>
							@endif

							@if(Session::get('fee'))
									<input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
								@else
									<input type="hidden" name="order_fee" class="order_fee" value="10000">
							@endif

							@if(Session::get('coupon'))
								@foreach(Session::get('coupon') as $key=>$cou)
									<input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
								@endforeach
							@else
								<input type="hidden" name="order_coupon" class="order_coupon" value="no">
							@endif
					</form>

						<!-- CHECK COUPON -->
					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="{{URL::to('/check-coupon')}}" method="post">
								@csrf
								<p><input type="text" name="check_coupon_input" placeholder="Coupon"></p>
								<p><input type="submit" class="check_coupon" name="check_coupon_submit" value="Apply"></p>
							</form>
						</div>
						<!-- end -->
					</div>

										<!-- Form tinh phi ship -->
					<div class="card single-accordion">
						<div class="card-header" id="headingOne">
							      <h5 class="mb-0">
							        <button class="btn btn-link" type="button">
							          Phí ship
							        </button>
							      </h5>
							    </div>
                            <form>
                                    @csrf
                                <div class="form-group">
                                    <label>Chọn thành phố</label>
                                    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                        <option value="">-------Chọn tỉnh thành----------</option>
                                        @foreach($city as $key=>$ci)
                                        	<option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Chọn quận huyện</label>
                                    <select name="province" id="province" class="form-control input-sm m-bot15 choose province">
                                        <option value="">-------Chọn quận huyện----------</option>
                                    </select>
                                </div>
                                
                                
                                <input type="button" value="Tính phí vận chuyển" name="calculate_order" class="boxed-btn calculate_delivery">
                            </form>

                            <!-- nut type=button tinh phi ship -->

                    </div>

					</div>

				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<!-- TRANG PAYMENT (THANH TOAN): NGUOI DUNG DA CO CART, TIEP TUC CHIA LAM 2 TH CO COUPON HOAC KO CO COUPON  -->
					@if(Session::get('cart')==true)
						@php
							$total = 0;
						@endphp
						
						<table class="order-details">
							<thead>
								<tr>
									<th>Your order Details</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
							@foreach(Session::get('cart') as $key=>$cart)
							@php
								$subtotal=$cart['product_price']*$cart['product_qty'];
								$total+=$subtotal;
							@endphp
								<tr>
									<td>{{$cart['product_name']}}</td>
									<td>{{number_format($subtotal,0,'.',',')}} vnd</td>
								</tr>
								
							@endforeach
							</tbody>
							<tbody class="checkout-details">
								<tr>
									<td>Subtotal</td>
									<td>{{number_format($total,0,'.',',')}} vnd</td>
								</tr>
							@if(Session::get('fee')==true)
								<tr>
									<td>
										Shipping
									</td>
									<td>{{number_format(Session::get('fee'),0,'.',',')}}d</td>
								</tr>
							@endif

						@if(Session::get('coupon'))
							@foreach(Session::get('coupon') as $key=>$cou)
								<!-- Truong hop 1/coupon khuyen mai theo % -->
								@if($cou['coupon_features']==1)
								<tr>
									<td>
										<a href="{{URL::to('/del-coupon-frontend')}}">
											X &nbsp;
										</a>
										Khuyến mãi
									</td>
									<td style="color: red;">
										
										- {{$cou['coupon_percent_discount']}} % subtotal
										
									</td>
									
								</tr>
								<tr>
									<td style="font-weight: bold;">Tổng tiền</td>
									<td style="font-weight: bold;">
										@php
											$total_coupon = ($total*$cou['coupon_percent_discount'])/100;
											 
										@endphp
										@if(Session::get('fee')!=true)
											{{number_format($total-$total_coupon,0,'.',',')}} vnd
										@elseif(Session::get('fee')==true)
											{{number_format($total - $total_coupon + Session::get('fee'),0,'.',',')}} vnd
										@endif
									</td>
									
								</tr>
								
								<!-- Truong hop 2/ coupon giam gia bang so tien -->
								@elseif($cou['coupon_features']==2)
								<tr>
									<td>
										<a href="{{URL::to('/del-coupon-frontend')}}">
											X &nbsp;
										</a>
										Khuyến mãi
									</td>
									<td style="color: red;">
										@php
											$total_coupon = $total-$cou['coupon_percent_discount'];
										@endphp
										- {{number_format($total-$total_coupon,0,'.',',')}} vnd
									</td>
									
								</tr>
								<tr>
									<td style="font-weight: bold;">Tổng tiền</td>
									<td style="font-weight: bold;">
										@if(Session::get('fee')!=true)
											{{number_format($total_coupon,0,'.',',')}} vnd
										@elseif(Session::get('fee')==true)
											{{number_format($total_coupon + Session::get('fee'),0,'.',',')}} vnd
										@endif
										
									</td>
									
								</tr>
								@endif
							@endforeach
						@elseif(Session::get('coupon')!=true)
							
								<tr>
									<td style="font-weight: bold;">Tổng tiền</td>
									<td style="font-weight: bold;">
										@if(Session::get('fee')!=true)
											{{number_format($total,0,'.',',')}} vnd
										@elseif(Session::get('fee')==true)
											{{number_format($total + Session::get('fee'),0,'.',',')}} vnd
										@endif
									</td>
									
								</tr>
								
				
								
						@endif

								
							</tbody>
						</table>
						
					@endif
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->
@endsection