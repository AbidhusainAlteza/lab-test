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
                            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/offers')}}">Offers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Offers</li>
                        </ol>
                    </nav>

                    <!-- <div class="alert alert-success" role="alert">
                        <strong>Well done!</strong> You successfully read this important alert message.
                    </div> -->
                </div>

                @include('flash_message')

                <div class="col-xl-10 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Edit Form</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form method='POST' action="{{ route('offers.update', $offers_array->id) }}" enctype="multipart/form-data" class="needs-validation validation-fill" novalidate>
                                @csrf
                                @method('PATCH')

                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <label>Title</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_type" name="title" value="{{$offers_array->title}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Slug</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_slug" name="slug"  value="{{$offers_array->slug}}" required>
                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">Select Image <span style="color: red; margin-left: 20px;">( Min Size 350 x 250 * )</span></label>
                                        <input type="file" name="image" class="form-control p-3" accept="image/png,image/svg,image/jpeg,image/webp" onchange="preview()">
                                    </div>

                                    <div class="col-md-6 mb-5">
                                        @if($offers_array->image)
                                            <img src="{{ url('/upload/offers/'.$offers_array->image) }}" id="frame" style="width: 300px; height: 150px;">
                                            <input type="hidden" name="old_image" value="{{ $offers_array->image }}">
                                        @endif
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <label>Description</label>
                                        <div class="input-group">
                                            <textarea type="text" rows="5" class="form-control" name="description" required>{{$offers_array->description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Coupon Code</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="coupon_code" value="{{$offers_array->coupon_code}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Discount (%)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="discount_amount" value="{{$offers_array->discount_amount}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Discount Type</label>
                                        <div class="input-group">
                                            <select class="form-control" name="offers_type_id" required>
                                                <option value="">Select Name</option>
                                                @foreach($offers_type as $m)
                                                    <option value="{{$m->id}}" {{$offers_array->offers_type_id == $m->id?'selected':""}}> {{ucwords($m->title)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Min Order Amount</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="min_order_amount" value="{{$offers_array->min_order_amount}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Max Order Amount</label>
                                        <div class="input-group">
                                        <input type="text" class="form-control" name="max_order_amount" value="{{$offers_array->max_order_amount}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Valid For</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="valid_for" value="{{$offers_array->valid_for}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Exp Date</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="exp_date" value="{{$offers_array->exp_date}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Status *</label>
                                        <div class="input-group">
                                            <select name="is_active" class="form-control" required>
                                                <option value="1" {{ $offers_array->is_active == '1' ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $offers_array->is_active == '0' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
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
