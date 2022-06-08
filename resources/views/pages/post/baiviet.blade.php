@extends('welcome')
@section('content')
<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Organic Information</p>
						<h1>Single News</h1>
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
		<div class="mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="single-article-section">
						<div class="single-article-text">
							<div class="single-artcile-bg">
								<img src="{{asset('public/uploads/post/'.$p->post_image)}}" width="730" height="450">
							</div>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<h2>{{$meta_title}}</h2>
							<p>{!! $p->post_desc !!}</p>
							<p>{!! $p->post_content !!}</p>
							
						</div>

						<div class="comments-list-wrap">
							<h3 class="comment-count-title">3 Comments</h3>
							<div class="comment-list">
								<div class="single-comment-body">
									<div class="comment-user-avater">
										<img src="{{asset('../public/frontend/images/avaters/avatar1.png')}}" alt="">
									</div>
									<div class="comment-text-body">
										<h4>Jenny Joe <span class="comment-date">Aprl 26, 2020</span> <a href="#">reply</a></h4>
										<p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
									</div>
									<div class="single-comment-body child">
										<div class="comment-user-avater">
											<img src="{{asset('../public/frontend/images/avaters/avatar3.png')}}" alt="">
										</div>
										<div class="comment-text-body">
											<h4>Simon Soe <span class="comment-date">Aprl 27, 2020</span> <a href="#">reply</a></h4>
											<p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
										</div>
									</div>
								</div>
								<div class="single-comment-body">
									<div class="comment-user-avater">
										<img src="{{asset('../public/frontend/images/avaters/avatar2.png')}}" alt="">
									</div>
									<div class="comment-text-body">
										<h4>Addy Aoe <span class="comment-date">May 12, 2020</span> <a href="#">reply</a></h4>
										<p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
									</div>
								</div>
							</div>
						</div>

						<div class="comment-template">
							<h4>Leave a comment</h4>
							<p>If you have a comment dont feel hesitate to send us your opinion.</p>
							<form action="index.html">
								<p>
									<input type="text" placeholder="Your Name">
									<input type="email" placeholder="Your Email">
								</p>
								<p><textarea name="comment" id="comment" cols="30" rows="10" placeholder="Your Message"></textarea></p>
								<p><input type="submit" value="Submit"></p>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar-section">
						<div class="recent-posts">
							<h4>Recent Posts</h4>
							<ul>
							@foreach($related as $key=>$post_related)
								<li><a href="{{url('/bai-viet/'.$post_related->post_slug)}}">{{$post_related->post_title}}</a></li>
							@endforeach
							</ul>
						</div>
						<div class="archive-posts">
							<h4>Archive Posts</h4>
							<ul>
								<li><a href="single-news.html">JAN 2019 (5)</a></li>
								<li><a href="single-news.html">FEB 2019 (3)</a></li>
								<li><a href="single-news.html">MAY 2019 (4)</a></li>
								<li><a href="single-news.html">SEP 2019 (4)</a></li>
								<li><a href="single-news.html">DEC 2019 (3)</a></li>
							</ul>
						</div>
						<div class="tag-section">
							<h4>Tags</h4>
							<ul>
								<li><a href="single-news.html">Apple</a></li>
								<li><a href="single-news.html">Strawberry</a></li>
								<li><a href="single-news.html">BErry</a></li>
								<li><a href="single-news.html">Orange</a></li>
								<li><a href="single-news.html">Lemon</a></li>
								<li><a href="single-news.html">Banana</a></li>
							</ul>
						</div>
					</div>
				</div>
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

	<!-- logo carousel -->
	
	<!-- end logo carousel -->

@endsection