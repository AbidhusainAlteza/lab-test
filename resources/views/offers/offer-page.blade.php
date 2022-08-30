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

    <!-- Popular Health Checkup Packages -->
    @if(!empty($offers))
    <section class="special--products-area pt-20 pb-50" >
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class=" pt-10">
                        <h2 class="title">{{$title}}</h2>
                    </div>

                </div>
            </div>
            <div class="col-12">
                <div class="coupons-carousel owl-carousel">
                    <div class="coupons pt-10">
                        <div class="coupons_content_img"
                            data-background="{{url('')}}/upload/offers/{{$offers->image}}">
                            <div class="coupon_wrapper">
                                <div class="coupon_header">
                                    <h5 class="m-0 p-0 text-capitalize">
                                        {{$offers->title}}
                                        <span>
                                            {{$offers->discount_amount}}%
                                        </span>
                                        off
                                    </h5>
                                </div>
                                <div class="coupon_sub-header">
                                    <p class="m-0">{{$offers->description}}</p>
                                </div>
                                <span class="font-w-600 color-p">Offer valid</span>
                                <div class="coming-time" data-countdown="{{$offers->exp_date}}"></div>
                                <div class="coupon_image coupon__image-cta">
                                    <p>Use: {{$offers->coupon_code}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="special--products-area pt-20 pb-50" >
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class=" pt-10">
                        <h6>Offers not Found</h6>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- end Popular Health Checkup Packages -->
</main>
@include('partials.footer')
