@extends('welcome')
@section('content')
<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Check Out Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Billing Address
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<!--lien ket voi CheckoutController -->
						        	
						        	@if(Session::get('cart')==true && Session::get('customer_id')==true)
						        	<form action="{{URL::to('/add-customer')}}" method="post">
						        		{{csrf_field()}}
						        		<p><input type="text" name="customer_name" placeholder="Name"></p>
						        		<p><input type="text" name="customer_email" placeholder="Email"></p>
						        		<p><input type="text" name="customer_address" placeholder="Address"></p>
						        		<p><input type="text" name="customer_phone" placeholder="Phone"></p>
						        		<p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
						        		<input type="submit" value="Place Order" class="boxed-btn">
						        	</form>
						        	@elseif(Session::get('cart')==true && Session::get('customer_id')!=true)
						        	<form action="{{URL::to('/add-customer')}}" method="post">
						        		{{csrf_field()}}
						        		<p><input type="text" name="customer_name" placeholder="Name"></p>
						        		<p><input type="text" name="customer_email" placeholder="Email"></p>
						        		<p><input type="text" name="customer_address" placeholder="Address"></p>
						        		<p><input type="text" name="customer_phone" placeholder="Phone"></p>
						        		<p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
						        		<input type="submit" value="Place Order" class="boxed-btn">
						        	</form>
						        	@elseif(Session::get('cart')!=true && Session::get('customer_id')==true)
						        	<form action="{{URL::to('/login-checkout-post')}}" method="post">
						        		{{csrf_field()}}
						        		<p><input type="text" name="customer_name" placeholder="Name"></p>
						        		<p><input type="text" name="customer_email" placeholder="Email"></p>
						        		<p><input type="text" name="customer_address" placeholder="Address"></p>
						        		<p><input type="text" name="customer_phone" placeholder="Phone"></p>
						        		<p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
						        		<input type="submit" value="Place Order" class="boxed-btn">
						        	</form>
						        	@elseif(Session::get('cart')!=true && Session::get('customer_id')!=true)
						        	<form action="{{URL::to('/login-checkout-post')}}" method="post">
						        		{{csrf_field()}}
						        		<p><input type="text" name="customer_name" placeholder="Name"></p>
						        		<p><input type="text" name="customer_email" placeholder="Email"></p>
						        		<p><input type="text" name="customer_address" placeholder="Address"></p>
						        		<p><input type="text" name="customer_phone" placeholder="Phone"></p>
						        		<p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
						        		<input type="submit" value="Place Order" class="boxed-btn">
						        	</form>
						        	@endif
						        	<!--end-->
						        </div>
						      </div>
						    </div>
						  </div>
						  
						  
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
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
								<tr>
									<td>Shipping</td>
									<td>...</td>
								</tr>
								<tr>
									<td>Total</td>
									<td>{{number_format($total,0,'.',',')}} vnd</td>
								</tr>
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