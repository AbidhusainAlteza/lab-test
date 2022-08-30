 @extends('admin/layouts.master')
 @section('content')

    <!-- Main Content -->
    <main class="body-content">

        @include('admin/layouts/menu')

        <div class="ms-content-wrapper">
            <div class="row">

                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                            <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i class="material-icons">home</i> Home</a> </li>
                            <li class="breadcrumb-item"><a href="{{url('admin/offers')}}">Offers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Offers</li>
                        </ol>
                    </nav>

                </div>

                @include('flash_message')


                <div class="col-xl-12 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Add Offers Form</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form method='post' action="{{ route('offers.store') }}" enctype="multipart/form-data" class="needs-validation validation-fill" novalidate>
                                @csrf

                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <label>Title</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_type" name="title" placeholder="Enter Title" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Slug</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_slug" name="slug" placeholder="Enter Slug" required>
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Offers Image <span style="color: red; margin-left: 20px;">Min Size 300 x 150 *</span></label>
                                        <input type="file" name="image" class="form-control p-3" accept="image/png,image/svg,image/jpeg,image/webp" onchange="preview()" required>
                                    </div>

                                    <div class="col-md-6 mt-3 px-5">
                                        <img id="frame" style="width: 300px; height: 150px;"/>
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <label>Description</label>
                                        <div class="input-group">
                                            <textarea type="text" rows="5" class="form-control" name="description" placeholder="Enter Description" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Coupon Code</label>
                                        <div class="input-group">
                                        <input type="text" class="form-control" name="coupon_code" placeholder="Enter Coupon Code" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Discount Type</label>
                                        <div class="input-group">
                                            <select class="form-control" name="offers_type_id" required>
                                                    <option value="">Select Discount Type</option>
                                                    @foreach($offers_type as $m)
                                                        <option value="{{$m->id}}"> {{ucwords($m->title)}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Discount</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control Number" name="discount_amount" placeholder="Enter Discount" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Min Order Amount</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control Number" name="min_order_amount" placeholder="Enter Min Order Amount" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Max Order Amount</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control Number" name="max_order_amount" placeholder="Enter Max Order Amount" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Valid For</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="valid_for" placeholder="Enter Valid For" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Exp Date</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="exp_date" placeholder="Enter Exp Date" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Status *</label>
                                        <div class="input-group">
                                            <select name="is_active" class="form-control" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button class="btn btn-primary d-block" type="submit">Save</button>
                                    </div>

                                </div>

                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>

@endsection

{{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

<script>

    $(document).ready(function(){
        $('.discount').on("keyup", function() {
            discount();
        });

        $('.offer_amount').on("keyup", function() {
            offer_amount();
        });

    });

    function discount(){

        // alert('discount');
        var main = $('.price').val();

        var disc = $('.discount').val();
        var dec = (disc / 100).toFixed(2);
        var mult = main * dec;
        var oamount = main - mult;
        $('.offer_amount').val(oamount);
    }

    function offer_amount(){
        var main = $('.price').val();

        var oa = $('.offer_amount').val();
        var mult = main - oa;
        var discountper = (mult / 100).toFixed();

        $('.discount').val(discountper);
    }


</script> --}}
