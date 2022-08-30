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
                             <li class="breadcrumb-item" aria-current="page"> <a href="{{ url('dashboard') }}"><i
                                         class="fas fa-home fs-16"></i>Home</a> </li>
                             <li class="breadcrumb-item"><a href="{{ url('admin/lab-test-manage') }}">Lab Test</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Add Lab Test</li>
                         </ol>
                     </nav>
                 </div>

                 @include('flash_message')

                 <div class="col-xl-12 col-md-12">
                     <div class="ms-panel ms-panel-fh">
                         <div class="ms-panel-header">
                             <h6>Add Lab Test Form</h6>
                         </div>
                         <div class="ms-panel-body">
                             <form class="needs-validation validation-fill" method='post'
                                 action="{{ route('lab-test-manage.store') }}" enctype="multipart/form-data" novalidate>
                                 @csrf

                                 <div class="form-row">
                                     <div class="col-md-6 mb-3">
                                         <label>Health Concern Name </label>
                                         <div class="input-group">
                                             <select class="form-control" name="hc_id">
                                                 <option value="">Select Name</option>
                                                 @foreach ($health_concern_array as $health_concern)
                                                     <option value="{{ $health_concern->id }}"> {{ $health_concern->title }}
                                                     </option>
                                                 @endforeach
                                             </select>
                                         </div>
                                     </div>

                                     <div class="col-md-6 mb-3">
                                         <label>Title</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control package_type" name="title"
                                                 placeholder="Enter Title" required>
                                         </div>
                                     </div>

                                     <div class="col-md-6 mb-3">
                                         <label>Slug</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control package_slug" name="slug"
                                                 placeholder="Enter Slug" required>
                                         </div>
                                     </div>

                                     <div class="col-md-6 mb-3">
                                         <label>Test Preparation</label>
                                         <div class="input-group">
                                             <input class="form-control" name="test_preparation"
                                                 placeholder="Enter Test Preparation" required>
                                         </div>
                                     </div>


                                     <div class="col-md-6 mt-5 mb-5">
                                         <label class="form-label">Select Image <span class="text-red">( Min Size 200 x 200
                                                 * )</span></label>
                                         <input type="file" name="image" class="form-control p-3"
                                             accept="image/png,image/jpg,image/jpeg,image/svg,image/webp"
                                             onchange="preview()" required>
                                     </div>

                                     <div class="col-md-6 mt-5 mb-5 px-5">
                                         <img id="frame" style="width: 300px; height: 150px;" />
                                     </div>


                                     <div class="col-md-12 mb-3">
                                         <label>Description</label>
                                         <div class="input-group">
                                             <textarea type="text" rows="5" class="form-control" name="description" placeholder="Enter Description"
                                                 required></textarea>
                                         </div>
                                     </div>

                                     <div class="col-md-12 mb-3">
                                         <label>Short Description</label>
                                         <div class="input-group">
                                             <textarea type="text" rows="5" class="form-control" name="short_description"
                                                 placeholder="Enter Short Description" required></textarea>
                                         </div>
                                     </div>

                                     <div class="col-md-6 mb-5">
                                         <label>Result Understand</label>
                                         <div class="input-group">
                                             <textarea type="text" name="result_understand" class="ckeditor form-control" required></textarea>
                                         </div>
                                     </div>
                                     <div class="col-md-6 mb-5">
                                         <label>Result Table</label>
                                         <input type="hidden" value="1" id="result_table_input_count">
                                         <div class="row">
                                             <div class="col-md-3">
                                                 <label class="badge badge-outline-primary fs-14">Gender</label>
                                             </div>
                                             <div class="col-md-3">
                                                 <label class="badge badge-outline-secondary fs-14">Age groups</label>
                                             </div>
                                             <div class="col-md-3">
                                                 <label class="badge badge-outline-success fs-14">Value</label>
                                             </div>
                                             <div class="col-md-3">
                                                 <a
                                                     class="btn btn-primary btn-sm d-block fs-14 result_table_add_input">Add</a>
                                             </div>
                                         </div>
                                         <div id="r_t_i_remove">
                                             <div class="row" id="r_t_row">
                                                 <div class="col-md-3">
                                                     <div class="input-group">
                                                         <input type="text" name="result_table_gender[]"
                                                             class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                     <div class="input-group">
                                                         <input type="text" name="result_table_age_groups[]"
                                                             class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                     <div class="input-group">
                                                         <input type="text" name="result_table_value[]"
                                                             class="form-control">
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-md-4 mb-5">
                                         <label>Price</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control price Number" name="price"
                                                 placeholder="Enter Price" required>
                                         </div>
                                     </div>

                                     <div class="col-md-4 mb-5">
                                         <label>Discount%</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control discount Number" name="discount"
                                                 placeholder="0">
                                         </div>
                                     </div>

                                     <div class="col-md-4 mb-5">
                                         <label>Offer Price</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control offer_amount Number"
                                                 name="offer_price" placeholder="0">
                                         </div>
                                     </div>

                                     <div class="col-md-12 mb-3">
                                         <label>Prescription</label>
                                         <div class="input-group">
                                             <textarea type="text" rows="5" class="form-control" name="is_prescription"
                                                 placeholder="Enter Prescription" required></textarea>
                                         </div>
                                     </div>

                                     <div class="col-md-6 mb-3">
                                         <label>Duration</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control" name="duration"
                                                 placeholder="Enter Duration" required>
                                         </div>
                                     </div>

                                     <div class="col-md-6 mb-3">
                                         <label>Sample Required</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control" name="sample_required"
                                                 placeholder="Enter Sample Required" required>
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
                                     <div class="ms-panel-header col-md-12 mt-3 mb-3">
                                         <h6>Health Concern SEO</h6>
                                     </div>

                                     <div class="col-md-6 mb-3">
                                         <label>SEO Meta Title</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control package_type" name="meta_title"
                                                 placeholder="Enter Meta Title" required>
                                         </div>
                                     </div>

                                     <div class="col-md-6 mb-3">
                                         <label>SEO Meta Keyword</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control package_type" name="meta_keyword"
                                                 placeholder="Enter Meta Keyword" required>
                                         </div>
                                     </div>

                                     <div class="col-md-12 mb-3">
                                         <label>SEO Meta Description</label>
                                         <div class="input-group">
                                             <textarea type="text" rows="4" class="form-control" name="meta_description"
                                                 placeholder="Enter Your Meta Description" required></textarea>
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

<script>
    $(document).ready(function() {
        $('.discount').on("keyup", function() {
            var price = $('.price').val();
            var disc = $(this).val();
            if (price == "") {
                $(this).val('0');
                swal('Please Enter The Price');
            } else if (disc >= 101) {
                swal('maximum discount of 100%')
                $('.discount').val(100);
            } else {
                var dec = (disc / 100).toFixed(2);
                var mult = price * dec;
                var oamount = price - mult;
                $('.offer_amount').val(oamount.toFixed(2));
            }
        });
        $('.offer_amount').on("keyup", function() {
            var price = $('.price').val();
            if (price == '') {
                $('.offer_amount').val('0');
                swal('Please Enter The Price');
            }
            price = parseInt(price);
            var oa = $('.offer_amount').val();
            oa = parseInt(oa);
            if (price <= oa) {
                $(this).val(price);
                $('.discount').val('0');
                swal('Please Enther valid Offer price')
            } else {
                var mult = price - oa;
                var discountper = (mult / price) * 100;
                $('.discount').val(discountper.toFixed(2));
            }
        });
    });
</script>
<script>
    $('.result_table_add_input').on('click', result_table_add_input_function);
    function result_table_add_input_function() {
        var r_t_i_count = parseInt($('#result_table_input_count').val()) + 1;

        var r_t_i_add = '<div class="row" id="r_t_row_' + r_t_i_count + '">' +
            '<div class="col-md-3">' +
            '<div class="input-group">' +
            '<input type="text" name="result_table_gender[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<div class="input-group">' +
            '<input type="text" name="result_table_age_groups[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<div class="input-group">' +
            '<input type="text" name="result_table_value[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<a class="btn btn-sm btn-primary d-block result_table_remove"  value="' + r_t_i_count + '">Remove</a>' +
            '</div>' +
            '</div>';

        $('#r_t_i_remove').append(r_t_i_add);
        $('#result_table_input_count').val(r_t_i_count);
    }
    $(document).on('click', '.result_table_remove', function() {
        var id = $(this).attr('value');
        $('#r_t_row_' + id).remove();
        console.log($(this).attr('id'))
    });
</script>
 @endsection
