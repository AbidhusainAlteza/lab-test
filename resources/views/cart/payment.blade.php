@include('partials.header')

<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <div class="breadcrumb-area breadcrumb-bg-two">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{isset($title)?$title:""}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- checkout-area -->
    <div class="checkout-area pt-20 pb-20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="checkout-progress-wrap">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="checkout-progress-step">
                            <ul>
                                <li class="active" >
                                    <a href="{{url('user-details')}}" class="a_tag">
                                        <div class="icon"><i class="fas fa-check"></i></div>
                                        <span>Address </span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="{{url('time-slot')}}" class="a_tag">
                                        <div class="icon"><i class="fas fa-check"></i></div>
                                        <span>Time Slot</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <div class="icon"><i class="fas fa-check"></i></div>
                                    <span>Payment</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="checkout-form-wrap">
                        <form  action="order-add" method='POST' id="order_add">
                            @csrf
                            <div class="building-info-wrap">
                                <h5 class="title">Payment Method</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul>
                                            <li class="payment_option">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="radio" class="custom-control-input"name="payment" value="online_payment" id="online_payment" >
                                                    <label class="custom-control-label" for="online_payment">Online Payment</label>
                                                </div>
                                            </li>
                                            <li class="payment_option">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="radio" class="custom-control-input"name="payment" value="cash_on_delivery" id="cash_on_delivery" checked>
                                                    <label class="custom-control-label" for="cash_on_delivery">Cash on Delivery</label>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="Payment_btn">
                                    @if(session()->has('user_name'))
                                    <button type="submit" name="submit" id="payment_submit" class="btn">Continue to Payment</button>
                                     @else
                                    <li><a href="javascript:void(0)" class="btn" data-toggle="modal" data-target="#LoginModalCenter">Continue to Payment</a></li>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Order Summary --}}
                <div class="col-lg-5 col-md-5 col-sm-12">

                    @include('cart.order_summary')

                </div>
                {{-- end Order Summary --}}
            </div>
        </div>
    </div>
    <!-- checkout-area-end -->

</main>
<!-- main-area-end -->
@include ('partials.footer')

