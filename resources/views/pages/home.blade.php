@extends('welcome')
@section('content')
<!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title"> 
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                    </div>
                </div>
            </div>


            <div class="row">
                
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active">All</li>
                            @foreach($brand_product as $key=>$brand)
                            <a href="{{URL::to('/danh-muc-san-pham/'.$brand->brand_id)}}"><li>{{$brand->brand_name}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
            </div>

            <div class="row">
                @foreach($all_product as $key=>$pro)
                
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <form>
                            @csrf
                            <input type="hidden" class="cart_product_id_{{$pro->product_id}}" name="" value="{{$pro->product_id}}">
                            <input type="hidden" class="cart_product_name_{{$pro->product_id}}" name="" value="{{$pro->product_name}}">
                            <input type="hidden" class="cart_product_image_{{$pro->product_id}}" name="" value="{{$pro->product_image}}">
                            <input type="hidden" class="cart_product_price_{{$pro->product_id}}" name="" value="{{$pro->product_price}}">
                            <input type="hidden" class="cart_product_qty_{{$pro->product_id}}" name="" value="1">
                            <input type="hidden" class="cart_product_qty_real_{{$pro->product_id}}" name="" value="{{$pro->product_quantity}}">
                            <div class="product-image">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" width="261" height="261"></a>
                            </div>
                        
                            <h3>{{$pro->product_name}}</h3>
                            <p class="product-price"><span>Per Kg</span>{{number_format($pro->product_price).' '.'VND'}}</p>
                            <a href="#" class="cart-btn add-to-cart" name="add-to-cart" data-id_product="{{$pro->product_id}}"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </form>
                    </div>
                </div>
                
                @endforeach
            </div>
        </div>
    </div>
    <!-- end product section -->

    <!-- cart banner section -->
    <section class="cart-banner pt-100 pb-100">
        <div class="container">
            <div class="row clearfix">
                <!--Image Column-->
                <div class="image-column col-lg-6">
                    <div class="image">
                        <div class="price-box">
                            <div class="inner-price">
                                <span class="price">
                                    <strong>30%</strong> <br> off per kg
                                </span>
                            </div>
                        </div>
                        <img src="{{('../public/frontend/images/a.jpg')}}" alt="">
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
                    <h3><span class="orange-text">Deal</span> of the month</h3>
                    <h4>Hikan Strwaberry</h4>
                    <div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam similique! Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit voluptatem accusant</div>
                    <!--Countdown Timer-->
                    <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2020/2/01"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
                    <a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end cart banner section -->

    <!-- testimonail-section -->
    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="{{('../public/frontend/images/avaters/avatar1.png')}}" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Saira Hakim <span>Local shop owner</span></h3>
                                <p class="testimonial-body">
                                    " Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="{{('../public/frontend/images/avaters/avatar2.png')}}" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>David Niph <span>Local shop owner</span></h3>
                                <p class="testimonial-body">
                                    " Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="{{('../public/frontend/images/avaters/avatar3.png')}}" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Jacob Sikim <span>Local shop owner</span></h3>
                                <p class="testimonial-body">
                                    " Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonail-section -->
    
    <!-- advertisement section -->
    <div class="abt-section mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="abt-bg" style="background-image: url('../public/frontend/images/abt.jpg');">
                        <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="abt-text">
                        <p class="top-sub">Since Year 1998</p>
                        <h2>We are <span class="orange-text">Fruitkha</span></h2>
                        <p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum ac vel nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet, aliquet sapien sed, interdum velit. Nam eu molestie lorem.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat veritatis minus, et labore minima mollitia qui ducimus.</p>
                        <a href="about.html" class="boxed-btn mt-4">know more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end advertisement section -->
    
    <!-- shop banner -->
    <section class="shop-banner" style="background-image: url('../public/frontend/images/1.jpg');">
        <div class="container">
            <h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
            <a href="shop.html" class="cart-btn btn-lg">Shop Now</a>
        </div>
    </section>
    <!-- end shop banner -->

    <!-- latest news -->
    <div class="latest-news pt-150 pb-150">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title"> 
                        <h3><span class="orange-text">Our</span> News</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($post as $key=>$p)
                <div class="col-lg-4 col-md-6">
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
                <div class="col-lg-12 text-center">
                    <a href="{{URL::to('/news')}}" class="boxed-btn">More News</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end latest news -->
@endsection