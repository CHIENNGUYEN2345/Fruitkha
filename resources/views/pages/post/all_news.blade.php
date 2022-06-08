@extends('welcome')
@section('content')

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Organic Information</p>
						<h1>News Article</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">
				@foreach($post as $key=>$p)
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-latest-news">
                        <a href="{{URL::to('/bai-viet/'.$p->post_slug)}}">
                            <div class="latest-news-bg">
                                <img src="{{asset('public/uploads/post/'.$p->post_image)}}" alt="{{$p->post_slug}}" width="350" height="200">
                            </div>
                        </a>
                        <div class="news-text-box" style="width:350px; height: 350px;">
                            <h3><a href="{{URL::to('/bai-viet/'.$p->post_slug)}}">{{$p->post_title}}</a></h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Admin</span>
                                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                            </p>
                            <p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
                            <a href="{{URL::to('/bai-viet/'.$p->post_slug)}}" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
				@endforeach
			</div>

			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="pagination-wrap">
								<ul>
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a class="active" href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->


@endsection