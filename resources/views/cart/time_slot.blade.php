@include('partials.header')

 {{-- apply-coupon-code modal --}}

 <div class="modal right fade" id="apply-coupon-code" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-" id="exampleModalLongTitle">Coupon Code</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="coupon_aplay">
                <input type="text" name='coupon_code' id="coupon_code" placeholder="Apply Coupon Code">
                <button class="btn coupon_apply_btn">Apply </button>
            </div>
            {{-- offers --}}
            @foreach(get_coupon() as $offer)
            <div class="coupons pt-10 mb-10">
                <div class="coupons_content_img"
                    data-background="{{url('')}}/upload/offers/{{$offer->image}}">
                    <div class="coupon_wrapper">
                        <div class="coupon_header">
                            <h5>
                                {{$offer->discount_type}}
                                <span>
                                    {{$offer->discount_amount}}%
                                </span>
                                off
                            </h5>
                        </div>
                        <div class="coupon_sub-header">
                            <p>{{$offer->description}}</p>
                        </div>
                        <div class="coupon_image coupon__image-cta">
                            <p>Use: {{$offer->coupon_code}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
 {{-- end apply-coupon-code modal --}}

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
                <div class="col-lg-7">
                    <div class="checkout-progress-wrap">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width:66.66%;" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="checkout-progress-step">
                            <ul>
                                <li class="active">
                                    <a href="{{url('user-details')}}" class="a_tag">
                                        <div class="icon"><i class="fas fa-check"></i></div>
                                        <span>Address </span>
                                    </a>
                                </li>
                                <li class="active">
                                    <div class="icon"><i class="fas fa-check"></i></div>
                                    <span>Time Slot</span>
                                </li>
                                <li>
                                    <div class="icon">3</div>
                                    <span>Payment</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="checkout-form-wrap">
                        <form class="needs-validation validation-fill"  action="{{url('time-slot-post')}}" method="POST" novalidate>
                            @csrf
                            <div class="row date_time">

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Date</label>
                                            <input class="result form-control" type="text" name="time_slot_date" id="cart_timeslot_date" value="{{session()->has('user_time_slot')?session()->get('user_time_slot')['date']:""}}" placeholder="Date ..." required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Time </label>
                                            <input class="result form-control" type="text" id="cart_timeslot_time" name="time_slot_time" value="{{session()->has('user_time_slot')?session()->get('user_time_slot')['time']:""}}" placeholder="Time..." required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn falot-right">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Order Summary --}}
                <div class="col-lg-5">

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

{{-- js is cart.js --}}
