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
                                    <a href="{{url('payment')}}" class="a_tag">
                                        <div class="icon"><i class="fas fa-check"></i></div>
                                        <span>Payment</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @include('flash_message')
                    <div class="checkout-form-wrap border-0">
                        <!-- {{var_dump($total_amount)}} -->
                        <form action="{{url('razorpay-payment')}}" method="POST" >
                            @csrf
                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="{{ env('RAZOR_KEY') }}"
                                    data-amount={{$total_amount * 100}}
                                    data-buttontext="Pay Amount ₹{{$total_amount}}"
                                    data-name="Alteza"
                                    data-description="Current Transaction"
                                    data-image="{{url('')}}/img/logo/alteza_pharmacy2.png"
                                    data-prefill.name="Abidhusain"
                                    data-prefill.email="abidhusain@gmail.com"
                                    data-theme.color="#065C55">
                            </script>
                            {{-- <input type="hidden" name="_token" value="{!!csrf_token()!!}"> --}}
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

