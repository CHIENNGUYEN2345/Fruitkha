@extends('welcome')
@section('content')
<!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title"> 
                        <h3><span class="orange-text">Result</span></h3>
                        <h4>KẾT QUẢ TÌM KIẾM: {{$keywords}}</h4>
                    </div>
                </div>
            </div>



            <div class="row">
                @foreach($search_product as $key=>$pro)
                
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

    
@endsection