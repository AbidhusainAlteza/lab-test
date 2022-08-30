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
                                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shop-details-area pt-30 pb-50">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-12 health_concern_img_div">
                    <div class="text-center">
                        <img src="{{url('')}}/upload/health_concern/{{$health_concerns_id->image}}" alt="" class="health_concern_img">
                    </div>
                </div>

                <div class="col-md-7 col-lg- col-sm-12">
                    <div class="health-concern">
                        <h2>Get  the {{$title}} before it beats you</h2>
                    </div>
                    <div class="pt-2">
                        <h4 class="health_concern_sub_title">Upto 45% OFF</h4>
                        <span>+ Get 0% healthcash back</span>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-6 pl-0 pt-4  health_concern_icon">
                            <img src="{{url('')}}/img/upload/fever_icon.webp" alt="" height="60">
                            <div class="pl-2">
                                <span>Free home sample pickup</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6  pl-0 pt-4  health_concern_icon">
                            <img src="{{url('')}}/img/upload/fever_icon.webp" alt="" height="60">
                            <div class="pl-2">
                                <span>Practo associate labs</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6  pl-0 pt-4  health_concern_icon">
                            <img src="{{url('')}}/img/upload/fever_icon.webp" alt="" height="60">
                            <div class="pl-2">
                                <span>FE-Reports in 24-72 hours</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6  pl-0 pt-4  health_concern_icon">
                            <img src="{{url('')}}/img/upload/fever_icon.webp" alt="" height="60">
                            <div class="pl-2">
                                <span>Free follow-up with a doctor</span>
                            </div>
                        </div>


                    </div>
                    <div class="pt-5">
                        <a href="#view_packages" class="btn btn-sm ">View Packages</a>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="health_concern_need_help">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 health_concern_need_help_flex">
                                        <div>
                                            <img src="{{url('')}}/img/upload/call_to_order.svg" alt=""
                                                class="health_concern_need_help_img">
                                        </div>
                                        <div class="health_concern_need_help_text">
                                            <h6>
                                                Need help with booking your test?
                                            </h6>
                                            <span>Our experts are here to help you</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12  health_concern_need_help_Phone">
                                        <div>
                                            <i class="fa-solid fa-phone health_concern_need_help_Phone_number"></i>
                                            <a href="tel:9958634285"
                                                class="health_concern_need_help_Phone_number">+9958634285</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Related Tests -->
    @if(!empty($tests))
    <section class="shop-details-area pt-30 pb-50" data-background="{{url('')}}/img/bg/slider_area_bg.jpg">
        <div class="container custom-container">
            <div class="row">
                <div class=col-12>
                    <div class=" pt-10">
                        <h2 class="title">{{$title}} Related Tests</h2>
                    </div>
                </div>
                <div class="top-booked-carousel owl-carousel">
                    @foreach($tests as $test)
                    <div class="top_booked">
                        <a href="{{url('').'/lab-tests/'.$test->slug}}">
                            <div class="top_booked_height">
                                <div class="top_booked_title">
                                    {{$test->title}}
                                </div>
                                <div class="top_booked_subtitle">
                                    <p>
                                        @if ($test->short_description)
                                            known as {{$test->short_description }}
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        E-Reports on same day
                                    </p>
                                </div>

                            </div>
                            @if (!$test->discount)
                                <div class="top_booked_price display_in_po_re">
                                    <p>
                                        ₹{{$test->price}}
                                    </p>
                                </div>
                            @else
                                <div class="top_booked_price display_in_po_re">
                                    <p>
                                        ₹{{$test->offer_price}}
                                    </p>
                                </div>
                                <div class="display_in_po_re top_booked_dis_price">
                                    <s>₹{{$test->price}}</s>
                                </div>
                                <div class="display_in_po_re top_booked_dis_per">
                                    <strong>{{$test->discount}}%</strong>
                                </div>
                            @endif
                        </a>
                        <div class="top_booked_add">
                            @if(session()->has('location_pincode'))
                                @csrf
                                <a href="javascript:void(0)" class="add-to-cart-tests" data-id="{{$test->id}}">
                                    @if(session('cart_item'))
                                        @if (in_array($test->id, Cart_id()))
                                            <p value='1' style='color:#696969;'>remove</p>
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
                                        @if (in_array($test->id, Cart_id()))
                                            <p value='1' style='color:#696969;'>remove</p>
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
    </section>
    @endif
    <!-- End Related Tests -->

    <!-- Fullfilled By Practo Labs -->
    <section class="shop-details-area pt-50 pb-50">
        <div class="container custom-container">
            <div class="row border-top-bottom">
                <div class="col-12">
                    <h2 class="title">Fullfilled By Practo Labs</h2>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 company_lab">
                    <img src="{{url('')}}/img/upload/co_lab_1.svg" alt="" height="60">
                    <div class="company_lab_dec">
                        <h4 class="">120+</h4>
                        <span>Best Technicians</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 company_lab">
                    <img src="{{url('')}}/img/upload/co_lab_1.svg" alt="" height="60">
                    <div class="company_lab_dec">
                        <h4 class="">95%</h4>
                        <span>On-time Reports</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 company_lab">
                    <img src="{{url('')}}/img/upload/co_lab_1.svg" alt="" height="60">
                    <div class="company_lab_dec">
                        <h4 class="">4.9/5</h4>
                        <span>Customer Ratings</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Fullfilled By Practo Labs -->

    <!-- Popular Health Checkup Packages -->
    <section class="special--products-area pt-50 pb-50" data-background="{{url('')}}/img/bg/slider_area_bg.jpg">
        <div class="container custom-container" id="view_packages">
            <div class="row">
                <div class="col-12">
                    <div class=" pt-10">
                        <h2 class="title">Popular Health Checkup Packages</h2>
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
    </section>
    <!-- end Popular Health Checkup Packages -->


    <!-- Related Articles -->
    <section class="shop-details-area pt-50 pb-50">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 ">
                    <div class="row related_articles">
                        <div class="col-12">
                            <h2 class="title">Related Articles</h2>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="related_articles_blog p-10">
                                <a href="#">
                                    <div class="related_articles_img mb-2">
                                        <img src="{{url('')}}/img/upload/related_articles.jpg" alt="">
                                    </div>
                                    <div class="">
                                        <div class="">
                                            <div class="mb-2">
                                                <h6 class="ellipses">Your First Year With Diabetes</h6>
                                                <p class="related_articles_p">
                                                    R.Ravindranath
                                                </p>
                                            </div>
                                            <div>
                                                <p class="ellipses">
                                                    Your first time with diabetes: Making you win the fight against
                                                    diabetes!A 12-month plan for surviving diabetesThe most frightening
                                                    moment for most people with diabetes is when they are first diagnose
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="related_articles_blog p-10">
                                <a href="#">
                                    <div class="related_articles_img mb-2">
                                        <img src="{{url('')}}/img/upload/related_articles_2.jpg" alt="">
                                    </div>
                                    <div class="">
                                        <div class="">
                                            <div class="mb-2">
                                                <h6 class="ellipses">Common Myths About Diabetes</h6>
                                                <p class="related_articles_p">
                                                    Dr.Sudhindra Kulkarni
                                                </p>
                                            </div>
                                            <div>
                                                <p class="ellipses">
                                                    The World Health day is celebrated on 7th of April every year. The
                                                    theme this year is Beat Diabetes. The number of people being
                                                    diagnosed with diabetes is on the rise and so are the myths
                                                    surrounding
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="related_articles_blog p-10">
                                <a href="#">
                                    <div class="related_articles_img mb-2">
                                        <img src="{{url('')}}/img/upload/related_articles_3.jpg" alt="">
                                    </div>
                                    <div class="">
                                        <div class="">
                                            <div class="mb-2">
                                                <h6 class="ellipses">Diabetes</h6>
                                                <p class="related_articles_p">
                                                    Dr.Sachin Verma
                                                </p>
                                            </div>
                                            <div>
                                                <p class="ellipses">
                                                    Diabetes refers to the condition when there is an excess of glucose
                                                    in your body. Though glucose is beneficial for the proper
                                                    functioning of the body, an excess can lead to serious consequences.
                                                    Over Your first time with diabetes: Making you win the fight against
                                                    diabetes!A 12-month plan for surviving diabetesThe most frightening
                                                    moment for most people with diabetes is when they are first diagnose
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="related_articles_blog p-10">
                                <a href="#">
                                    <div class="related_articles_img mb-2">
                                        <img src="{{url('')}}/img/upload/related_articles.jpg" alt="">
                                    </div>
                                    <div class="">
                                        <div class="">
                                            <div class="mb-2">
                                                <h6 class="ellipses">Your First Year With Diabetes</h6>
                                                <p class="related_articles_p">
                                                    R.Ravindranath
                                                </p>
                                            </div>
                                            <div>
                                                <p class="ellipses">
                                                    Your first time with diabetes: Making you win the fight against
                                                    diabetes!A 12-month plan for surviving diabetesThe most frightening
                                                    moment for most people with diabetes is when they are first diagnose
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 pl-30 related_questions_r">
                    <div class="row related_articles">
                        <div class="col-12">
                            <h2 class="title">Related Questions</h2>
                        </div>
                        <div class="col-12 ">
                            <div class="related_questions_b">
                                <a href="#">
                                    <div class="display_flex_ju_s_b">
                                        <h6>Doctor for diabetes</h6>
                                        <div class="related_questions_views">
                                            <span class="count">150</span>
                                            <span class='text-span'>views</span>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="ellipses">
                                            I like to know near by Kundrathur doctor for diabetes. I have diabetes but I
                                            could not find correct doctor for diabetes
                                        </p>
                                    </div>
                                    <span class="link-style">Read more</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="related_questions_b">
                                <a href="#">
                                    <div class="display_flex_ju_s_b">
                                        <h6>Doctor for diabetes</h6>
                                        <div class="related_questions_views">
                                            <span class="count">150</span>
                                            <span class='text-span'>views</span>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="ellipses">
                                            I like to know near by Kundrathur doctor for diabetes. I have diabetes but I
                                            could not find correct doctor for diabetes
                                        </p>
                                    </div>
                                    <span class="link-style">Read more</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="related_questions_b">
                                <a href="#">
                                    <div class="display_flex_ju_s_b">
                                        <h6>Doctor for diabetes</h6>
                                        <div class="related_questions_views">
                                            <span class="count">150</span>
                                            <span class='text-span'>views</span>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="ellipses">
                                            I like to know near by Kundrathur doctor for diabetes. I have diabetes but I
                                            could not find correct doctor for diabetes
                                        </p>
                                    </div>
                                    <span class="link-style">Read more</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="related_questions_b">
                                <a href="#">
                                    <div class="display_flex_ju_s_b">
                                        <h6>Doctor for diabetes</h6>
                                        <div class="related_questions_views">
                                            <span class="count">150</span>
                                            <span class='text-span'>views</span>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="ellipses">
                                            I like to know near by Kundrathur doctor for diabetes. I have diabetes but I
                                            could not find correct doctor for diabetes
                                        </p>
                                    </div>
                                    <span class="link-style">Read more</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="related_questions_b">
                                <a href="#">
                                    <div class="display_flex_ju_s_b">
                                        <h6>Doctor for diabetes</h6>
                                        <div class="related_questions_views">
                                            <span class="count">150</span>
                                            <span class='text-span'>views</span>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="ellipses">
                                            I like to know near by Kundrathur doctor for diabetes. I have diabetes but I
                                            could not find correct doctor for diabetes
                                        </p>
                                    </div>
                                    <span class="link-style">Read more</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Related Articles -->

    <!-- Happy Customers -->
    <section class="shop-details-area pt-30 pb-50" data-background="{{url('')}}/img/bg/slider_area_bg.jpg">
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
    <section class="special--products-area pt-30  pb-30">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <p>This site is protected by reCAPTCHA and the Google <a href="#">Privacy Policy</a> and <a href="#"> Terms of Service </a>apply.</p>
                </div>
            </div>
        </div>
    </section>
</main>
@include('partials.footer')
