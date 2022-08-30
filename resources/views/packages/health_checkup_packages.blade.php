@include('partials.header')
<main>
    <div class="breadcrumb-area breadcrumb-bg-two">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
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
                <div class="col-lg-3">
                    <div class="shop-details-flex-wrap position_sticky">
                        <div class="shop-details-img">
                            <img src="{{url('')}}/upload/packages/{{$packages->image}}" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 tests">
                    <div class="shop-details-content">
                        @if ($packages->discount !== NULL)
                            <span class="discount">{{$packages->discount}}% off</span>
                        @endif
                        <h4 class="title">{{$packages->title}}</h4>
                        <div class="shop-details-meta mb-2">
                            <div class="mt-2">
                                <?php echo $packages->description;?>
                            </div>
                        </div>
                        <div class="row border_top_5">
                            <div class="col-12">
                                <p class="p_title mb-2">Who should book this checkup?</p>
                                {{-- <span>This checkup is ideal for women between 15-40 years of age.</span> --}}
                                <?php echo $packages->description;?>
                            </div>
                        </div>
                        <div class="row border_top_5">
                            <div class="col-12">
                                <p class="p_title mb-2">What preparation is needed for this Checkup?</p>
                                <span>Fasting is required for about 10 - 12 hours before the sample collection.
                                    Consumption of water is permitted.</span>
                            </div>
                        </div>


                        <div class="row border_top_5 why_book_test border_bottom_5">
                            <p class="p_title mb-3">Why book with us?</p>
                            <div class="col-12 mb-25">
                                <img src="{{url('')}}/img/upload/reports_2.webp" alt="" class="test_img_icone">
                                <div class="test_img_dec">
                                    <p class="test_p_title">Home sample collection for FREE</p>
                                    <span>A certified professional will collect your sample from your preferred
                                        location.</span>
                                </div>
                            </div>
                            <div class="col-12 mb-25">
                                <img src="{{url('')}}/img/upload/offers_3.webp" alt="" class="test_img_icone">
                                <div class="test_img_dec">
                                    <p class="test_p_title">Get digital report within 2 days</p>
                                    <span>Our labs ensure turn-around-time of 48 hours from specimen pickup.</span>
                                </div>
                            </div>
                            <div class="col-12 mb-25">
                                <img src="{{url('')}}/img/upload/whay_book.webp" alt="" class="test_img_icone">
                                <div class="test_img_dec">
                                    <p class="test_p_title">Valuable doctor's consultation</p>
                                    <span>Get your online reports and review them with one of our doctors for
                                        free.</span>
                                </div>
                            </div>
                        </div>
                        @if($lab_tests !== 0)
                        <div class="row pt-20" id="health_checkup_packages1">
                            <div class="col-12" >
                                <p class="p_title mb-2" id="include_test">Includes {{isset($lab_tests)?count($lab_tests):''}} Tests</p>
                                <?php $i=0 ?>
                                @foreach($lab_tests as $lab_test)
                                <div class="test_tab_{{$i}}" id="test_tab">
                                    <a href="javascript:void(0)" class="test_a_calick">{{$lab_test->title}}<i
                                            class="fa-solid fa-angle-down test_tab_i" id="test_tab_icone_{{$i}}"></i></a>
                                    <div class="test_disebal" id="test_tabs_{{$i}}">
                                        <!-- <p class="p_title">5 tests</p> -->

                                        <p>{{$lab_test->description}}</p>
                                        <p><b>{{$lab_test->description}}</b></p>
                                        <p><b>{{$lab_test->short_description}}</b></p>
                                        <p><b>{{$lab_test->test_preparation}}</b></p>
                                        <?php echo $lab_test->result_understand; ?>
                                        <div class="col-md-6">
                                            <div class="health_checkup_packages_labtest_link ">
                                                <a href="{{url('').'/lab-tests/'.$lab_test->slug}}" target="_blank">
                                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>

                                                    More Information On Lab Tests
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++ ?>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div class="row border_top_5">
                            <div class="col-12">
                                <p class="p_title">How it works?</p>
                            </div>
                            <div class="col-12 how_it_works">
                                <div class="how_it_works_display">
                                    <img src="{{url('')}}/img/upload/works.svg" alt="" class="how_it_works_img">
                                    <span class="ml-2">Pick a package that suits your healthcare needs and seamlessly
                                        book a home sample collection</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="how_it_works_line">
                                    |
                                </div>
                            </div>
                            <div class="col-12 how_it_works">
                                <div class="how_it_works_display">
                                    <img src="{{url('')}}/img/upload/works2.svg" alt="" class="how_it_works_img">
                                    <span class="ml-2">We will send a certified professional to your place to assist you
                                        with the sample collection</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="how_it_works_line">
                                    |
                                </div>
                            </div>
                            <div class="col-12 how_it_works">
                                <div class="how_it_works_display">
                                    <img src="{{url('')}}/img/upload/works3.svg" alt="" class="how_it_works_img">
                                    <span class="ml-2">
                                        After your sample collection, you can access your reports within your account on
                                        our mobile application. We will also email you the reports
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="how_it_works_line">
                                    |
                                </div>
                            </div>
                            <div class="col-12 how_it_works">
                                <div class="how_it_works_display">
                                    <img src="{{url('')}}/img/upload/works4.svg" alt="" class="how_it_works_img">
                                    <span class="ml-2">Schedule an Online consultation with a doctor to understand your
                                        results better and get medical advice for free</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- Selected Package --}}
                <div class="col-lg-3">
                    <div class="row position_sticky ">
                        <div class="col-12">
                            <h2 class="title">Selected Package</h2>
                        </div>
                        <div class="col-12">
                            <div class="selected_package_border">
                                <div class="selected_package_price">
                                    <span><b>{{$packages->title}}</b></span>
                                    <span class="price">₹{{$packages->total_amount}}</span>
                                </div>
                                @if($lab_tests !== 0)
                                <a href="#include_test">
                                    <span class="selected_package_include">Includes {{isset($lab_tests)?count($lab_tests):''}} tests</span>
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="selected_package_border mt-1">
                                <div class="selected_package_price selected_package_discount">
                                    <span><b>Discount</b></span>
                                    <span class="selected_package_discount"><b>{{$packages->discount == NULL?0:$packages->discount}}% off</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="selected_package_total pt-15 pb-10">
                                <div class="selected_package_price ">
                                    <span><b>TOTAL</b></span>
                                    <span class="price"><b>₹{{$packages->discount==NULL?$packages->total_amount:$packages->offer_amount}}</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            @if(session()->has('location_pincode'))
                                @if(!session()->has('user_name'))
                                    <a href="javascript:void(0)" class="btn btn-sm selected_package_btn" data-toggle="modal" data-target="#LoginModalCenter">Book Now</a>
                                @else
                                <a href="{{url('')}}/health-checkup-packages-book/{{$packages->id}}" class="btn btn-sm selected_package_btn">Book Now</a>
                                @endif
                            @else
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#Locationmodal" data-toggle="tooltip" data-placement="bottom" title="Locatione" class="btn btn-sm selected_package_btn">Book Now</a>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- end Selected Package --}}
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
                                    @foreach($packages_list as $package)
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


    <!-- Happy Customers -->
    <section class="shop-details-area pt-30 pb-50">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-12 p-15">
                            <p class="happy_customers_p">
                                Reliable and Trustworthy
                            </p>
                            <span>
                                All packages are fulfilled by Certified diagnostic laboratories. These labs have 1000's
                                of outlets across India, Middle East and Bangaladesh.
                            </span>
                        </div>
                        <div class="col-12 p-15">
                            <p class="happy_customers_p">
                                Reliable and Trustworthy
                            </p>
                            <span>
                                All packages are fulfilled by Certified diagnostic laboratories. These labs have 1000's
                                of outlets across India, Middle East and Bangaladesh.
                            </span>
                        </div>
                        <div class="col-12 p-15">
                            <p class="happy_customers_p">
                                Reliable and Trustworthy
                            </p>
                            <span>
                                All packages are fulfilled by Certified diagnostic laboratories. These labs have 1000's
                                of outlets across India, Middle East and Bangaladesh.
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 happy_customers_health_concern">
                    <div class="row related_articles">
                        <div class="col-12 text-center">
                            <h2 class="title">Thousands of Happy Customers</h2>
                        </div>
                        <div class="happy-customers-carousel owl-carousel">
                            <div class="happy_customers_health_concern">
                                <h6>Very professional phlebo. Excellent job in collecting the sample. No pain at all.
                                    Got my report also within 24 hours.</h6>
                                <p class="happy_customers_sub">Malathi Ganapathy</p>
                            </div>
                            <div class="happy_customers_health_concern">
                                <h6>Everything went very well and smoothly. Technician was right on time. Really happy
                                    with the service.</h6>
                                <p class="happy_customers_sub">Ashish Garnaik</p>
                            </div>
                            <div class="happy_customers_health_concern">
                                <h6>Good service, Practo is avoiding to stand in que for health checkup.</h6>
                                <p class="happy_customers_sub">Lalita Hegde</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Happy Customers -->
</main>



<!-- main-area-end -->
@include ('partials.footer')
