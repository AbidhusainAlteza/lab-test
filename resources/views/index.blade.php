@include('partials.header')
<!-- main-area -->
<main>
    <!-- slider-area -->
    <section class="slider--area " >
        <!-- slider-area -->
        <div class="container custom-container">
            <div class="row  ">
                <div class="col-12">
                    <div class="slider-active">
                        @foreach($sliders as $slider)
                        <a href="{{url($slider->url)}}" target="_blank  ">
                            <div class="single-slider slider-bg content-right "
                                data-background="upload/slider/{{$slider->image}}">
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- end slider-area -->
        <!-- category-area -->
        <div class="container custom-container pt-20">
            <div class="cupons_wrap">
                <!-- start coupons -->
            <div class="row cupons_row_p pt-30">
                <div class="col-12  display-f-j-c-s-b_a-i-c">
                    <h2 class="coupons_title m-0 pb-10">Coupons for lab tests</h2>
                    <div class="view_all">
                        <a href="{{url('offers')}}">View All</a>
                    </div>
                </div>
                <div class="coupons-carousel owl-carousel">
                    @foreach($offers as $offer)
                    <div class="coupons pt-10">
                        <div class="coupons_content_img"
                            data-background="{{url('')}}/upload/offers/{{$offer->image}}">
                            <a href="{{url('offers/'.$offer->slug)}}">
                                <div class="coupon_wrapper">
                                    <div class="coupon_header">
                                        <h5 class="text-capitalize">
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
            <!-- end coupons -->
            </div>
        </div>
        <!-- category-area-end -->
    </section>
    <!-- slider-area-end -->

    <!-- special-products-area -->
    <section class="special--products-area ">
        <div class="container custom-container">
            <!-- category-area -->
            <div class="slider-category-wrap ">
                <div class="col-12">
                    <h2 class="title">Find Tests by Health Concern</h2>
                </div>
                <div class="health-concern">
                    <div class="health-concern-carousel owl-carousel">
                        @foreach($tests as $title)
                            <div class="category-item">
                                <a href="{{url('')}}/health-concern/{{$title->slug}}" class="category-link"></a>
                                <div class="category-thumb">
                                    <img src="{{url('')}}/upload/health_concern/{{$title->image}}" alt="" class="health_concern_img">
                                </div>
                                <div class="category-content">
                                    <h6 class="title">{{$title->title}}</h6>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        <!-- category-area-end -->

            <!-- Top Booked -->
            <div class="top-booked-slider-category-wrap">
                <div class="row">
                    <div class=col-12>
                        <div class="pt-10 display-f-j-c-s-b_a-i-c">
                            <h2 class="title">Top Booked Diagnostic Tests</h2>
                            <div class="view_all">
                                <a href="{{url('lab-tests')}}">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="top-booked-carousel owl-carousel">
                        @foreach($labtests as $labtest)
                        <div class="top_booked">
                            <a href="{{url('').'/lab-tests/'.$labtest->slug}}">
                                <div class="top_booked_height">
                                    <div class="top_booked_title ellipses">
                                        {{$labtest->title}}
                                    </div>
                                    <div class="top_booked_subtitle">
                                        <p class="ellipses">
                                            @if ($labtest->short_description)
                                                known as {{$labtest->short_description }}
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            E-Reports on same day
                                        </p>
                                    </div>

                                </div>
                                @if ($labtest->discount == NULL)
                                    <div class="display_in_po_re top_booked_price">
                                        <p>₹{{$labtest->price}}</p>
                                    </div>
                                @else
                                    <div class="top_booked_price display_in_po_re">
                                        <p>
                                            ₹{{$labtest->offer_price}}
                                        </p>
                                    </div>
                                    <div class="display_in_po_re top_booked_dis_price">
                                        <s>₹{{$labtest->price}}</s>
                                    </div>
                                    <div class="display_in_po_re top_booked_dis_per">
                                        <strong>{{$labtest->discount}}%</strong>
                                    </div>
                                @endif
                            </a>
                            <div class="top_booked_add">
                                @if(session()->has('location_pincode'))
                                    @csrf
                                    <a href="javascript:void(0)" class="add-to-cart-tests" data-id="{{$labtest->id}}">
                                    @if(session('cart_item'))
                                        @if (in_array($labtest->id, Cart_id()))
                                            <p value='1' style='color:#696969;'>Remove</p>
                                            @else
                                            <p value='0'>Add</p>
                                        @endif
                                    @else
                                        <p value='0'>Add</p>
                                    @endif

                                    </a>
                                @else
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#Locationmodal" data-toggle="tooltip" data-placement="bottom" title="Locatione">
                                    @if(session('cart_item'))
                                        @if (in_array($labtest->id, Cart_id()))
                                            <p value='1' style='color:#696969;'>Remove</p>
                                            @else
                                            <p value='0'>Add</p>
                                        @endif
                                    @else
                                        <p value='0'>Add</p>
                                    @endif
                                </a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- end Top Booked -->
        </div>
    </section>
    <!-- Popular Health Checkup Packages -->
    <section class="special--products-area" >
        <div class="container custom-container">
            <div class="top-booked-slider-category-wrap">
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
                                                                            {{package_include_test($package->id)}} tests included
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
        </div>
    </section>
    <!-- end Popular Health Checkup Packages -->

    <!-- Top booked Medical tests -->
    @if(count($top_booked_medical_packages) > 0)
    <section class="special--products-area  pb-30">
        <div class="container custom-container">
            <div class="top-booked-slider-category-wrap">
                <div class="row">
                    <div class="col-12">
                        <div class=" pt-10">
                            <h2 class="title">Top booked Medical tests</h2>
                        </div>
                    </div>
                </div>
                <div class="row top-booked-medical_row">
                    <div class="top-booked-medical-carousel owl-carousel">
                        @foreach($top_booked_medical_packages as $top_booked_medical_package)
                        <div class="p-2">
                            <div class="top-booked-medical">
                                <div class="display_in_po_re top-booked-medical_img">
                                    <img src="img/upload/lipidprofile.webp" alt="">
                                    <h6 class="display_in_po_re booked_medical_title">{{$top_booked_medical_package->title}}</h6>
                                </div>

                                @php
                                    $package_tests = DB::table('Admin_package_tests')->where('package_id',$top_booked_medical_package->id)->get();
                                    if(count($package_tests) >0){
                                        foreach ($package_tests as $package_test) {
                                            $lab_tests = lab_test($package_test->lab_test_id);
                                            if($lab_tests !== NULL){
                                                echo "
                                                <div class='top_booked_medical_lable'>
                                                    <a href='".url('').'/lab-tests/'.$lab_tests->slug."' target='_blank'>
                                                        <p class='title'>$lab_tests->title</p>
                                                        <p class='sub_title'>$lab_tests->short_description</p>
                                                    </a>
                                                </div>" ;
                                            }
                                        }
                                    }
                                @endphp
                                {{-- <div class="top_booked_medical_lable">
                                    <a href="#">
                                        <p class="title">{{$top_booked_medical_package->title}}</p>
                                        <p class="sub_title">Also known as Cholesterol Ldl Enzymatic Colorimetric Method
                                            Blood</p>
                                    </a>
                                </div>
                                <div class="top_booked_medical_lable">
                                    <a href="#">
                                        <p class="title">{{$top_booked_medical_package->title}}</p>
                                        <p class="sub_title">Also known as Cholesterol Ldl Enzymatic Colorimetric Method
                                            Blood</p>
                                    </a>
                                </div>
                                <div class="top_booked_medical_lable">
                                    <a href="#">
                                        <p class="title">{{$top_booked_medical_package->title}}</p>
                                        <p class="sub_title">Also known as Cholesterol Ldl Enzymatic Colorimetric Method
                                            Blood</p>
                                    </a>
                                </div>
                                <div class="top_booked_medical_lable border-0">
                                    <a href="#">
                                        <p class="title">{{$top_booked_medical_package->title}}</p>
                                        <p class="sub_title">Also known as Cholesterol Ldl Enzymatic Colorimetric Method
                                            Blood</p>
                                    </a>
                                </div> --}}
                                <div class="text-center pb-2 pt-3">
                                    @if(session()->has('location_pincode'))
                                        <a href="{{url('')}}/health-checkup-packages/{{$top_booked_medical_package->slug}}" class="custome_btn">Book Now</a>
                                    @else
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#Locationmodal" data-toggle="tooltip" data-placement="bottom" title="Locatione" class="custome_btn">Book Now</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- end Top booked Medical tests -->

    <section class="special--products-area  pb-30" >
        <div class="container custom-container">
            <div class="top-booked-slider-category-wrap">
                <!-- How it works? -->
                <div class="row p-20">
                    <div class="col-lg-12 col-md-12 col-sm-12 pb-20">
                        <div class=" section-title-two text-center mb-30">
                            <h2 class="title">How it works?</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="display_flex">
                            <div class="display_in_po_re works_img">
                                <img src="img/upload/whay_book.webp" alt="" class="why_book_img">
                            </div>
                            <div class="display_in_po_re works_dec">
                                <p>Search for tests and packages and seamlessly book a home sample collection.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="display_flex">
                            <div class="display_in_po_re works_img">
                                <img src="img/upload/whay_book.webp" alt="" class="why_book_img">
                            </div>
                            <div class="display_in_po_re works_dec">
                                <p>Search for tests and packages and seamlessly book a home sample collection.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="display_flex">
                            <div class="display_in_po_re works_img">
                                <img src="img/upload/whay_book.webp" alt="" class="why_book_img">
                            </div>
                            <div class="display_in_po_re works_dec">
                                <p>Search for tests and packages and seamlessly book a home sample collection.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end How it works? -->
            </div>

        </div>
    </section>

    <section class="special--products-area  pb-30">
        <div class="container custom-container">
            <div class="top-booked-slider-category-wrap">
                <!-- Why book with us? -->
                <div class="row  p-20 ">
                    <div class="col-lg-12 col-md-10 pb-20 pt-20">
                        <div class=" section-title-two text-center mb-30">
                            <h2 class="title">Why book with us?</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="pb-3 why_book">
                                    <div class="display_in_po_re">
                                        <img src="img/upload/whay_book.webp" alt="" class="why_book_img">
                                    </div>
                                    <div class="display_in_po_re why_book_dec">
                                        <div class="why_book_title">
                                            <p>Home sample collection for FREE</p>
                                        </div>
                                        <div>
                                            A certified professional will collect your sample from your preferred location
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ">
                        <div class="col-12">
                            <div class="pb-3 why_book">
                                <div class="display_in_po_re">
                                    <img src="img/upload/offers_3.webp" alt="" class="why_book_img">
                                </div>
                                <div class="display_in_po_re why_book_dec">
                                    <div class="why_book_title">
                                        <p>Home sample collection for FREE</p>
                                    </div>
                                    <div>
                                        A certified professional will collect your sample from your preferred location
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="col-12">
                            <div class="pb-3 why_book">
                                <div class="display_in_po_re">
                                    <img src="img/upload/reports_2.webp" alt="" class="why_book_img">
                                </div>
                                <div class="display_in_po_re why_book_dec">
                                    <div class="why_book_title">
                                        <p>Home sample collection for FREE</p>
                                    </div>
                                    <div>
                                        A certified professional will collect your sample from your preferred location
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Why book with us? -->
            </div>
        </div>
    </section>

    <section class="special--products-area  pb-30" >
        <div class="container custom-container">
            <div class="top-booked-slider-category-wrap">
                <!-- We do great -->
                <div class="row p-20 ">
                    <div class="col-lg-12 col-md-10 pb-20 pt-20">
                        <div class=" section-title-two text-center mb-30">
                            <h2 class="title">We do great</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 why_book">
                        <div class="pt-15 pb-15">
                            <div class="we_do_great_img">
                                <img src="img/upload/wedogreat.webp" alt="">
                            </div>
                            <div class="we_do_great_title">
                                <h5>15 Million users every month</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="pt-15 pb-15">
                            <div class="we_do_great_img">
                                <img src="img/upload/wedogreat.webp" alt="">
                            </div>
                            <div class="we_do_great_title">
                                <h5>Trusted by 2,00,000 healthcare professionals</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="pt-15 pb-15">
                            <div class="we_do_great_img">
                                <img src="img/upload/wedogreat.webp" alt="">
                            </div>
                            <div class="we_do_great_title">
                                <h5>We serve in 9 cities</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end We do great -->
            </div>
        </div>
    </section>

    <section class="special--products-area  pb-30">
        <div class="container custom-container">
            <div class="top-booked-slider-category-wrap">
                <!-- Thousands of Happy Customers -->
                <div class="row pt-20 happy_customers">
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
                <!-- end Thousands of Happy Customers -->
            </div>
        </div>
    </section>

    <section class="special--products-area  pb-30" >
        <div class="container custom-container">
            <div class="top-booked-slider-category-wrap">
                <!-- Download the Practo app -->
                <div class="row p-20 ">
                    <div class="col-lg-6 pt-35">
                        <div class="download_app">
                            <img src="img/upload/phone.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 download-app">
                        <div class="footer-widget footer-box-widget mb-50">
                            <div class="f-download-wrap">
                                <div class="fw-title">
                                    <h5>Download the Lab tests app</h5>
                                </div>
                                <div>
                                    <p class="download_app_sub_title">Your home for health is one tap away.</p>
                                    <p>Book appointments, Order health products, Consult with a doctor online, Book health
                                        checkups, store health records & read health tips.</p>
                                </div>
                            </div>
                            <div class="f-newsletter">
                                <div class="fw-title">
                                    <h6>Send the link to download the app</h6>
                                </div>
                                <form action="#">
                                    <span class="download_app_span">+91</span>
                                    <input type="email" placeholder="Enter phone number">
                                    <button><i class="flaticon-send"></i></button>
                                </form>
                                <p>Do Not Show Your Mail</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Download the Practo app -->
            </div>
        </div>
    </section>
    <!-- special-products-area-end -->

    <section class="special--products-area pt-30 pb-30">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <p>
                        Book Diagnostic tests near you with Practo Associate Labs, your online lab test service provider
                        for diagnostic, medical tests and health checkup packages

                        Get all the benefits of diagnostic centre and pathology labs right from the comfort of your
                        home. With a phlebotomy team to ensure speedy home sample collection, and diagnostic services
                        ranging from individual tests to complete health checkup packages for Men, Women, Senior
                        Citizens & Corporates. Practo Associate Labs takes care of all your diagnostic needs.

                        Wide Selection of Tests: Practo Associate Labs covers a wide array of tests like blood sugar
                        tests, thyroid tests, pregnancy tests, allergy tests, lipid profile, liver profile, platelet
                        count, VDRL test, vitamin B12 deficiency test and more. Get details of all these tests such as
                        blood test cost, when to take the tests, why it is required, who should take the test and what
                        to do before taking the blood tests at home.

                        Sample Collection at Home: Book blood tests online from your home and our expert team of Practo
                        Associate Labs technicians will arrive at the pre-scheduled time to pick up your sample. Once
                        you get a diagnostic test done, you will receive your reports online.

                        Digital Reports: Get all your diagnostic reports emailed directly to you with detailed blood
                        test reports & secure storage to easily access your medical records online.

                        Full Body Health Checkup: Keep your health and well being in check with exclusive Health Checkup
                        Packages like Men’s Health Package, Women’s Health Package, Vitamin Package, Health Package for
                        Corporates, Diabetes Packages, Packages for Senior Citizens & more. Get full details of all
                        tests available in a package when booking online pathology tests.

                        Practo Associate Labs provides services to the following cities: Bangalore, Hyderabad, Chennai,
                        Mumbai, Delhi, Pune, Kolkata, Navi Mumbai, Thane, Gurgaon, Noida, Ahmedabad, Chandigarh,
                        Ghaziabad, Indore, Jaipur, Lucknow, Patna, Ernakulam, Bhubaneswar and Coimbatore.
                    </p>
                </div>
            </div>
        </div>
    </section>


</main>
<!-- main-area-end -->


@include ('partials.footer')
