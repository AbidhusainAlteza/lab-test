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
                <div class="col-lg-6">
                    <div class="shop-details-flex-wrap">
                        <div class="shop-details-nav-wrap">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="item-one-tab" data-toggle="tab" href="#item-one"
                                        role="tab" aria-controls="item-one" aria-selected="true"><img
                                            src="img/upload/test_page_img1.jpg" alt=""></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="item-two-tab" data-toggle="tab" href="#item-two" role="tab"
                                        aria-controls="item-two" aria-selected="false"><img
                                            src="img/product/sd_nav_img02.jpg" alt=""></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="item-three-tab" data-toggle="tab" href="#item-three"
                                        role="tab" aria-controls="item-three" aria-selected="false"><img
                                            src="img/product/sd_nav_img03.jpg" alt=""></a>
                                </li>
                            </ul>
                        </div>
                        <div class="shop-details-img-wrap">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="item-one" role="tabpanel"
                                    aria-labelledby="item-one-tab">
                                    <div class="shop-details-img">
                                        <img src="img/upload/test_page_img1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="item-two" role="tabpanel" aria-labelledby="item-two-tab">
                                    <div class="shop-details-img">
                                        <img src="img/product/shop_details_img02.jpg" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="item-three" role="tabpanel"
                                    aria-labelledby="item-three-tab">
                                    <div class="shop-details-img">
                                        <img src="img/product/shop_details_img03.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 tests">
                    <div class="shop-details-content">
                        <h4 class="title">{{$testsdetails->title}}</h4>
                        <div class="shop-details-meta mb-2">
                            <div class="mt-2">
                                <p class="display_in_po_re">Also known as </p>
                                <span class="ml-2"><b>Lipid Profile Blood</b></span>
                            </div>
                            <div>
                                <span class="display_in_po_re"><img src="img/upload/symbol.svg" alt=""></span>
                                <span><b>Certified Labs</b></span>
                            </div>
                            <div class="mt-2">
                                <span class=><i class="fa-solid fa-check-double tests_icon"></i></span>
                                <span class="display_in_po_re tests_span">Free Home Sample Pickup</span>
                            </div>
                        </div>

                        <p>{{$testsdetails->description}}</p>
                        <div class="pb-3">
                            <div class="shop-details-price display_in_po_re">
                                <h3 class="discount_price">₹{{$testsdetails->price}}</₹>
                                </h3>
                                <h2 class="price">₹{{$testsdetails->offer_price}}</h2>
                                <h3 class="discount">{{$testsdetails->discount}}%</h3>
                            </div>
                            <div class="shop-perched-info display_in_po_re ml-2">
                                <!-- <div class="sd-cart-wrap">
                                    <form action="#">
                                        <div class="cart-plus-minus">
                                            <input type="text" value="1">
                                        </div>
                                    </form>
                                </div> -->
                                <a href="#" class="added_cart_btn">Added in Cart</a>
                                <a href="#" class="btn border-2">Book Now</a>
                            </div>

                        </div>
                        <div class="row border_top_5 why_book_test ">
                            <div class="col-12 mb-25">
                                <img src="img/upload/reports_2.webp" alt="" class="test_img_icone">
                                <div class="test_img_dec">
                                    <p class="test_p_title">Get digital report within a day</p>
                                    <span>Our labs ensure turn-around-time of 24 hours from specimen pickup.</span>
                                </div>
                            </div>
                            <div class="col-12 mb-25">
                                <img src="img/upload/offers_3.webp" alt="" class="test_img_icone">
                                <div class="test_img_dec">
                                    <p class="test_p_title">Offers and affordable prices</p>
                                    <span>Get great discounts and offers on tests and packages.</span>
                                </div>
                            </div>
                            <div class="col-12 mb-25">
                                <img src="img/upload/whay_book.webp" alt="" class="test_img_icone">
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
                                <p>
                                    Lipid profile test is a set of tests used to measure the amount of cholesterol and
                                    other types of fats present in your blood.
                                    This test is helpful in assessing the risk of cardiovascular diseases (CVD).
                                </p>
                                <span><b>Test parameters:</b></span>
                                <ul class="ml-4 mt-1 mb-10">
                                    <li>
                                        HDL (High-density lipoproteins)
                                    </li>
                                    <li>
                                        HDL (High-density lipoproteins)
                                    </li>
                                    <li>
                                        HDL (High-density lipoproteins)
                                    </li>
                                    <li>
                                        HDL (High-density lipoproteins)
                                    </li>
                                </ul>
                                <span>
                                    <b>What is the importance of lipids?</b>
                                </span>
                                <p>
                                    Lipids are a bunch of fats and fat-like substances which are very useful
                                    constituents of the cells in our body. They are also an important source of energy.
                                    Cholesterol and triglycerides are the two important lipids. Cholesterol and
                                    triglycerides are transported are circulated into the blood through lipoprotein
                                    particles. Each lipoprotein particle is a combination of cholesterol, phospholipids,
                                    triglycerides and protein molecules.
                                </p>
                            </div>
                        </div>
                        <div class="test_tab2" id="test_tab">
                            <a href="javascript:void(0)" class="test_a_calick">What is this test? <i
                                    class="fa-solid fa-angle-down test_tab_i" id="test_tab_icone_2"></i></a>
                            <div class="test_disebal" id="test_tabs2">
                                <p>
                                    Lipid profile test is a set of tests used to measure the amount of cholesterol and
                                    other types of fats present in your blood.
                                    This test is helpful in assessing the risk of cardiovascular diseases (CVD).
                                </p>
                                <span><b>Test parameters:</b></span>
                                <ul class="ml-4 mt-1 mb-10">
                                    <li>
                                        HDL (High-density lipoproteins)
                                    </li>
                                    <li>
                                        HDL (High-density lipoproteins)
                                    </li>
                                    <li>
                                        HDL (High-density lipoproteins)
                                    </li>
                                    <li>
                                        HDL (High-density lipoproteins)
                                    </li>
                                </ul>
                                <span>
                                    <b>What is the importance of lipids?</b>
                                </span>
                                <p>
                                    Lipids are a bunch of fats and fat-like substances which are very useful
                                    constituents of the cells in our body. They are also an important source of energy.
                                    Cholesterol and triglycerides are the two important lipids. Cholesterol and
                                    triglycerides are transported are circulated into the blood through lipoprotein
                                    particles. Each lipoprotein particle is a combination of cholesterol, phospholipids,
                                    triglycerides and protein molecules.
                                </p>
                            </div>
                        </div>
                        <div class="test_tab3" id="test_tab">
                            <a href="javascript:void(0)" class="test_a_calick">What is this test? <i
                                    class="fa-solid fa-angle-down test_tab_i" id="test_tab_icone_3"></i></a>
                            <div class="test_disebal" id="test_tabs3">
                                <p>
                                    Lipid profile test is a set of tests used to measure the amount of cholesterol and
                                    other types of fats present in your blood.
                                    This test is helpful in assessing the risk of cardiovascular diseases (CVD).
                                </p>
                                <span><b>Test parameters:</b></span>
                                <ul class="ml-4 mt-1 mb-10">
                                    <li>
                                        HDL (High-density lipoproteins)
                                    </li>
                                    <li>
                                        HDL (High-density lipoproteins)
                                    </li>
                                    <li>
                                        HDL (High-density lipoproteins)
                                    </li>
                                    <li>
                                        HDL (High-density lipoproteins)
                                    </li>
                                </ul>
                                <span>
                                    <b>What is the importance of lipids?</b>
                                </span>
                                <p>
                                    Lipids are a bunch of fats and fat-like substances which are very useful
                                    constituents of the cells in our body. They are also an important source of energy.
                                    Cholesterol and triglycerides are the two important lipids. Cholesterol and
                                    triglycerides are transported are circulated into the blood through lipoprotein
                                    particles. Each lipoprotein particle is a combination of cholesterol, phospholipids,
                                    triglycerides and protein molecules.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-details-area-end -->

    <!-- Popular Health Checkup Packages -->
    <section class="shop-details-area pt-30 pb-50" data-background="{{url('')}}/img/bg/slider_area_bg.jpg">
        <div class="container custom-container">
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
                            <li class="nav-item">
                                <a class="nav-link active" id="Featured_Checkups-tab" data-toggle="tab"
                                    href="#Featured_Checkups" role="tab" aria-controls="Featured_Checkups"
                                    aria-selected="true">Featured Checkups</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Womens_Health-tab" data-toggle="tab" href="#Womens_Health"
                                    role="tab" aria-controls="Womens_Health" aria-selected="false">Women's Health</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Mens_Health-tab" data-toggle="tab" href="#Mens_Health"
                                    role="tab" aria-controls="Mens_Health" aria-selected="false">Men's Health</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContentTwo">
                            <div class="tab-pane fade show active" id="Featured_Checkups" role="tabpanel"
                                aria-labelledby="Featured_Checkups-tab">
                                <div class=row>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="packages">
                                            <a href="#">
                                                <div class="packages_img">
                                                    <img src="img/upload/packages.jpg" alt="">
                                                </div>
                                                <div class="mr-1 ml-2">
                                                    <div class="packages_des">
                                                        <div class="mb-2">
                                                            <h6 class="mb-0">Basic Women's Health Checkup</h6>
                                                            <p>
                                                                Ideal for individuals aged
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
                                                                <strong>₹ 1099</strong>
                                                            </div>
                                                            <div class="display_in_po_re ml-1 decprice">
                                                                <s>₹ 1099</s>
                                                            </div>
                                                            <div class="display_in_po_re dec">
                                                                <strong>22% off</strong>
                                                            </div>
                                                            <div class="display_in_po_re ml-3 packages_footer_btn">
                                                                <a href="" class="custome_btn_sm ">Book Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="packages">
                                            <a href="#">
                                                <div class="packages_img">
                                                    <img src="img/upload/packages.jpg" alt="">
                                                </div>
                                                <div class="mr-1 ml-2">
                                                    <div class="packages_des">
                                                        <div class="mb-2">
                                                            <h6 class="mb-0">Basic Women's Health Checkup</h6>
                                                            <p>
                                                                Ideal for individuals aged
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
                                                                <strong>₹ 1099</strong>
                                                            </div>
                                                            <div class="display_in_po_re ml-1 decprice">
                                                                <s>₹ 1099</s>
                                                            </div>
                                                            <div class="display_in_po_re dec">
                                                                <strong>22% off</strong>
                                                            </div>
                                                            <div class="display_in_po_re ml-3 packages_footer_btn">
                                                                <a href="" class="custome_btn_sm ">Book Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="packages">
                                            <a href="#">
                                                <div class="packages_img">
                                                    <img src="img/upload/packages.jpg" alt="">
                                                </div>
                                                <div class="mr-1 ml-2">
                                                    <div class="packages_des">
                                                        <div class="mb-2">
                                                            <h6 class="mb-0">Basic Women's Health Checkup</h6>
                                                            <p>
                                                                Ideal for individuals aged
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
                                                                <strong>₹ 1099</strong>
                                                            </div>
                                                            <div class="display_in_po_re ml-1 decprice">
                                                                <s>₹ 1099</s>
                                                            </div>
                                                            <div class="display_in_po_re dec">
                                                                <strong>22% off</strong>
                                                            </div>
                                                            <div class="display_in_po_re ml-3 packages_footer_btn">
                                                                <a href="" class="custome_btn_sm ">Book Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="packages">
                                            <a href="#">
                                                <div class="packages_img">
                                                    <img src="img/upload/packages.jpg" alt="">
                                                </div>
                                                <div class="mr-1 ml-2">
                                                    <div class="packages_des">
                                                        <div class="mb-2">
                                                            <h6 class="mb-0">Basic Women's Health Checkup</h6>
                                                            <p>
                                                                Ideal for individuals aged
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
                                                                <strong>₹ 1099</strong>
                                                            </div>
                                                            <div class="display_in_po_re ml-1 decprice">
                                                                <s>₹ 1099</s>
                                                            </div>
                                                            <div class="display_in_po_re dec">
                                                                <strong>22% off</strong>
                                                            </div>
                                                            <div class="display_in_po_re ml-3 packages_footer_btn">
                                                                <a href="" class="custome_btn_sm ">Book Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Womens_Health" role="tabpanel"
                                aria-labelledby="Womens_Health-tab">
                                <div class=row>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="packages">
                                            <a href="#">
                                                <div class="packages_img">
                                                    <img src="img/upload/packages.jpg" alt="">
                                                </div>
                                                <div class="mr-1 ml-2">
                                                    <div class="packages_des">
                                                        <div class="mb-2">
                                                            <h6 class="mb-0">Basic Women's Health Checkup</h6>
                                                            <p>
                                                                Ideal for individuals aged
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
                                                                <strong>₹ 1099</strong>
                                                            </div>
                                                            <div class="display_in_po_re ml-1 decprice">
                                                                <s>₹ 1099</s>
                                                            </div>
                                                            <div class="display_in_po_re dec">
                                                                <strong>22% off</strong>
                                                            </div>
                                                            <div class="display_in_po_re ml-3 packages_footer_btn">
                                                                <a href="" class="custome_btn_sm ">Book Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Mens_Health" role="tabpanel"
                                aria-labelledby="Mens_Health-tab">
                                <div class=row>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="packages">
                                            <a href="#">
                                                <div class="packages_img">
                                                    <img src="img/upload/packages.jpg" alt="">
                                                </div>
                                                <div class="mr-1 ml-2">
                                                    <div class="packages_des">
                                                        <div class="mb-2">
                                                            <h6 class="mb-0">Basic Women's Health Checkup</h6>
                                                            <p>
                                                                Ideal for individuals aged
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
                                                                <strong>₹ 1099</strong>
                                                            </div>
                                                            <div class="display_in_po_re ml-1 decprice">
                                                                <s>₹ 1099</s>
                                                            </div>
                                                            <div class="display_in_po_re dec">
                                                                <strong>22% off</strong>
                                                            </div>
                                                            <div class="display_in_po_re ml-3 packages_footer_btn">
                                                                <a href="" class="custome_btn_sm ">Book Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
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
    <!-- end Popular Health Checkup Packages -->


    <!-- Thousands of Happy Customers -->
    <section class="best-sellers-area pt-30 pb-50">
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