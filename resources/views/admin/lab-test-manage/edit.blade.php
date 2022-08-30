 @extends('admin/layouts.master')
 @section('content')

    <!-- Main Content -->
    <main class="body-content">

        @include('admin/layouts/menu')

        <div class="ms-content-wrapper">
            <div class="row">
                <div class="page-content">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                                <li class="breadcrumb-item"><a href="{{ URL('dashboard')}}"><i class="fas fa-home fs-16"></i> Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ URL('admin/lab-test-manage')}}">Lab Test</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Lab Test</li>
                            </ol>
                        </nav>

                    </div>

                    @include('flash_message')

                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-fh">
                            <div class="ms-panel-header">
                                <h6>Edit Lab Test Form</h6>
                            </div>
                            <div class="ms-panel-body">
                                <form class="needs-validation validation-fill" method='POST' action="{{ route('lab-test-manage.update', $lab_test_array->id) }}" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label>Health Concern Name </label>
                                            <div class="input-group">
                                                <select class="form-control" name="hc_id" >
                                                    <option value="">Select Name</option>
                                                    @foreach($health_concern_array as $health_concern)
                                                        <option value="{{$health_concern->id}}" {{$lab_test_array->hc_id == $health_concern->id?'selected':""}}> {{ucwords($health_concern->title)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Title</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control package_type" name="title" value="{{$lab_test_array->title}}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Slug</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control package_slug" name="slug"  value="{{$lab_test_array->slug}}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Test Preparation</label>
                                            <div class="input-group">
                                                <input class="form-control" name="test_preparation" value="{{$lab_test_array->test_preparation}}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Select Image <span class="text-red">( Min Size 200 x 200 * )</span></label>
                                            <input type="file" name="image" class="form-control p-3" accept="image/png,image/jpg,image/jpeg,image/svg,image/webp" onchange="preview()">
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            @if($lab_test_array->image)
                                                <img src="{{ url('/upload/lab_test_manage/'.$lab_test_array->image) }}" id="frame" style="width: 100%; height: 200px;">
                                                <input type="hidden" name="old_image" value="{{ $lab_test_array->image }}">
                                            @endif
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>Description</label>
                                            <div class="input-group">
                                                <textarea rows="5" class="form-control" name="description" >{{$lab_test_array->description}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>Short Description</label>
                                            <div class="input-group">
                                                <textarea rows="5" class="form-control" name="short_description">{{$lab_test_array->short_description}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Result Understand</label>
                                            <div class="input-group">
                                                <textarea type="text" id="long_desc" name="result_understand" class="ckeditor form-control">{{$lab_test_array->result_understand}}</textarea>
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
                                                @foreach ($lab_test_result_table as $data_result )
                                                    <div class="row" id="r_t_row_00{{$data_result->id}}">
                                                        <div class="col-md-3">
                                                            <div class="input-group">
                                                                <input type="text"  id="result_table_gender_{{$data_result->id}}" onkeyup="result_table_gender({{$data_result->id}},'gender');"
                                                                    class="form-control" value="{{$data_result->gender}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input-group">
                                                                <input type="text" id="result_table_age_groups_{{$data_result->id}}" onkeyup="result_table_gender({{$data_result->id}},'groups');"
                                                                    class="form-control" value="{{$data_result->age_groups}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input-group">
                                                                <input type="text" id="result_table_value_{{$data_result->id}}" onkeyup="result_table_gender({{$data_result->id}},'value');"
                                                                    class="form-control" value="{{$data_result->value}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a class="btn btn-sm btn-primary d-block result_table_remove"  value="00{{$data_result->id}}" result_id="{{$data_result->id}}">Remove</a>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Price</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control price Number" name="price" value="{{$lab_test_array->price}}">
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Discount%</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control discount Number" name="discount" value="{{$lab_test_array->discount}}">
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Offer Price</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control offer_amount Number" name="offer_price" value="{{$lab_test_array->offer_price}}">
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>Prescription</label>
                                            <div class="input-group">
                                                <textarea rows="5" class="form-control" name="is_prescription">{{$lab_test_array->is_prescription}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Duration</label>
                                            <div class="input-group">
                                                <input class="form-control" name="duration" value="{{$lab_test_array->duration}}">
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Sample Required</label>
                                            <div class="input-group">
                                                <input class="form-control" name="sample_required" value="{{$lab_test_array->sample_required}}">
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Status *</label>
                                            <div class="input-group">
                                                <select name="is_active" class="form-control" required>
                                                    <option value="1" {{ $lab_test_array->is_active == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ $lab_test_array->is_active == '0' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="ms-panel-header col-md-12 mt-3 mb-3">
                                            <h6>Health Concern SEO</h6>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>SEO Meta Title</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="meta_title" value="{{ $lab_test_array->meta_title }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>SEO Meta Keyword</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="meta_keyword" value="{{ $lab_test_array->meta_keyword }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>SEO Meta Description</label>
                                            <div class="input-group">
                                                <textarea type="text" rows="4" class="form-control" name="meta_description">{{ $lab_test_array->meta_description }}</textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-12 pt-5">
                                            <button class="btn btn-primary px-5" type="submit">Save</button>
                                            <a href="{{ URL('admin/lab-test-manage') }}" class="btn btn-info  px-5 mx-5">Back</a>
                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
<script>
    $(document).ready(function(){
        $('.discount').on("keyup", function() {
            var price = $('.price').val();
            var disc = $(this).val();
            if(price == ""){
                $(this).val('0');
                swal('Please Enter The Price');
            }else if(disc >=101){
                    swal('maximum discount of 100%')
                    $('.discount').val(100);
            }else{
                var dec = (disc / 100).toFixed(2);
                var mult = price * dec;
                var oamount = price - mult;
                $('.offer_amount').val(oamount.toFixed(2));
            }
        });
        $('.offer_amount').on("keyup", function() {
            var price = $('.price').val();
            if(price == ''){
                $('.offer_amount').val('0');
                swal('Please Enter The Price');
            }
            price = parseInt(price);
            var oa = $('.offer_amount').val();
            oa=parseInt(oa);
            if(price <= oa){
                $(this).val(price);
                $('.discount').val('0');
                swal('Please Enther valid Offer price')
            }else{
                var mult = price - oa;
                var discountper = (mult / price) * 100 ;
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
        var base_url = window.location.origin;
        var id = $(this).attr('value');
        var result_id = $(this).attr('result_id');
        if(result_id){
            $.ajax({
                type:'POST',
                url:base_url+'/admin/lab-test-manage-resul-table-delete',
                data:{
                    "result_id":result_id
                },
                success:function(data) {
                    if(data == 1){
                        $('#r_t_row_' + id).remove();
                    }else{
                        swal('Samthing Worng')
                    }
                }
            });
        }else{
            $('#r_t_row_' + id).remove();
        }
    });

    function result_table_gender(id,category){
        var value= "";
        if(category == 'gender'){
            value = $('#result_table_gender_'+id).val();
        }
        if(category == 'groups'){
            value = $('#result_table_age_groups_'+id).val();
        }
        if(category == 'value'){
            value = $('#result_table_value_'+id).val();
        }
        if(value !== ""){
            console.log(value);
            $.ajax({
                    type:'POST',
                    url:base_url+'/admin/lab-test-manage-resul-table-update',
                    data:{
                        "id":id,
                        "category":category,
                        "value":value
                    },
                    success:function(data) {
                        if(data == 1){
                        }
                    }
                });
        }else{
            console.log('abid')
        }
        console.log(category)
    }
</script>
@endsection
