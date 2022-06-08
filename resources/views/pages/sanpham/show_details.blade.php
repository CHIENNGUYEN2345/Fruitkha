@extends('welcome')
@section('content')
<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			
			@foreach($product_details as $key=>$value)
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
					<form>
						{{csrf_field()}}
						<input type="hidden" class="cart_product_id_{{$value->product_id}}" name="" value="{{$value->product_id}}">
                        <input type="hidden" class="cart_product_name_{{$value->product_id}}" name="" value="{{$value->product_name}}">
                        <input type="hidden" class="cart_product_image_{{$value->product_id}}" name="" value="{{$value->product_image}}">
                        <input type="hidden" class="cart_product_price_{{$value->product_id}}" name="" value="{{$value->product_price}}">
                        <input type="hidden" class="cart_product_qty_real_{{$value->product_id}}" name="" value="{{$value->product_quantity}}">
						<h3>{{$value->product_name}}</h3>
						<p class="single-product-pricing"><span>Per Kg</span> {{number_format($value->product_price).' VND'}}</p>
						<p>{{$value->product_content}}</p>
						<div class="single-product-form">
							<form action="index.html">
								<input type="number" min="1" max="{{$value->product_quantity}}" value="1" placeholder="0" class="cart_product_qty_{{$value->product_id}}">
							</form>
							<br/>
							<a href="#" class="cart-btn add-to-cart" data-id_product="{{$value->product_id}}"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							<p><strong>Brands: </strong>{{$value->brand_name}}</p>
							<p><strong>Categories: </strong>{{$value->category_name}}</p>
						</div>
					</form>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($relate as $key=>$lienquan)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> {{number_format($value->product_price).' VND'}} </p>
						<a href="#" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- end more products -->
@endsection