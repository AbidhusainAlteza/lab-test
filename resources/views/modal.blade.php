{{-- login modal --}}
<div class="modal right fade" id="LoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div>
                <div class="modal_logo">
                    <img src="{{ url('')}}/img/logo/alteza_pharmacy2.png" alt="Alteza Pharmacy" class="_logo">
                </div>
                <div class="modal-header border-0">
                <h5 class="modal-" id="exampleModalLongTitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                @if (Session::has('error'))
                    <div class="alert alert-info">{{ Session::get('error') }}</div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <!-- form start -->
                <form >
                    <div>
                        <div class="login_error"></div>
                        @csrf
                        <!-- include message block -->
                        <div id="result-login" class="font-size-13"></div>
                        <div class="form-group email">
                            <input type="email" name="email" id="email" class="form-control auth-form-input" placeholder="Email Address" required>
                        </div>
                        <div class="form-group password">
                            <input type="password" name="password" id="password" class="form-control auth-form-input" placeholder="password" minlength="4"  required>
                            <i class="password-hide" id="password_show_hide" data="hide"></i>
                        </div>
                        <div class="form-group text-right">
                            <a href="javascript:void(0)" class="a_tag">forgot password</a>
                        </div>
                        <div class="form-group">
                            <a id="user_login" class="user_login btn btn-md btn-custom btn-block">login</a>
                        </div>
                    </div>
                </form>
                <!-- form end -->
                <div>
                    <p class="text-capitalize"> don't have account&nbsp;<a href="{{url('register')}}" class="a_tag">Register</a></p>
                </div>
                </div>
            </div>
      </div>
    </div>
  </div>

{{-- end login modal --}}

{{-- location modal --}}
<div class="modal fade" id="Locationmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h6 class="modal-" id="exampleModalLongTitle">Location</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control Number" name="locationinput" id="locationinput" maxlength="6" placeholder="Enter Pin Code">&nbsp;<span id="errmsg"></span>
                <button class="btn location_btn">Submit</button>
            </div>
        </div>
      </div>
    </div>
  </div>

{{-- end location modal --}}

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
                    <a href="{{url('offers/'.$offer->slug)}}">
                        <div class="coupon_wrapper">
                            <div class="coupon_header">
                                <h5 class="">
                                    {{$offer->title}}
                                    <span>
                                        {{$offer->discount_amount}}%
                                    </span>
                                    off
                                </h5>
                            </div>
                            <div class="coupon_sub-header">
                                <p class="m-0">{{$offer->description}}</p>
                            </div>
                            <span class="font-w-600 color-p">Offer valid</span>
                            <div class="coming-time" data-countdown="{{$offer->exp_date}}"></div>
                            <div class="coupon_image coupon__image-cta">
                                <p>Use: {{$offer->coupon_code}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
      </div>
    </div>
</div>
 {{-- end apply-coupon-code modal --}}


 {{-- img show modal --}}
 <div class="modal fade" id="img_show" tabindex="-1" role="dialog" aria-labelledby="img_show">
    <div class="modal-dialog modal-dialog-centered modal-max" role="document">
        <div class="modal-content">

        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <img style="width:100%" src="" class="imag_show">
            <br><br>
        </div>

        </div>
    </div>
</div>
{{-- end modal --}}

{{-- image show modal --}}
<div class="img_show_modal">

</div>
