@extends('welcome')
@section('content')
	
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<!-- @php
		echo '<pre>';
		print_r(Session::get('cart'));
	echo '</pre>';
	@endphp -->
	<form action="{{url('/update-cart')}}" method="POST">
		<div class="cart-section mt-150 mb-150">
			<div class="container">
				@php
	                $message = Session::get('message');
	                if($message){
	                    echo '<h4 style="color: red;" class="text-alert">'.$message.'</h4>';
	                    Session::put('message',null);
	                }
	            @endphp
				<div class="row">
					<div class="col-lg-8 col-md-12">
						<div class="cart-table-wrap">
						
							@csrf
	                            
							<table class="cart-table">
								<thead class="cart-table-head">
									<tr class="table-head-row">
										<th class="product-remove">
											<a href="{{URL::to('/del-all-product/')}}">
												<i class="far fa-window-close"></i>
											</a>
										</th>
										<th class="product-image">Product Image</th>
										<th class="product-name">Name</th>
										<th class="product-price">Price</th>
										<th class="product-price">Số lượng trong kho</th>
										<th class="product-quantity">Quantity</th>
										<th class="product-total">Total</th>
									</tr>
								</thead>
								<tbody>
					
								@if(Session::get('cart')==true)
									@php
											$total = 0;
									@endphp
									@foreach(Session::get('cart') as $key=>$cart)
										@php
											$subtotal=$cart['product_price']*$cart['product_qty'];
											$total+=$subtotal;
										@endphp
									<tr class="table-body-row">
										<!-- nut xoa 1 sp trong cart -->
										<td class="product-remove">
											<a href="{{URL::to('/del-product/'.$cart['session_id'])}}">
												<i class="far fa-window-close"></i>
											</a>
										</td>
										<!-- end -->
										<td class="product-image"><img src="{{URL::to('public/uploads/product/'.$cart['product_image'])}}" alt=""></td>
										<td class="product-name">{{$cart['product_name']}}</td>
										<td class="product-price">{{number_format($cart['product_price'],0,'.',',')}} vnd</td>
										<td class="product-name">{{$cart['product_qty_real']}}</td>
										<td class="cart_quantity_"><input type="number" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" min="1" max="{{$cart['product_qty_real']}}" placeholder="0"></td>
										
										
										<td class="product-total">{{number_format($subtotal,0,'.',',')}} vnd</td>
									</tr>
									@endforeach
								@endif
								</tbody>
							</table>
						
						</div>
					</div>

					<div class="col-lg-4">
						<div class="total-section">
							<table class="total-table">
								<thead class="total-table-head">
									<tr class="table-total-row">
										<th>Total</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
									<tr class="total-data">
										<td><strong>Subtotal: </strong></td>
										@if(Session::get('cart')==true)
										<td>{{number_format($total,0,'.',',')}} vnd</td>
										@endif
									</tr>
									<tr class="total-data">
										<td><strong>Shipping: </strong></td>
										<td>...</td>
									</tr>
									<tr class="total-data">
										<td><strong>Total: </strong></td>
										@if(Session::get('cart')==true)
										<td>{{number_format($total,0,'.',',')}} vnd</td>
										@endif
									</tr>
								</tbody>
							</table>
							<div class="cart-buttons">
							<!-- Nut cap nhat gio hang-->
								<input type="submit" value="Update Cart" class="boxed-btn" name="update_qty">
							<!-- end -->
							<!-- nut CHECKOUT -->
							@if(Session::get('cart')==true && Session::get('customer_id')!=true)
								<a href="{{URL::to('/checkout')}}" class="boxed-btn black">Check Out</a>
							@elseif(Session::get('cart')==true && Session::get('customer_id')==true)
								<a href="{{URL::to('/confirm-customer')}}" class="boxed-btn black">Check Out</a>
							@endif
							<!-- -->
							</div>
						</div>

						
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- end cart -->

	<!-- logo carousel -->
	
	<!-- end logo carousel -->

	<!-- footer -->
	
	<!-- end footer -->
	
	<!-- copyright -->
	
	<!-- end copyright -->
@endsection