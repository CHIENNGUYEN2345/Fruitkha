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
                            @foreach($cate_product as $key=>$cate)
                            <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}"><li>{{$cate->category_name}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
            </div>

            <div class="row">
                @foreach($category_by_id as $key=>$cate)
                
                <div class="col-lg-4 col-md-6 text-center">
                    
                    <form>
                            @csrf
                            <input type="hidden" class="cart_product_id_{{$cate->product_id}}" name="" value="{{$cate->product_id}}">
                            <input type="hidden" class="cart_product_name_{{$cate->product_id}}" name="" value="{{$cate->product_name}}">
                            <input type="hidden" class="cart_product_image_{{$cate->product_id}}" name="" value="{{$cate->product_image}}">
                            <input type="hidden" class="cart_product_price_{{$cate->product_id}}" name="" value="{{$cate->product_price}}">
                            <input type="hidden" class="cart_product_qty_{{$cate->product_id}}" name="" value="1">
                             <input type="hidden" class="cart_product_qty_real_{{$cate->product_id}}" name="" value="{{$cate->product_quantity}}">
                            <div class="product-image">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$cate->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$cate->product_image)}}" alt="" width="261" height="261"></a>
                            </div>
                        
                            <h3>{{$cate->product_name}}</h3>
                            <p class="product-price"><span>Per Kg</span>{{number_format($cate->product_price).' '.'VND'}}</p>
                            <a href="#" class="cart-btn add-to-cart" name="add-to-cart" data-id_product="{{$cate->product_id}}"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </form>

                </div>
                
                
                @endforeach
            </div>
        </div>
    </div>
    <!-- end product section -->

    <!-- Javascript -->
    <script type="text/javascript">
        $(document).ready(function(){

            //jquery function
            $('.add-to-cart').click(function(){
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_'+id).val();
                var cart_product_name = $('.cart_product_name_'+id).val();
                var cart_product_image = $('.cart_product_image_'+id).val();
                var cart_product_price = $('.cart_product_price_'+id).val();
                var cart_product_qty = $('.cart_product_qty_'+id).val();
                var _token = $('input[name="_token"]').val();

                //ajax function
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'post',
                    data: {cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
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

            });//end jquery func
           
        });
    </script>
    <!-- end Javascript -->
@endsection