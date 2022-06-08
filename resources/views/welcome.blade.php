<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SEO -->
    <meta name="description" content="">
    <meta name="keywords" content="fruit">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="author" content="">
    <!--end SEO -->
    <!-- title -->
    <title>Fruitkha - Fruit Store</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('../public/frontend/images/favicon.png')}}">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('../public/frontend/css/all.min.css')}}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('../public/frontend/bootstrap/css/bootstrap.min.css')}}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('../public/frontend/css/owl.carousel.css')}}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('../public/frontend/css/magnific-popup.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('../public/frontend/css/animate.css')}}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{asset('../public/frontend/css/meanmenu.min.css')}}">
    <!-- main style -->
    <link rel="stylesheet" type="text/css" href="{{asset('../public/frontend/css/main.css')}}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset('../public/frontend/css/responsive.css')}}">
    <!-- sweetAlert -->
    <link rel="stylesheet" href="{{asset('../public/frontend/css/sweetalert.css')}}">
    <!-- for SEO -->
    <link rel="canonical" href="">
    <!-- font awesome (js file) -->
    <script src="https://kit.fontawesome.com/cb9c6f5c3c.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
    
    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="{{URL::to('/home')}}">
                                <img src="{{('../public/frontend/images/logo.png')}}" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item"><a href="{{URL::to('/home')}}">Home</a>
                                    
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">404 page</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="{URL::to('/gio-hang')}}">Cart</a></li>
                                        <li><a href="#">Check Out</a></li>
                                        <li><a href="#">Contact</a></li>
                                        <li><a href="{{URL::to('/news')}}">News</a></li>
                                        <li><a href="#">Shop</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{URL::to('/news')}}">News</a>
                                    <ul class="sub-menu">
                                        @foreach($cate_post as $key=>$danhmucbaiviet)
                                        <li><a href="{{URL::to('/danh-muc-bai-viet/'.$danhmucbaiviet->cate_post_slug)}}">{{$danhmucbaiviet->cate_post_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="{{URL::to('/gio-hang')}}">Shop</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{URL::to('/gio-hang')}}">Shop</a></li>
                                        <li><a href="{{URL::to('/gio-hang')}}">Check Out</a></li>
                                        <li><a href="{{URL::to('/gio-hang')}}">Single Product</a></li>
                                        <li><a href="{{URL::to('/gio-hang')}}">Cart</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="header-icons">
                                        <?php
                                            $customer_id=Session::get('customer_id');
                                            if($customer_id!=NULL){
                                        ?>
                                        <span class="username" style="color:white; font-style: italic">
                                            Hi,
                                            <?php
                                                $name = Session::get('customer_name');
                                                if($name){
                                                   echo $name;
                                                }
                                            ?>
                                        </span>
                                        <a href="{{URL::to('/logout-checkout')}}" style="color:orange;">Logout</a>
                                        <?php
                                            }else{
                                        ?>
                                        <a href="{{URL::to('/checkout')}}" style="color:orange;">Login</a>
                                        <?php
                                            }
                                        ?>
                                        <a class="shopping-cart" href="{{URL::to('/gio-hang')}}"><i class="fas fa-shopping-cart"></i></a>
                                        <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                        
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->
    
    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <form action="{{URL::to('/tim-kiem')}}" method="post">
                                {{csrf_field()}}
                                <input type="text" name="keywords_submit" placeholder="Keywords">
                                <button type="submit" name="search_items">Search <i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- home page slider -->
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1" style="background-image: url('../public/frontend/images/hero-bg.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh & Organic</p>
                                <h1>Delicious Seasonal Fruits</h1>
                                <div class="hero-btns">
                                    <a href="{{URL::to('/gio-hang')}}" class="boxed-btn">Fruit Collection</a>
                                    <a href="#" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-2" style="background-image: url('../public/frontend/images/hero-bg-2.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh Everyday</p>
                                <h1>100% Organic Collection</h1>
                                <div class="hero-btns">
                                    <a href="{{URL::to('/gio-hang')}}" class="boxed-btn">Visit Shop</a>
                                    <a href="#" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-3" style="background-image: url('../public/frontend/images/hero-bg-3.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Mega Sale Going On!</p>
                                <h1>Get December Discount</h1>
                                <div class="hero-btns">
                                    <a href="{{URL::to('/home')}}" class="boxed-btn">Visit Shop</a>
                                    <a href="#" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home page slider -->

    <!-- features list section -->
    <div class="list-section pt-80 pb-80">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>Free Shipping</h3>
                            <p>When order over $75</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>24/7 Support</h3>
                            <p>Get support all day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>Refund</h3>
                            <p>Get refund within 3 days!</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end features list section -->

    <!-- all the contents here -->

    <!-- latest news -->
    @yield('content')
    <!-- end latest news -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="{{('../public/frontend/images/company-logos/1.png')}}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{('../public/frontend/images/company-logos/2.png')}}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{('../public/frontend/images/company-logos/3.png')}}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{('../public/frontend/images/company-logos/4.png')}}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{('../public/frontend/images/company-logos/5.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->

    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>34/8, East Hukupara, Gifirtok, Sadan.</li>
                            <li>support@fruitkha.com</li>
                            <li>+00 111 222 3333</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Subscribe</h2>
                        <p>Subscribe to our mailing list to get the latest updates.</p>
                        <form action="index.html">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->
    
    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2019 - <a href="#">Công ty TNHH Một Mình Tôi</a>,  All Rights Reserved.<br>
                        Distributed By - <a href="#">Themewagon</a>
                    </p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->
    
    <!-- jquery -->
    <script src="{{asset('../public/frontend/js/jquery-1.11.3.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('../public/frontend/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- count down -->
    <script src="{{asset('../public/frontend/js/jquery.countdown.js')}}"></script>
    <!-- isotope -->
    <script src="{{asset('../public/frontend/js/jquery.isotope-3.0.6.min.js')}}"></script>
    <!-- waypoints -->
    <script src="{{asset('../public/frontend/js/waypoints.js')}}"></script>
    <!-- owl carousel -->
    <script src="{{asset('../public/frontend/js/owl.carousel.min.js')}}"></script>
    <!-- magnific popup -->
    <script src="{{asset('../public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- mean menu -->
    <script src="{{asset('../public/frontend/js/jquery.meanmenu.min.js')}}"></script>
    <!-- sticker js -->
    <script src="{{asset('../public/frontend/js/sticker.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('../public/frontend/js/main.js')}}"></script>
    <!-- sweetAlert -->
    <script src="{{asset('../public/frontend/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //them gio hang tu trang home
            //jquery function
            $('.add-to-cart').click(function(){
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_'+id).val();
                var cart_product_name = $('.cart_product_name_'+id).val();
                var cart_product_image = $('.cart_product_image_'+id).val();
                var cart_product_price = $('.cart_product_price_'+id).val();
                var cart_product_qty = $('.cart_product_qty_'+id).val();
                var cart_product_qty_real = $('.cart_product_qty_real_'+id).val();
                var _token = $('input[name="_token"]').val();
                if(parseInt(cart_product_qty)>parseInt(cart_product_qty_real)){
                    alert('Xin lối, hãy đặt số lượng nhỏ hơn '+cart_product_qty_real);
                }else{
                    //ajax function
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'post',
                    data: {cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,cart_product_qty_real:cart_product_qty_real,_token:_token},
                    success: function(data){
                            swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });
                            

                    }
                });//end ajax func
                }
                

            });//end jquery func
           
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if(action=='city'){
                result = 'province';
            }
            $.ajax({
                url: '{{url('/select-delivery-home')}}',
                method: 'POST',
                data: {action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var _token = $('input[name="_token"]').val();
            if(matp == '' && maqh == ''){
                alert('Làm ơn chọn tỉnh thành.');
            }else{
                $.ajax({
                url: '{{url('/calculate-fee')}}',
                method: 'POST',
                data: {matp:matp,maqh:maqh,_token:_token},
                success:function(){
                    location.reload();
                }
                });
            }
            
        });
        });
    </script>

    
</body>
</html>