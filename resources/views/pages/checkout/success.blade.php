@extends('welcome')
@section('content')
<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Đặt hàng thành công!!</p>
						<h1>Cảm ơn bạn đã luôn ủng hộ!</h1>
						
						<div>
							<a style="padding-top: 10px;" href="{{URL::to('/home')}}" class="boxed-btn black">Back to home</a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

@endsection