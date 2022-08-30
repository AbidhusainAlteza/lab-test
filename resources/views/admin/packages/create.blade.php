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
                            <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i class="fas fa-home fs-16"></i> Home</a> </li>
                            <li class="breadcrumb-item"><a href="{{url('admin/packages')}}">Packages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Packages</li>
                        </ol>
                    </nav>
                </div>

                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        <i class="flaticon-alert-1"></i>
                        <strong>Sorry! </strong> {{ Session::get('error') }}
                    </div>
                @endif

                <div class="col-xl-12 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Add Packages Form</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form class="needs-validation validation-fill" method='post' action="{{ route('packages.store') }}" enctype="multipart/form-data" novalidate>
                                @csrf

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label>Packages Type</label>
                                        <div class="input-group">
                                            <select class="form-control" name="package_type" required>
                                                    <option value="">Select Package Type</option>
                                                    @foreach($package_type as $p)
                                                        <option value="{{$p->id}}"> {{ucwords($p->package_type)}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Packages Title</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_type" name="title" placeholder="Enter Title" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Slug</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_slug" name="slug" placeholder="Enter Slug" required>
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-3 mb-3">
                                        <label class="form-label">Packages Image <span class="text-red">Min Size 200 x 150 *</span></label>
                                        <input type="file" name="image" class="form-control p-3" accept="image/png,image/jpg,image/jpeg,image/svg,image/webp" onchange="preview()" required>
                                    </div>

                                    <div class="col-md-6 mt-3 mb-3 px-5">
                                        <img id="frame" style="width: 300px; height: 150px;"/>
                                    </div>


                                    <div class="col-md-12 mb-3 mt-3">
                                        <label>Packages Description</label>
                                        <div class="input-group">
                                            <textarea rows="5" type="text" class="form-control" name="description" placeholder="Enter Description" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Total Amount</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control total_amount" name="total_amount" placeholder="0" required readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Packages Discount</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control discount Number" name="discount" placeholder="0%" >
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Offer Amount</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control offer_amount Number" name="offer_amount" placeholder="0" >
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Offer Valid Till</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="offer_valid_till" placeholder="Enter Offer Valid Date" >
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Lab Test Name </label>
                                        <div class="inputFields">
                                            <select class="form-control taskInput" name="lab_test_id" required>
                                                <option value="">Select Lab Test Name</option>
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
                                               <tr class="no_data">
                                                   <td colspan="2">No data Found</td>
                                               </tr>
                                            </tbody>
                                       </table>
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
                                            <input type="text" class="form-control package_type" name="meta_title" placeholder="Enter Meta Title" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>SEO Meta Keyword</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_type" name="meta_keyword" placeholder="Enter Meta Keyword" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>SEO Meta Description</label>
                                        <div class="input-group">
                                            <textarea type="text" rows="4" class="form-control" name="meta_description" placeholder="Enter Your Meta Description" required></textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-12 mb-3 mt-3">
                                        <button class="btn btn-primary d-block " type="submit">Save</button>
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
                console.log(package_id ,row);
                if(package_id == row){
                    swal('Lab Test is already added');
                }else{
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
                                var price = $(this).data('test_price');
                                var total  = $('.total_amount').val();
                                $('.deleterow'+ id).remove();
                                getTotalPrice();
                            });

                            // $('.discount').on("keyup", function() {
                            //     // console.log('asf')
                            //     discount();
                            // });

                            $('.offer_amount').on("keyup", function() {
                                offer_amount();
                            });


                        }
                    });
                }
            });
            $('.discount').on("keyup", function() {
                var max = $(this).val();
                if(max >=101){
                    swal('maximum discount of 100%')
                    $('.discount').val(100);
                }
                // discount();
                var main = $('.total_amount').val();

                var disc = $('.discount').val();
                var dec = (disc / 100).toFixed(2);
                var mult = main * dec;
                var oamount = main - mult;
                $('.offer_amount').val(oamount);
            });

            function discount(){
                var main = $('.total_amount').val();

                var disc = $('.discount').val();
                var dec = (disc / 100).toFixed(2);
                var mult = main * dec;
                var oamount = main - mult;
                $('.offer_amount').val(oamount);
            }

            function offer_amount(){
                var main = $('.total_amount').val();
                var oa = $('.offer_amount').val();
                discount = main - oa;
                percent = (discount / main) * 100;
                $('.discount').val(percent.toFixed(2));
                $('.offer_amount').attr("max",main);
            }

            function getTotalPrice() {
                var total = 0;
                $(".test_price").each(function() {
                    var val = $(this).val();
                    total += isNaN(val) || $.trim(val)=="" ? 0 : parseFloat(val);
                });
                $('.total_amount').val(total);
            }
        });

    </script>
@endsection




