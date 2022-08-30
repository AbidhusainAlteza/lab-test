<div class="shop-cart-total order-summary-wrap">
    @if(!session()->has('cart_item_total'))
        <div class="row">
            <div class="col-12">

                <div class="float-right">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#apply-coupon-code" class="btn coupon_btn"><i class="fa-solid fa-ticket"></i> Apply Coupon Code</a>
                </div>
            </div>
        </div>
    @endif
    <h3 class="title">Order Summary</h3>
    @if(session('cart_item'))
        @foreach(session('cart_item') as $id => $car_details)
            <div class="os-products-item">
                <div class="content">
                    <h6 class="title"><a href="shop-details.html">{{$car_details["title"]}}</a></h6>
                    <div class="dispaly_flex_sp_b">
                        <label class="lable">price</label>
                        <span class="price">₹{{$car_details["price"]}}</span>
                    </div>
                    <div class="dispaly_flex_sp_b">
                        <label class="lable">offer price</label>
                        <span class="offer_price">₹{{$car_details["offer_price"]}}</span>
                    </div>
                    <div class="dispaly_flex_sp_b">
                        <label class="lable">Discount</label>
                        <span class="discount">{{$car_details["discount"]}}% </span>
                    </div>
                </div>
                <div class="remove">
                    @csrf
                    <a href="javascript:void(0)" class="remove-to-cart-tests" data-id="{{$id}}"><i
                            class="far fa-trash-alt"></i></a>
                </div>
            </div>
        @endforeach
        <div class="shop-cart-widget">
            <form action="#">
                <ul>
                    <li class="cart-total-amount"><span>Subtotal Price</span> <span class="amount">
                        ₹{{Cart_price_total()}}</span>
                    </li>
                    @if(session()->has('coupons_discount'))
                    <li class="cart-total-amount"><span>Coupons Discount</span>
                        <span class="amount" style="color: red">{{session()->get('coupons_discount')}}%</span>
                        <div class="coupons_discount_remove">
                            @csrf
                            <a href="javascript:void(0)" class="coupons_discount_remove" ><i class="far fa-trash-alt"></i></a>
                        </div>
                    </li>
                    @endif
                    <li class="cart-total-amount"><span>Total Price</span> <span class="amount">
                        ₹{{session()->has('cart_item_total')?session()->get('cart_item_total'):Cart_price_total()}}</span>
                    </li>
                    </ul>
            </form>
        </div>
    @endif

    @if(session('health_checkup_packages'))
        @foreach(session('health_checkup_packages') as $id => $car_details)
            <div class="os-products-item">
                <div class="content">
                    <h6 class="title"><a href="shop-details.html">{{$car_details["title"]}}</a></h6>
                    <div class="dispaly_flex_sp_b">
                        <label class="lable">price</label>
                        <span class="price">₹{{$car_details["price"]}}</span>
                    </div>
                    <div class="dispaly_flex_sp_b">
                        <label class="lable">offer price</label>
                        <span class="offer_price">₹{{$car_details["offer_price"]}}</span>
                    </div><div class="dispaly_flex_sp_b">
                        <label class="lable">Discount</label>
                        <span class="discount">{{$car_details["discount"]}}% </span>
                    </div>
                </div>
            </div>
            <div class="shop-cart-widget">
                <form action="#">
                    <ul>
                        <li class="cart-total-amount"><span>Subtotal Price</span> <span class="amount">
                            ₹{{$car_details["offer_price"]}}</span>
                        </li>
                        @if(session()->has('coupons_discount'))
                        <li class="cart-total-amount"><span>Coupons Discount</span>
                            <span class="amount" style="color: red">{{session()->get('coupons_discount')}}%</span>
                            <div class="coupons_discount_remove">
                                @csrf
                                <a href="javascript:void(0)" class="coupons_discount_remove" ><i class="far fa-trash-alt"></i></a>
                            </div>
                        </li>
                        @endif
                        <li class="cart-total-amount"><span>Total Price</span> <span class="amount">
                            ₹{{session()->has('cart_item_total')?session()->get('cart_item_total'):$car_details["offer_price"]}}</span>
                        </li>
                        </ul>
                    </form>
            </div>
        @endforeach
    @endif
</div>
