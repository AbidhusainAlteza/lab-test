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
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="fas fa-home fs-16"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/packages')}}">Packages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Packages</li>
                        </ol>
                    </nav>
                </div>

                @include('flash_message')

                <div class="col-xl-12 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Edit Form</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form class="needs-validation validation-fill" method='POST' action="{{ route('packages.update', $packages_array->id,) }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PATCH')

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label>Packages Type *</label>
                                        <div class="input-group">
                                            <select class="form-control" name="package_type" required>
                                                    <option value="">Select Package Type</option>
                                                    @foreach($package_type as $p)
                                                        <option value="{{$p->id}}"  {{$packages_array->package_type_id == $p->id ? 'selected' : '' }}> {{ucwords($p->package_type)}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Title</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_type" name="title" value="{{ $packages_array->title }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Slug</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_slug" name="slug" value="{{ $packages_array->slug }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-5">
                                        <label class="form-label">Packages Image <span class="text-red">( Min Size 200 x 150 * )</span></label>
                                        <input type="file" name="image" class="form-control p-3" accept="image/png,image/jpg,image/jpeg,image/svg,image/webp" onchange="preview()">
                                    </div>

                                    <div class="col-md-6 mb-5 px-5">
                                        @if($packages_array->image)
                                            <img src="{{ url('/upload/packages/'.$packages_array->image) }}" id="frame" style="width: 80%; height: 200px;">
                                            <input type="hidden" name="old_image" value="{{ $packages_array->image }}">
                                        @endif
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>Description</label>
                                        <div class="input-group">
                                            <textarea rows="5" type="text" class="form-control" name="description" required>{{ $packages_array->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Total Amount</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control total_amount" name="total_amount" value="{{ $packages_array->total_amount }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Discount</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control discount Number" name="discount" value="{{ $packages_array->discount }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Offer Amount</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control offer_amount Number" name="offer_amount" value="{{ $packages_array->offer_amount }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Offer Valid Till</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="offer_valid_till" value="{{ format_date_noTime($packages_array->offer_valid_till) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Lab Test Name </label>
                                        <div class="inputFields">
                                            <select class="form-control taskInput" name="lab_test_id">
                                                <option value="" >Select Lab Test Name</option>
                                                @foreach($lab_test_array as $lab_test)
                                                    <option value="{{$lab_test->id}}"> {{$lab_test->title}} - Rs.{{$lab_test->offer_price}}/-</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3 mt-4">
                                        <div class="inputFields">
                                            <span class="btn btn-primary task_add"><i class="fa fa-plus"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <table class="table w-100%" class="tasks">
                                            <thead>
                                                <tr>
                                                    <th>Lab Test List</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tasksList">
                                                @foreach($package_test as $p)
                                                <?php $test = \App\Models\Admin_lab_test_manage::where('id',$p->lab_test_id)->first();?>
                                                    <tr class="deleterow{{$p->lab_test_id}}">
                                                        <td>{{ $test->title }} - Rs.{{ $p->price }}/-</td>
                                                        <input type="hidden" id="labtest_id_{{$p->lab_test_id}}" data="{{$p->lab_test_id}}">
                                                        <input type="hidden" class="test_price"  value="{{$p->price}}">
                                                        {{-- <input type="hidden" name="lab_tests[{{$p->lab_test_id}}][id]" value="{{$p->id}}">
                                                        <input type="hidden" name="lab_tests[{{$p->lab_test_id}}][lab_test_id]" value="{{$p->lab_test_id}}">
                                                        <input type="hidden" name="lab_tests[{{$p->lab_test_id}}][test_title]" value="{{$test->title}}">
                                                        <input type="hidden" class="test_price" name="lab_tests[{{$p->lab_test_id}}][price]" value="{{$p->price}}"> --}}
                                                        <td>
                                                            <a style="font-size: 16px; color:red; cursor:pointer;" data-deleterow="{{$p->lab_test_id}}" data-packageid="{{$packages_array->id}}" data-price="{{$test->offer_price}}" data-test_id = "{{$p->package_id}}" data-id="{{$p->id}}" class="test_delete" name="delete">&#10006</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Status *</label>
                                        <div class="input-group">
                                            <select name="is_active" class="form-control" required>
                                                <option value="1" {{ $packages_array->is_active == '1' ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $packages_array->is_active == '0' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="ms-panel-header col-md-12 mt-3 mb-3">
                                        <h6>Health Concern SEO</h6>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>SEO Meta Title</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="meta_title" value="{{ $packages_array->meta_title }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>SEO Meta Keyword</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="meta_keyword" value="{{ $packages_array->meta_keyword }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>SEO Meta Description</label>
                                        <div class="input-group">
                                            <textarea type="text" rows="4" class="form-control" name="meta_description">{{ $packages_array->meta_description }}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-12 pt-5">
                                        <button class="btn btn-primary px-5" type="submit">Save</button>
                                        <a href="{{ URL('admin/packages') }}" class="btn btn-info  px-5 mx-5">Back</a>
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
        $(document).ready(function(){
            $('.no_data').show();
            $('.task_add').on('click',function(){
                var status = $('.taskInput option:selected').val();
                var row = status;
                var package_id = $('#labtest_id_'+row).attr('data');
                if(package_id == row){
                    swal('Lab Test is already added');
                }else{
                    //  alert(status);
                    $.ajax({
                        type:'POST',
                        url:'/task-add',
                        data:{
                            row:row,
                            status:status,
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(data) {
                            $('.no_data').hide();
                            $('.tasksList').append(data);
                            getTotalPrice();
                            $(".delete").on("click", function(data) {
                            var id = $(this).data('id');
                                $('.deleterow' + id).remove();
                                getTotalPrice();
                            });
                            $('.discount').on("keyup", function() {
                                discount();
                            });
                            $('.offer_amount').on("keyup", function() {
                                offer_amount();
                            });
                        }
                    });
                }
            });
        });
        $(document).ready(function(){
            $(".test_delete").on("click", function(data) {
                var id = $(this).data('id');
                var deleterow = $(this).data('deleterow')
                var test_id = $(this).data('test_id');
                var labtest_price = $(this).data('price');
                var packageid = $(this).data('packageid');
                swal({
                    title: "Are you sure?",
                    text: "To remove Test",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonColor: '#4eb92d',
                    confirmButtonColor: '#d33',
                }).then((result) => {
                    if(result.value){
                        $.ajax({
                            type:'POST',
                            url:'/task-delete',
                            data:{
                                id:id,
                                labtest_price:labtest_price,
                                packageid:packageid,
                                test_id:test_id,
                                "_token": "{{ csrf_token() }}",
                            },
                            success:function(data) {
                            // location.reload();
                            if(data == 1){
                                $('.deleterow' + deleterow).remove();
                                getTotalPrice();
                                $('.discount').on("keyup", function() {
                                    discount();
                                });
                                $('.offer_amount').on("keyup", function() {
                                    offer_amount();
                                });
                            }
                            }
                        });
                    }
                });
            });
            $('.discount').on("keyup", function() {
                discount1();
            });
            $('.offer_amount').on("keyup", function() {
                offer_amount();
            });
        });
        function discount1(){
            var total_amount = $('.total_amount').val();
            var discount = $('.discount').val();
            var discount = (discount / 100).toFixed(2);
            var mult = total_amount * discount;
            var amount = total_amount - mult;
            $('.offer_amount').val(amount);
        }
        function offer_amount(){
            var total_amount = $('.total_amount').val();
            var offer_amount = $('.offer_amount').val();
            discount = total_amount - offer_amount;
            percent = (discount / total_amount) * 100;
            $('.discount').val(percent.toFixed(2));
            $('.offer_amount').attr("max",total_amount);
        }
        function getTotalPrice() {
            var total = 0;
            $(".test_price").each(function() {
                var val = $(this).val();
                total += isNaN(val) || $.trim(val)=="" ? 0 : parseFloat(val);
            });
            $('.total_amount').val(total);
            var total_amount = total;
            var discount = $('.discount').val();
            var discount = (discount / 100).toFixed(2);
            var mult = total_amount * discount;
            var amount = total_amount - mult;
            $('.offer_amount').val(amount);
        }
    </script>

@endsection


