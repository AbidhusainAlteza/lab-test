@include('partials.header')
<main>
    <div class="breadcrumb-area breadcrumb-bg-two">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$testsdetails->title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- shop-details-area -->
    <section class="shop-details-area pt-30 pb-50">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="shop-details-flex-wrap">
                        <div class="shop-details-img-wrap">
                            <div class="tab-pane fade show active" id="item-one" role="tabpanel"
                                aria-labelledby="item-one-tab">
                                <div class="shop-details-img">
                                    <img src="{{url('')}}/upload/lab_test_manage/{{$testsdetails->image}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 tests">
                    <div class="shop-details-content">
                        <h4 class="title">{{$testsdetails->title}}</h4>
                        <div class="shop-details-meta mb-2">
                            <div class="mt-2">
                                <p class="display_in_po_re">Also known as </p>
                                <span class="ml-2"><b>{{$testsdetails->short_description}}</b></span>
                            </div>
                            <div>
                                <span class="display_in_po_re">
                                    <img src="{{url('')}}/img/upload/symbol.svg" alt="">
                                </span>
                                <span><b>Certified Labs</b></span>
                            </div>
                            <div class="mt-2">
                                <span class=><i class="fa-solid fa-check-double tests_icon"></i></span>
                                <span class="display_in_po_re tests_span">Free Home Sample Pickup</span>
                            </div>
                        </div>

                        {{-- <p>{{$testsdetails->description}}</p> --}}
                        <div class="pb-3">
                            <div class="shop-details-price display_in_po_re">
                                @if ($testsdetails->discount == NULL)
                                    <h3 class="price">₹{{$testsdetails->price}}
                                @else
                                    <h3 class="discount_price">₹{{$testsdetails->price}}
                                    </h3>
                                    <h2 class="price">₹{{$testsdetails->offer_price}}</h2>
                                    <h3 class="discount">{{$testsdetails->discount}}%</h3>

                                @endif
                            </div>
                            <div class="shop-perched-info display_in_po_re ml-2">
                                @csrf
                                @if(session()->has('location_pincode'))
                                    @if (in_array($testsdetails->id, Cart_id()))
                                        <a href="javascript:void(0)" class="added_cart_btn remove_btn remove-to-cart-tests" data-id="{{$testsdetails->id}}">Remove in Cart</a>
                                        @if(!session()->has('user_name'))
                                        <a href="javascript:void(0)" class="btn border-2" data-toggle="modal" data-target="#LoginModalCenter">Book Now</a>

                                        @else
                                        <a href="{{url('')}}/user-details" class="btn border-2">Book Now</a>
                                        @endif

                                    @else
                                        <a href="javascript:void(0)" class="added_cart_btn add-to-cart-tests" data-id="{{$testsdetails->id}}" data-re="yes">Add to Cart</a>
                                        @if(!session()->has('user_name'))
                                        <a href="javascript:void(0)" class="btn border-2" data-toggle="modal" data-target="#LoginModalCenter">Book Now</a>
                                        @else
                                        <a href="{{url('')}}/user-details-add-cart/{{$testsdetails->id}}" class="btn border-2">Book Now</a>
                                        @endif
                                    @endif
                                @else
                                    @if (in_array($testsdetails->id, Cart_id()))
                                        <a class="added_cart_btn remove_btn " href="javascript:void(0)" data-toggle="modal" data-target="#Locationmodal" data-toggle="tooltip" data-placement="bottom" title="Locatione">Remove in Cart</a>
                                        @if(!session()->has('user_name'))
                                        <a class="btn border-2" href="javascript:void(0)" data-toggle="modal" data-target="#Locationmodal" data-toggle="tooltip" data-placement="bottom" title="Locatione">Book Now</a>

                                        @else
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#Locationmodal" data-toggle="tooltip" data-placement="bottom" title="Locatione" class="btn border-2">Book Now</a>
                                        @endif

                                    @else
                                        <a class="added_cart_btn " href="javascript:void(0)" data-toggle="modal" data-target="#Locationmodal" data-toggle="tooltip" data-placement="bottom" title="Locatione">Add to Cart</a>
                                        @if(!session()->has('user_name'))
                                        <a class="btn border-2" href="javascript:void(0)" data-toggle="modal" data-target="#Locationmodal" data-toggle="tooltip" data-placement="bottom" title="Locatione">Book Now</a>
                                        @else
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#Locationmodal" data-toggle="tooltip" data-placement="bottom" title="Locatione"class="btn border-2">Book Now</a>
                                        @endif
                                    @endif
                                @endif
                            </div>

                        </div>
                        <div class="row border_top_5 why_book_test ">
                            <div class="col-12 mb-25">
                                <img src="{{url('')}}/img/upload/reports_2.webp" alt="" class="test_img_icone">
                                <div class="test_img_dec">
                                    <p class="test_p_title">Get digital report within a day</p>
                                    <span>Our labs ensure turn-around-time of 24 hours from specimen pickup.</span>
                                </div>
                            </div>
                            <div class="col-12 mb-25">
                                <img src="{{url('')}}/img/upload/offers_3.webp" alt="" class="test_img_icone">
                                <div class="test_img_dec">
                                    <p class="test_p_title">Offers and affordable prices</p>
                                    <span>Get great discounts and offers on tests and packages.</span>
                                </div>
                            </div>
                            <div class="col-12 mb-25">
                                <img src="{{url('')}}/img/upload/whay_book.webp" alt="" class="test_img_icone">
                                <div class="test_img_dec">
                                    <p class="test_p_title">Home sample collection for FREE</p>
                                    <span>A certified professional will collect your sample from your preferred
                                        location.</span>
                                </div>
                            </div>
                        </div>
                        <div class="test_tab" id="test_tab">
                            <a href="javascript:void(0)" class="test_a_calick">What is this test? <i
                                    class="fa-solid fa-angle-down test_tab_i" id="test_tab_icone"></i></a>
                            <div class="test_disebal" id="test_tabs">
                                <?php echo $testsdetails->description;?>
                            </div>
                        </div>
                        <div class="test_tab2" id="test_tab">
                            <a href="javascript:void(0)" class="test_a_calick">Test Preparation<i
                                    class="fa-solid fa-angle-down test_tab_i" id="test_tab_icone_2"></i></a>
                            <div class="test_disebal" id="test_tabs2">
                                <?php echo $testsdetails->test_preparation; ?>
                            </div>
                        </div>
                        <div class="test_tab3" id="test_tab">
                            <a href="javascript:void(0)" class="test_a_calick">Understanding your test results <i
                                    class="fa-solid fa-angle-down test_tab_i" id="test_tab_icone_3"></i></a>
                            <div class="test_disebal" id="test_tabs3">
                                <?php echo $testsdetails->result_understand; ?>
                                {{var_dump(count($lab_test_result_table)>0)}}
                                @if (count($lab_test_result_table)>0)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table  border="1" cellpadding="1" cellspacing="1" style="width:500px">
                                                <thead>
                                                    <tr>
                                                        <th>Gender</th>
                                                        <th>Age groups</th>
                                                        <th>Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- {{$lab_test_result_table}} --}}
                                                    @foreach ($lab_test_result_table as $data_result)
                                                        <tr>
                                                            <td>{{$data_result->gender}}</td>
                                                            <td>{{$data_result->age_groups}}</td>
                                                            <td>{{$data_result->value}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    @if(session()->has('cart_item'))
                    <div class="row position_sticky ">
                        <div class="col-12">
                            <h2 class="title">Selected Package</h2>
                        </div>
                        @if(session('cart_item'))
                        @foreach(session('cart_item') as $id => $car_details)
                        <div class="col-12">
                            <div class="selected_package_border_bottom">
                                <div class="selected_package">
                                    <div class="selected_package_price">
                                        <span><b>{{$car_details["title"]}}</b></span>
                                        <span class="price">₹{{$car_details["discount"] == NULL?$car_details["price"]:$car_details["offer_price"]}}</span>
                                    </div>
                                    <!-- <span class="selected_package_include">Includes 85 tests</span> -->
                                </div>
                                <div class="selected_package">
                                    <div class="selected_package_price selected_package_discount">
                                        <span><b>Discount</b></span>
                                        <span class="selected_package_discount"><b>{{$car_details["discount"] == NULL?0:$car_details["discount"]}}% off</b></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="col-12">
                            <div class="selected_package_total pt-15 pb-10">
                                <div class="selected_package_price ">
                                    <span><b>TOTAL</b></span>
                                    <span class="price"><b>₹{{Cart_price_total()}}</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            @if(!session()->has('user_name'))
                                <a href="javascript:void(0)" class="btn btn-sm selected_package_btn" data-toggle="modal" data-target="#LoginModalCenter">Book Now</a>
                            @else
                            <a href="{{url('')}}/user-details" class="btn btn-sm selected_package_btn">Book Now</a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- shop-details-area-end -->
    <!-- Popular Health Checkup Packages -->
    <section class="special--products-area" data-background="{{url('')}}/img/bg/slider_area_bg.jpg">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class=" pt-10 display-f-j-c-s-b_a-i-c">
                        <h2 class="title">Popular Health Checkup Packages</h2>
                        <div class="view_all">
                            <a href="{{url('packages')}}">View All</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row popular_health_row">
                <div class="col-12">
                    <div class="product-desc-wrap">
                        <ul class="nav nav-tabs" id="myTabTwo" role="tablist">
                            <?php $i = 0; ?>
                            @foreach($packages_type as $package_type)
                            <li class="nav-item">
                                <a class="nav-link {{$i==0?'active':''}}" id="{{$package_type->slug}}-tab" data-toggle="tab"
                                    href="#{{$package_type->slug}}" role="tab" aria-controls="{{$package_type->slug}}"
                                    aria-selected="true">{{ucwords($package_type->package_type)}}</a>
                            </li>
                            <?php $i++ ?>
                            @endforeach
                        </ul>
                        <div class="tab-content" id="myTabContentTwo">
                            <?php $i = 0; ?>
                            @foreach($packages_type as $package_type)
                                <div class="tab-pane fade  {{$i==0?'show active':''}}" id="{{$package_type->slug}}" role="tabpanel"
                                aria-labelledby="{{$package_type->slug}}-tab">
                                    <div class=row>
                                    @foreach($packages as $package)
                                        @if ($package_type->id == $package->package_type_id)
                                            <div class="col-lg-3 col-md-4 col-sm-6">
                                                <div class="packages">
                                                    <a href="{{url('')}}/health-checkup-packages/{{$package->slug}}">
                                                        <div class="packages_img">
                                                            <img src="{{url('')}}/upload/packages/{{$package->image}}" alt="">
                                                        </div>
                                                        <div class="mr-1 ml-2">
                                                            <div class="packages_des">
                                                                <div class="mb-2">
                                                                    <h6 class="mb-0">{{$package->title}}</h6>
                                                                    <p class="ellipses">
                                                                        {{$package->description}}
                                                                    </p>
                                                                </div>
                                                                <div>
                                                                    <p>
                                                                        85 tests included
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="packages_footer display_in_po_re ">
                                                                <div>
                                                                    <div class="display_in_po_re price">
                                                                        <strong>₹ {{$package->offer_amount}}</strong>
                                                                    </div>
                                                                    <div class="display_in_po_re ml-1 decprice">
                                                                        <s>₹ {{$package->total_amount}}</s>
                                                                    </div>
                                                                    <div class="display_in_po_re dec">
                                                                        <strong>{{$package->discount}}% off</strong>
                                                                    </div>
                                                                    <div class="display_in_po_re ml-3 packages_footer_btn">
                                                                        @if(session()->has('location_pincode'))
                                                                            @if(!session()->has('user_name'))
                                                                                <a href="javascript:void(0)" class="custome_btn_sm" data-toggle="modal" data-target="#LoginModalCenter">Book Now</a>
                                                                            @else
                                                                            <a href="{{url('')}}/health-checkup-packages-book/{{$package->id}}" class="custome_btn_sm ">Book Now</a>
                                                                            @endif
                                                                        @else
                                                                            <a href="javascript:void(0)" class="custome_btn_sm" data-toggle="modal" data-target="#Locationmodal" data-toggle="tooltip" data-placement="bottom" title="Locatione">Book Now</a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                                <?php $i++ ?>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Popular Health Checkup Packages -->


    <!-- Thousands of Happy Customers -->
    <section class="best-sellers-area pt-30 pb-30">
        <div class="container custom-container">
            <div class="row happy_customers">
                <div class="col-lg-12 col-md-10 pb-20">
                    <div class=" section-title-two text-center mb-30">
                        <h2 class="title">Thousands of Happy Customers</h2>
                    </div>
                </div>
                <div class="happy-customers-carousel owl-carousel">
                    <div class="happy_customers_title">
                        <h5>Very professional phlebo. Excellent job in collecting the sample. No pain at all. Got my
                            report also within 24 hours.</h5>
                        <p class="happy_customers_sub">Malathi Ganapathy</p>
                    </div>
                    <div class="happy_customers_title">
                        <h5>Everything went very well and smoothly. Technician was right on time. Really happy with the
                            service.</h5>
                        <p class="happy_customers_sub">Ashish Garnaik</p>
                    </div>
                    <div class="happy_customers_title">
                        <h5>Good service, Practo is avoiding to stand in que for health checkup.</h5>
                        <p class="happy_customers_sub">Lalita Hegde</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Thousands of Happy Customers -->
</main>



<!-- main-area-end -->
@include ('partials.footer')
