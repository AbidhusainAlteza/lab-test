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
    <section class="special--products-area pt-20 pb-50" >
        <div class="container custom-container">
            @if(count($packages_type) !== 0  && count($packages) !== 0)
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
                                                                    <p>{{package_include_test($package->id)}} tests included</p>
                                                                </div>
                                                            </div>
                                                            <div class="packages_footer display_in_po_re ">
                                                                <div>
                                                                    @if ($package->discount == NULL)
                                                                        <div class="display_in_po_re price">
                                                                            <strong>₹ {{$package->total_amount}}</strong>
                                                                        </div>
                                                                    @else
                                                                        <div class="display_in_po_re price">
                                                                            <strong>₹ {{$package->offer_amount}}</strong>
                                                                        </div>
                                                                        <div class="display_in_po_re ml-1 decprice">
                                                                            <s>₹ {{$package->total_amount}}</s>
                                                                        </div>
                                                                        <div class="display_in_po_re dec">
                                                                            <strong>{{$package->discount}}% off</strong>
                                                                            {{-- {{var_dump($package->discount)}} --}}
                                                                        </div>
                                                                    @endif

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
            @else
            <h2>Package Not Found</h2>
            @endif
        </div>
    </section>
    <!-- end Popular Health Checkup Packages -->
</main>
@include('partials.footer')
