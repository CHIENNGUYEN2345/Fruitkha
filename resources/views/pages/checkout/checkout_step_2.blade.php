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
						    <div class="card-header" id="headingTwo">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Shipping Address
						        </button>
						      </h5>
						    </div>
						    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="{{URL::to('/save-checkout-customer')}}" method="post">
						        		{{csrf_field()}}
						        		<p><input type="text" name="shipping_name" placeholder="Name"></p>
						        		<p><input type="text" name="shipping_email" placeholder="Email"></p>
						        		<p><input type="text" name="shipping_address" placeholder="Address"></p>
						        		<p><input type="text" name="shipping_phone" placeholder="Phone"></p>
						        		<p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
						        		<input type="submit" value="Place Order" class="boxed-btn">
						        	</form>
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