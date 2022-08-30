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
    <section class="special--products-area pt-10 pb-50" >
        <div class="container custom-container">
            @if(count($offers_type) !== 0  && count($offers) !== 0)
            <div class="row">
                <div class="col-12">
                    <div class=" pt-10">
                        <h2 class="title">{{$title}}</h2>
                    </div>

                </div>
            </div>
            <div class="row popular_health_row">
                <div class="col-12">
                    <div class="product-desc-wrap">
                        <ul class="nav nav-tabs" id="myTabTwo" role="tablist">
                            <?php $i = 0; ?>
                            @foreach($offers_type as $offer_type)
                            <li class="nav-item">
                                <a class="nav-link {{$i==0?'active':''}}" id="{{$offer_type->slug}}-tab" data-toggle="tab"
                                    href="#{{$offer_type->slug}}" role="tab" aria-controls="{{$offer_type->slug}}"
                                    aria-selected="true">{{ucwords($offer_type->title)}}</a>
                            </li>
                            <?php $i++ ?>
                            @endforeach
                        </ul>
                        <div class="tab-content" id="myTabContentTwo">
                            <?php $i = 0; ?>
                            @foreach($offers_type as $offer_type)
                                <div class="tab-pane fade  {{$i==0?'show active':''}}" id="{{$offer_type->slug}}" role="tabpanel"
                                aria-labelledby="{{$offer_type->slug}}-tab">
                                    <div class=row>
                                    @foreach($offers as $offer)
                                        @if ($offer_type->id == $offer->offers_type_id)
                                        <div class="col-md-3 col-lg-3 col-sm-12">
                                            <div class="coupons pt-10">
                                                <div class="coupons_content_img"
                                                    data-background="{{url('')}}/upload/offers/{{$offer->image}}">
                                                    <a href="{{url('offers/'.$offer->slug)}}">
                                                        <div class="coupon_wrapper">
                                                            <div class="coupon_header">
                                                                <h5 class="m-0 p-0 text-capitalize">
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
            @else
            <h2>Offer Not Found</h2>
            @endif
        </div>
    </section>
    <!-- end Popular Health Checkup Packages -->
</main>
@include('partials.footer')

