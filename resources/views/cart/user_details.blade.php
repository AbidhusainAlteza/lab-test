{{-- @if(!session()->has('cart_item') && !session()->has('health_checkup_packages'))
@php
    header("Location: " . URL::to('/'), true, 302);
    exit();
@endphp
@endif --}}

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
                <div class="col-lg-7">
                    @include('flash_message')
                    <div class="checkout-progress-wrap">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width:33.33%;" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="checkout-progress-step">
                            <ul>
                                <li class="active">
                                    <div class="icon"><i class="fas fa-check"></i></div>
                                    <span>Address </span>
                                </li>
                                <li>
                                    <div class="icon">2</div>
                                    <span>Time Slot</span>
                                </li>
                                <li>
                                    <div class="icon">3</div>
                                    <span>Payment</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="checkout-form-wrap cart_user_addres_wrap">
                        <input type="hidden" name="user_addres_id" class="cart_user_addres_id" value="">
                        <div class="cart-user-address-showe">
                            @php $user_address = get_user_information(); @endphp
                            @if(count($user_address) > 0)
                                @foreach ($user_address as $user_addres)

                                <div class="" id="cart_user_addres_select_id_{{$user_addres->id}}">
                                    <div class="datails-body ">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h6 class="text-capitalize">{{$user_addres->name}} - {{$user_addres->email}}</h6>
                                                <span>{{$user_addres->address}}  - {{$user_addres->contact_number}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="float-right">
                                                    <button class="custom_btn cart_select_btn " data="{{$user_addres->id}}" ><i class="fa-regular fa-circle-check"></i> Select</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <div>
                            <button class="custom_btn cart_show_user_address" data="0"><i class="fa-solid fa-plus"></i> Add New Address</button>
                            <button class="custom_btn float-right cart_user_address_continue">Continue <i class="fa-solid fa-forward"></i></button>
                        </div>
                        <div class="cart_user_addres_datails">
                            <form class="needs-validation validation-fill" action="{{url('user-personal-information-post')}}" id="user_address_form" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="error"></div>
                                @csrf
                                <input type="hidden" name="id" value="{{get_user()->id}}">
                                <input type="hidden" name="user_address_id" id ="user_address_id"  value="">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom1">Full name *</label>
                                        <div class="input-group">
                                            <input type="text" name="name" class="form-control name" id="validationCustom1"
                                                placeholder="Name" value="" required>
                                            <div class="invalid-feedback">Please provide a User Name</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">Address *</label>
                                        <div class="input-group">
                                            <input type="text" name="address" class="form-control address" id="validationCustom3"
                                                placeholder="Address" value="" required>
                                            <div class="invalid-feedback">Please provide a Address</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom10">Contact Number *</label>
                                        <div class="input-group">
                                            <input type="number" name="contact_number" class="form-control contact_number" id="validationCustom10"
                                                placeholder="Contact Number" value="" required>
                                            <div class="invalid-feedback">Please provide a Contact Number</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 ">
                                        <label for="validationCustom6">State *</label>
                                        <div class="input-group">
                                            <select type="text" name="state" class="form-control cart-state" id="validationCustom6" required>
                                                <option>select a state</option>
                                                @foreach(get_states() as $states)
                                                <option value="{{$states->id}}">{{$states->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please provide a State</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom5">City *</label>
                                        <div class="input-group">
                                            <select type="text" name="city" class="form-control cart-city" id="validationCustom5" required>
                                                <option>select a city</option>
                                            </select>
                                            <div class="invalid-feedback">Please provide a City</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom7">Zip *</label>
                                        <div class="input-group">
                                            <input type="text" name="zip" class="form-control zip" id="validationCustom7"
                                                placeholder="Zip" value="" required>
                                            <div class="invalid-feedback">Please provide a Zip</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom13">Message</label>
                                        <div class="input-group">
                                            <textarea  class="form-control message" id="validationCustom13" name="message"  rows="2" cols="50" placeholder="Enter Medicine Condition" ></textarea>
                                            <div class="invalid-feedback">Please provide a valid Medicine Condition</div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn" type="submit">Submit form</button>
                            </form>
                        </div>
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
{{-- script an caert.js --}}
