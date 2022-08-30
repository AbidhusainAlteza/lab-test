<!doctype html>
<html class="no-js" lang="">

<!-- Mirrored from themebeyond.com/pre/ganic-prev/ganic-live/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Mar 2022 10:06:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{isset($title)?$title:""}}</title>
        <meta name="description" content="{{isset($description)?$description:""}}">
        <meta name="keywords" content="{{isset($keywords)?$keywords:""}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"> -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/sweetalert2.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="{{ asset('bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('dist/imageuploadify.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{ asset('css/flaticon.css')}}">
        <link rel="stylesheet" href="{{ asset('css/aos.css')}}">
        <link rel="stylesheet" href="{{ asset('css/slick.css')}}">
        <link rel="stylesheet" href="{{ asset('css/default.css')}}">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custome.css')}}">
        <link rel="stylesheet" href="{{ asset('css/responsive2.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/loader.css')}}">
    </head>
    <body>
        <!-- preloader  -->
        <div id="preloader">
            <div id="loading">
                <div class="loader">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <!--end preloader -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header class="header-style-two">

            <div id="sticky-header" class="menu-area">
                <div class="container custom-container">
                    <div class="row alig">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="row align_items_center">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 logo_sm ">
                                    <div class="logo">
                                        <a href="{{url('')}}"><img src="{{ url('')}}/img/logo/alteza_pharmacy2.png" alt="Alteza Pharmacy" class="_logo"></a>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 responsiv_sm">
                                    <div class="row">

                                        {{-- serche --}}
                                        <div class="col-md-9 col-lg-9 col-sm-9 serche_sm">
                                            <div class="header-search-wrap">
                                                <form class="form serche_lg" action="{{url('serche-form')}}" method="POST">
                                                    @csrf
                                                    <select class="custom-select serche_type" id="serche_type" name="serche_type">
                                                        {{-- <option value="0">All</option> --}}
                                                        <option value="1" selected>Lab Tests</option>
                                                        <option value="2">Packages</option>
                                                        <option value="3">Offers</option>
                                                    </select>
                                                    <input type="text" name="serche_input" class="serche_input_class" id="serche_input" placeholder="Search..." required>
                                                    <button id="serch_btn"><i class="flaticon-loupe-1"></i></button>
                                                </form>
                                                <div class="serche-result" id="">
                                                    <ul id="serche_ajax" class="serche_ajax_class">

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- cart account --}}
                                        <div class="col-md-3 col-lg-3 col-sm-3 p-0 cart_sm">
                                            <div class="header-action">
                                                <ul class="float-right Pt-5">
                                                    <li class="location_prescription {{session()->has('location_pincode') ? '':'header-user header-location'}}">
                                                        @if(session()->has('location_pincode'))
                                                            <a href="javascript:void(0)" class="btn _header_btn" data-toggle="modal" data-target="#Locationmodal">
                                                                <i class="fa-solid fa-location-dot ml-1"></i>
                                                                {{session()->get('location_pincode').','.session()->get('location_taluka')}}
                                                            </a>
                                                        @else
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#Locationmodal" data-toggle="tooltip" data-placement="bottom" title="Locatione">
                                                            <i class="fa-solid fa-location-dot"></i>
                                                        </a>
                                                        @endif
                                                    </li>
                                                    <li class="location_prescription header-user header-prescription">
                                                        @if(!session()->has('user_name'))
                                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#LoginModalCenter" data-toggle="tooltip" data-placement="bottom" title="Upload Prescription">
                                                                <i class="fa-solid fa-file-prescription"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{url('upload-prescription')}}" data-toggle="tooltip" data-placement="bottom" title="Upload Prescription">
                                                                <i class="fa-solid fa-file-prescription"></i>
                                                            </a>
                                                        @endif
                                                    </li>
                                                    <li class="header-user">
                                                        <a href="#"  type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"><i class="flaticon-user"></i></a>

                                                        <div class="dropdown-menu dropdown_menu_header m-0" aria-labelledby="dropdownMenuButton3">
                                                            @if(session()->has('user_name'))
                                                            <a class="dropdown-item" href="{{url('account')}}"><i class="fa-solid fa-gear"></i>Account</a>
                                                            <a class="dropdown-item" href="{{url('user-logout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
                                                            @else
                                                            <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#LoginModalCenter"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                                                            <a href="{{url('register')}}" class="dropdown-item"><i class="fa-solid fa-address-card"></i> Register</a>
                                                                {{-- <a class="dropdown-item" href="{{url('orders')}}"><i class="fa-solid fa-bag-shopping"></i>Orders </a> --}}
                                                            @endif
                                                        </div>
                                                    </li>
                                                    <li class="header-cart-action">
                                                        <div class="header-cart-wrap">
                                                            <a href="javascript:void(0)" class="cart-wrap" id="cart_wrap"><i class="flaticon-shopping-basket"></i></a>
                                                            <span class="item-count" id="item_counts">{{Cart_total()}}</span>
                                                            {{-- @if(session('cart_item'))
                                                            @endif --}}
                                                            <ul class="minicart">
                                                                <li class="d-flex border-bottom">
                                                                    <h5>Your Cart</h5>
                                                                </li>
                                                                @if(session('cart_item'))
                                                                @foreach(session('cart_item') as $id => $car_details)
                                                                {{-- <div class="ajax_cart">
                                                                    <li class="d-flex align-items-start space-between border-bottom">

                                                                        <div class="cart-content">
                                                                            <h4><a href="javascript:void(0)">{{$car_details["title"]}}</a></h4>
                                                                            <div class="cart-price">
                                                                                <span class="new">₹{{$car_details["offer_price"]}}</span>
                                                                                <span><del>₹{{$car_details["price"]}}</del></span>
                                                                                <span class="discount">{{$car_details["discount"]}}%</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="del-icon m-0">
                                                                            @csrf
                                                                            <a href="javascript:void(0)" class="remove-to-cart-tests" data-id="{{$id}}"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </li>

                                                                </div> --}}

                                                                @endforeach
                                                                {{-- <li>
                                                                    <div class="total-price">
                                                                        <span class="f-left">Total:</span>
                                                                        <span class="f-right">₹{{Cart_price_total()}}</span>
                                                                    </div>
                                                                </li> --}}
                                                                @if(session()->has('user_name'))
                                                                {{-- <li>
                                                                    <div class="checkout-link">
                                                                        <a class="black-color" href="{{url('')}}/user-details">Proceed to Checkout</a>
                                                                    </div>
                                                                </li> --}}
                                                                @else
                                                                {{-- <li>
                                                                    <div class="checkout-link">
                                                                        <a class="black-color" href="javascript:void(0)" data-toggle="modal" data-target="#LoginModalCenter">Prassaoceed to Checkout</a>
                                                                    </div>
                                                                </li> --}}
                                                                @endif
                                                            </ul>
                                                            @else
                                                            {{-- <div class="cart_empty">
                                                                <span>Cart Is Empty</span>
                                                            </div> --}}
                                                            @endif

                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="mobile-nav-toggler">
                                                            <i class="fas fa-bars"></i>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-12 display-f-j-c-s-b_a-i-c" >
                                            {{-- <div class="mobile-nav-toggler">
                                                <i class="fas fa-bars"></i>
                                            </div> --}}
                                                <div class="header_menu">
                                                    <div class="menu-wrap">
                                                        <nav class="menu-nav">
                                                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                                                <ul class="navigation">
                                                                    <li>
                                                                        <a href="{{url('packages')}}">
                                                                            <div class="product-tab__title">
                                                                                packages
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{url('lab-tests')}}">
                                                                            <div class="product-tab__title">
                                                                                Lab Tests
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{url('offers')}}">
                                                                            <div class="product-tab__title">
                                                                                Offers
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </nav>
                                                    </div>

                                                </div>
                                            {{-- <div class="location_prescription">
                                                <a href="javascript:void(0)" class="btn _header_btn" data-toggle="modal" data-target="#Locationmodal">
                                                    <i class="fa-solid fa-location-dot ml-1"></i>
                                                    @if(session()->has('location_pincode'))
                                                    {{session()->get('location_pincode').','.session()->get('location_taluka')}}
                                                    @else
                                                    Location
                                                    @endif
                                                </a>
                                                @if(!session()->has('user_name'))
                                                <a href="javascript:void(0)" class="btn _header_btn" data-toggle="modal" data-target="#LoginModalCenter">
                                                    <i class="fa-solid fa-upload ml-1"></i>
                                                    Upload Prescription
                                                </a>
                                                @else
                                                <a href="{{url('upload-prescription')}}" class="btn _header_btn">
                                                    <i class="fa-solid fa-upload ml-1"></i>
                                                    Upload Prescription
                                                </a>
                                                @endif
                                            </div> --}}
                                            <!-- Mobile Menu  -->
                                            <div class="mobile-menu custome_mobile">
                                                <nav class="menu-box">
                                                    <div class="close-btn"><i class="fas fa-times"></i></div>
                                                    <div class="nav-logo"><a href="{{url('')}}"><img src="{{url('')}}/img/logo/alteza_pharmacy2.png" alt="Alteza Pharmacy" title=""></a>
                                                    </div>
                                                    {{-- serche for mobile --}}
                                                    <div class="mobile_serche">
                                                        <div class="header-search-wrap ">
                                                            <form class="form" action="{{url('serche-form')}}" method="POST">
                                                                @csrf
                                                                <select class="custom-select serche_type_mobile" id="serche_type" name="serche_type">
                                                                    {{-- <option value="0">All</option> --}}
                                                                    <option value="1" selected>Lab Tests</option>
                                                                    <option value="2">Packages</option>
                                                                    <option value="3">Offers</option>
                                                                </select>
                                                                <input type="text" name="serche_input" id="serche_input" class="mobile_serche_input" placeholder="Search..." required>
                                                                <button id="serch_btn"><i class="flaticon-loupe-1"></i></button>
                                                            </form>
                                                            <div class="serche-result l-r-0" >
                                                                <ul id="serche_ajax" class="mobile_serche_ajax">

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end serche --}}
                                                    <div class="menu-outer">
                                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                                    </div>
                                                    {{-- <div class="social-links">
                                                        <ul class="clearfix">
                                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                                            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                                            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                                            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                                        </ul>
                                                    </div> --}}
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mt-3">
                                                                <a href="javascript:void(0)" class="btn _header_btn d-block" data-toggle="modal" data-target="#Locationmodal">
                                                                    <i class="fa-solid fa-location-dot ml-1"></i>
                                                                    @if(session()->has('location_pincode'))
                                                                    {{session()->get('location_pincode').','.session()->get('location_taluka')}}
                                                                    @else
                                                                    Location
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mt-1">
                                                                @if(!session()->has('user_name'))
                                                                <a href="javascript:void(0)" class="btn _header_btn d-block" data-toggle="modal" data-target="#LoginModalCenter">
                                                                    <i class="fa-solid fa-upload ml-1"></i>
                                                                    Upload Prescription
                                                                </a>
                                                                @else
                                                                <a href="{{url('upload-prescription')}}" class="btn _header_btn d-block">
                                                                    <i class="fa-solid fa-upload ml-1"></i>
                                                                    Upload Prescription
                                                                </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </nav>
                                            </div>
                                            <div class="menu-backdrop"></div>
                                            <!-- End Mobile Menu -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>




@include('modal')
