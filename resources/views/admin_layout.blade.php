<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Fruitkha | Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('../public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('../public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('../public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('../public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('../public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('../public/backend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('../public/backend/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('../public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('../public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('../public/backend/js/morris.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        VISITORS
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('../public/backend/images/2.png')}}">
               
                <span class="username">
                     @php
                        $name = Session::get('admin_name');
                        if($name){
                           echo $name;
                        }
                    @endphp
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục</a></li>
                        
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương hiệu sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu</a></li>
                        <li><a href="{{URL::to('/all-brand-product')}}">Liệt kê thương hiệu</a></li>
                        
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
                        <li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>
                        
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/manage-order')}}">Quản lý đơn hàng</a></li>                        
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Mã giảm giá</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/insert-coupon')}}">Add mã giảm giá</a></li>
                        <li><a href="{{URL::to('/list-coupon')}}">Liệt kê mã giảm giá</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Phí vận chuyển</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/delivery')}}">Quản lý vận chuyển</a></li></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục bài viết</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-category-post')}}">Thêm danh mục bài</a></li>
                        <li><a href="{{URL::to('/all-category-post')}}">Liệt kê danh mục bài</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Bài viết</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-post')}}">Thêm bài</a></li>
                        <li><a href="{{URL::to('/all-post')}}">Liệt kê bài</a></li>
                    </ul>
                </li>
                
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
			@yield('admin_content')
		<!-- //market-->
		
		
		<!-- calendar -->
		
		<!-- //calendar -->
		
			<!-- tasks -->
			
		<!-- //tasks -->
		
    </section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© Custom by me | Design by W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('../public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('../public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('../public/backend/js/scripts.js')}}"></script>
<script src="{{asset('../public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('../public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('../public/backend/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace('ckeditor');
    CKEDITOR.replace('ckeditor1');
</script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('../public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- Quan ly phi ship -->
<script type="text/javascript">
    $(document).ready(function(){

        fetch_delivery();
        
        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/select-feeship')}}',
                method: 'POST',
                data: {_token:_token},
                success:function(data){
                    $('#load-delivery').html(data);
                }
            });
        }
        $('.add_delivery').click(function(){

            var city = $('.city').val();
            var province = $('.province').val();
            var fee = $('.fee-class').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/insert-delivery')}}',
                method: 'POST',
                data: {city:city,province:province,_token:_token,fee:fee},
                success:function(data){
                    fetch_delivery();
                }
            });

        });
        $(document).on('blur','.fee_feeship_edit',function(){
            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/update-delivery')}}',
                method: 'POST',
                data: {feeship_id:feeship_id,fee_value:fee_value,_token:_token},
                success:function(data){
                    fetch_delivery();
                }
            });
        });

        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if(action=='city'){
                result = 'province';
            }
            $.ajax({
                url: '{{url('/select-delivery')}}',
                method: 'POST',
                data: {action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    })
</script>
</body>
</html>
