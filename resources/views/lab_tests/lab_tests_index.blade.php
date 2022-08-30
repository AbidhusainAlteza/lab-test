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
            <div class="row">
                <div class=col-12>
                    <div class=" pt-10">
                        <h2 class="title">{{$title}}({{count($labtests)}})</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(count($labtests) !== 0)
                    @foreach($labtests as $labtest)
                    <div class="div col-md-3 col-sm-6 lab_test">
                        <div class="top_booked">
                            <a href="{{url('').'/lab-tests/'.$labtest->slug}}">
                                <div class="top_booked_height">
                                    <div class="top_booked_title">
                                        {{$labtest->title}}
                                    </div>
                                    <div class="top_booked_subtitle">
                                        <p>
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
                                            <p value='1' style='color:#696969;'>remove</p>
                                            @else
                                            <p value='0'>Add</p>
                                        @endif
                                    @else
                                        <p value='0'>Add</p>
                                    @endif
                                @else
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#Locationmodal" data-toggle="tooltip" data-placement="bottom" title="Locatione">
                                    @if(session('cart_item'))
                                        @if (in_array($labtest->id, Cart_id()))
                                            <p value='1' style='color:#696969;'>remove</p>
                                            @else
                                            <p value='0'>Add</p>
                                        @endif
                                    @else
                                        <p value='0'>Add</p>
                                    @endif
                                @endif
                                </a>
                            </div>
                        </div>

                    </div>
                    @endforeach
                    <div class="col-12">
                        <div class="float-right pt-2 lab_test_paginatione">
                            {{$labtests->links()}}
                        </div>
                    </div>
                @else
                    <h2>Lab Test Not Found</h2>
                @endif
            </div>
            </div>
        </div>
    </section>
    <!-- end Popular Health Checkup Packages -->
</main>
@include('partials.footer')
