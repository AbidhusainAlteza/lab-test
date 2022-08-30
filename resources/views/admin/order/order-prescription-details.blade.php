@extends('admin/layouts.master')

@section('content')

<!-- Main Content -->
<main class="body-content">

    @include('admin/layouts/menu')

    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper box">
        <div class="row">
            <div  class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i
                                    class="material-icons">home</i> Home</a> </li>
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{ URL::previous() }}">Orders</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6">
                @include('flash_message')
            </div>
            {{-- Order Status  --}}
            <div class=" col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h4>Order No :- {{$orders->order_number}}</h4>
                    </div>
                    <div class="ms-panel-body">
                        <input type="hidden" id="order_id" value="{{$orders->id}}">
                        @if (get_user()->role == 'admin')
                        <div class="form-row ">
                            <div class="col-md-6">
                                <label>Order Current Status :</label>
                                <div class="input-group">
                                    <select class="form-control" name="current_status" id="current_status">
                                        <option value="">Select Status</option>
                                        <option value="pending" {{$orders->current_status == 'pending'?'selected':''}}>Pending</option>
                                        <option value="valid" {{$orders->current_status == 'valid'?'selected':''}}>Valid</option>
                                        <option value="under_review" {{$orders->current_status == 'under_review'?'selected':''}}>Under Review</option>
                                        <option value="in_proccess" {{$orders->current_status == 'in_proccess'?'selected':''}}>In Proccess</option>
                                        <option value="wait_for_confirmation" {{$orders->current_status == 'wait_for_confirmation'?'selected':''}}>Wait for Confirmation</option>
                                        <option value="assigned" {{$orders->current_status == 'assigned'?'selected':''}}>Assigned</option>
                                        <option value="accepted" {{$orders->current_status == 'accepted'?'selected':''}}>Accepted</option>
                                        <option value="ready" {{$orders->current_status == 'ready'?'selected':''}}>Ready</option>
                                        <option value="dispatched" {{$orders->current_status == 'dispatched'?'selected':''}}>Dispatched</option>
                                        <option value="completed" {{$orders->current_status == 'completed'?'selected':''}}>Completed</option>
                                        <option value="rejected" {{$orders->current_status == 'rejected'?'selected':''}}>Rejected</option>
                                        <option value="cancelled" {{$orders->current_status == 'cancelled'?'selected':''}}>Cancelled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Order Payment Status :</label>
                                <div class="input-group">
                                    <select class="form-control" name="payment_status" id="payment_status">
                                        <option value="">Select Status</option>
                                        <option value="awaiting_payment" {{$orders->payment_status == 'awaiting_payment'?'selected':''}}>Awaiting Payment</option>
                                        <option value="payment_received" {{$orders->payment_status == 'payment_received'?'selected':''}}>Payment Received</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="form-row ">
                            @if (get_user()->role == 'vendor')
                            <div class="col-md-6">
                                <label>Refer Blood Collect Boy :</label>
                                <div class="input-group">
                                    <select class="form-control " name="blood_collection_boy" id="blood_collection_boy">
                                        <option>Select Blood Collect Boy</option>
                                        @foreach ($blood_collection_boys as $blood_collection_boy)
                                        <option value="{{$blood_collection_boy->id}}" {{$orders->blood_collection_boy_id == $blood_collection_boy->id?'selected':''}}>{{$blood_collection_boy->user_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            @if(get_user()->role == 'collection_boy' || get_user()->role == 'vendor')
                            <div class="col-md-6">
                                <label>Collection Boy Status :</label>
                                <div class="input-group">
                                    <select class="form-control" name="collection_boy_status" id="collection_boy_status" {{get_user()->role == 'vendor'?'disabled="true"':"false"}}>
                                        <option value="">Select Status</option>
                                        <option value="assigned" {{$orders->collection_boy_status == 'assigned'?'selected':''}}>Assigned</option>
                                        <option value="accepted" {{$orders->collection_boy_status == 'accepted'?'selected':''}}>Accepted</option>
                                        <option value="rejected" {{$orders->collection_boy_status == 'rejected'?'selected':''}}>Rejected</option>
                                        <option value="collected" {{$orders->collection_boy_status == 'collected'?'selected':''}}>Collected</option>
                                        <option value="to_the_lab" {{$orders->collection_boy_status == 'to_the_lab'?'selected':''}}>To The Lab</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="form-row">
                            @if (get_user()->role == 'admin')
                                <div class="col-md-6">
                                    <label>Refer by Lab Partner :</label>
                                    <div class="input-group">
                                        <select class="form-control" name="lab_partner" id="lab_partner">
                                            <option>Select Lab Partner</option>
                                            @foreach ($vendors as $vendor)
                                                <option value="{{$vendor->id}}" {{$orders->lab_partner_id == $vendor->id?'selected':''}}>{{$vendor->user_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                            @if (get_user()->role == 'admin' || get_user()->role == 'vendor')
                            <div class="col-md-6">
                                <label>Lab Partner Status :</label>
                                <div class="input-group">
                                    <select class="form-control" name="lab_partner_status" id="lab_partner_status" {{get_user()->role == 'admin'?'disabled="true"':"false"}}>
                                        <option value="">Select Status</option>
                                        <option value="accepted" {{$orders->lab_partner_status == 'accepted'?'selected':''}}>Accepted</option>
                                        <option value="sample_received" {{$orders->lab_partner_status == 'sample_received'?'selected':''}}>Sample Received</option>
                                        <option value="in_progress" {{$orders->lab_partner_status == 'in_progress'?'selected':''}}>In Progress</option>
                                        <option value="report_generated" {{$orders->lab_partner_status == 'report_generated'?'selected':''}}>Report Generated</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                            @if (get_user()->role == 'vendor')
                            <div class="col-md-6">
                                <form action="{{url('admin/lab-partner-report-upload')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="order_id" name="order_id" value="{{$orders->id}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Report Upload : <span>MAX size 5MB</span></label>
                                            <div class="input-group">
                                                <input type="file" name="lab_file_upload" id="lab_file_upload" class="form-control p-1" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label></label>
                                            <button type="submit" class="btn btn-primary" id="report_upload">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                        @if (get_user()->role == 'admin' || get_user()->role == 'vendor')
                        <div class="form-row ">
                            <div class="col-md-6">
                                <label>Lab Partner Report :</label>
                                <div class="imput-group">
                                    @if (!empty($orders->lab_partner_report))
                                        <embed src="{{url('')}}/upload/lab_partner_report/{{$orders->lab_partner_report}}"   height="300px" width="100%" class="responsive">
                                        <a href="{{url('')}}/upload/lab_partner_report/{{$orders->lab_partner_report}}" target="_blank" class="btn btn-primary">Report Download</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- Address --}}
            <div class="col-12">
                <div class="ms-panel">
                    <div class="ms-panel-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <h4 class=" mb-0 text-capitalize">Shipping Address </h4>
                                <hr>
                                <div class="display-flex">
                                    <h6 class="">Full Name : </h6>
                                    <p class="text-capitalize">{{ $orders_shipping->fullname }}</p>
                                </div>
                                <div class="display-flex">
                                    <h6 class="mb-1">Email : </h6>
                                    <p class="text-capitalize">{{$orders_shipping->email}}</p>
                                </div>
                                <div class="display-flex">
                                    <h6 class="mb-1">Phone Number : </h6>
                                    <P class="text-capitalize">{{ $orders_shipping->contact_number }}</P>
                                </div>
                                <div class="display-flex">
                                    <h6 class="mb-1">Address : </h6>
                                    <p class="text-capitalize">{{ $orders_shipping->address}}</p>
                                </div>
                                <div class="display-flex">
                                    <h6 class="mb-1">State : </h6>
                                    <p class="text-capitalize">{{ $orders_shipping->state }}</p>
                                </div>
                                <div class="display-flex">
                                    <h6 class="mb-1">City : </h6>
                                    <p class="text-capitalize">{{ $orders_shipping->city }}</p>
                                </div>
                                <div class="display-flex">
                                    <h6 class="mb-1">Zip Code : </h6>
                                    <p class="text-capitalize">{{ $orders_shipping->zip }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="strong mb-0">Payment Status </h4>
                                <hr>
                                <div class="display-flex">
                                    <h6>Payment Method : </h6>
                                    <p class="text-capitalize">{{ $orders->payment_method=='cash_on_delivery'?'Cash On Delivery':'Online'}}</p>
                                </div>
                                <div class="display-flex">
                                    <h6>Payment Status :</h6>
                                    @if ($orders->payment_status=='awaiting_payment')
                                        <p class="text-capitalize">Awaiting Payment</p>
                                    @endif
                                    @if ($orders->payment_status=='payment_received')
                                        <p class="text-capitalize">Payment Received</p>
                                    @endif
                                </div>
                                <div class="display-flex">
                                    <h6>Updated : </h6>
                                    <p class="text-capitalize">{{ time_ago($orders->updated_date) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h6>Prescription images</h6>
                    </div>
                    <div class="ms-panel-body pt-1">
                        <?php $img = json_decode($orders->prescription_img)?>
                        <h6>{{count($img)}} Image</h6>
                        <div id="arrowSlider" class="ms-arrow-slider carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                                @for ($i=0; $i < count($img); $i++)
                                    <div class="carousel-item {{$i==0?"active":""}}">
                                        <img style="width: 100%; height:100%" src="{{url('')}}/image/upload-prescription/{{$img[$i]}}" alt="" class="imagelink">
                                    </div>
                                @endfor
                            </div>
                            <a class="carousel-control-prev" href="#arrowSlider" role="button" data-slide="prev">
                                <span class="material-icons" aria-hidden="true">keyboard_arrow_left</span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#arrowSlider" role="button" data-slide="next">
                                <span class="material-icons" aria-hidden="true">keyboard_arrow_right</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- prescription details --}}
            <div class="col-md-6">
                <div class="ms-panel ms-panel-fh">
                    <div class="ms-panel-body">
                        <form action="{{url('admin/prescription-order-add')}}" method="POST">
                            @csrf
                            <input type="hidden" name="order_id" value="{{$orders->id}}">
                            <input type="hidden" name="buyer_id" value="{{$orders->buyer_id}}">
                            {{-- prescription lab tests --}}
                            <div class="form-row border-bottom-5">
                                <div class="col-md-8 mb-3">
                                    <label>Lab Test Add</label>
                                    <div class="inputFields">
                                        <select class="form-control taskInput" name="lab_test_id" id="lab_test_id">
                                            <option value="">Select Lab Test Name</option>
                                            @foreach ($lab_tests as $lab_test)
                                                <option value="{{$lab_test->id}}"> {{$lab_test->title}} - Rs.{{$lab_test->offer_price}} /-</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3 mt-4">
                                    <div class="inputFields">
                                        <span class="btn btn-primary btn-sm task_add"><i class="fa fa-plus"></i></span>
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
                                                @if(count($orders_items) > 0)
                                                @foreach($orders_items as $orders_item)
                                                <tr class="deleterow{{$orders_item->item_id}}">
                                                    <td>{{$orders_item->item_title}} -Rs.{{$orders_item->item_price}}/-</td>
                                                    <td class="delete" style="width:10px; color:red; margin-left: 10px; cursor:pointer;" data-price="{{$orders_item->item_price}}" data-labtest_id="{{$orders_item->item_id}}" data-id="{{$orders_item->order_id}}" data-order_id="{{$orders_item->id}}"> &#10006</td>
                                                    <input type="hidden"  id="labtest_id_{{$orders_item->item_id}}" data="{{$orders_item->item_id}}">
                                                    <input type="hidden" class="test_price"  value="{{$orders_item->item_price}}">
                                                </tr>
                                                @endforeach
                                                @else
                                                <td colspan="2">No data Found</td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Lab test price :-</label>
                                    <div class="form-group">
                                        <input type="text" name="total_price" class="form-control total_amount" value="{{$orders->price_total}}" readonly >
                                    </div>
                                </div>
                            </div>

                            {{-- package --}}
                            <div class="form-row mt-3">
                                <div class="col-md-8 mb-3">
                                    <label>Packages Add</label>
                                    <div class="inputFields">
                                        <select class="form-control package_taskInput" name="lab_test_id" >
                                            <option value="">Select Package Name</option>
                                            @foreach ($packages as $package)
                                                <option value="{{$package->id}}"> {{$package->title}} - Rs.{{$package->offer_amount}} /-</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3 mt-4">
                                    <div class="inputFields">
                                        <span class="btn btn-primary btn-sm package_task_add"><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <table class="table w-100%" class="tasks">
                                        <thead>
                                            <tr>
                                                <th>Package List</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody class="package_tasksList">
                                            <tr class="package_no_data">
                                                @if(count($orders_items_packages) > 0)
                                                @foreach($orders_items_packages as $orders_items_package)
                                                <tr class="package_deleterow{{$orders_items_package->item_id}}">
                                                    <td>{{$orders_items_package->item_title}} -Rs.{{$orders_items_package->item_price}}/-</td>
                                                    <td class="package-delete" style="width:10px; color:red; margin-left: 10px; cursor:pointer;" data-item_price="{{$orders_items_package->item_price}}" data-id="{{$orders_items_package->item_id}}" data-item_id="{{$orders_items_package->id}}" data-order_id="{{$orders_items_package->order_id}}"> &#10006</td>
                                                    <td>
                                                        <input type="hidden"  id="package_id_{{$orders_items_package->item_id}}" data="{{$orders_items_package->item_id}}">
                                                        <input type="hidden" class="package_price"  value="{{$orders_items_package->item_price}}">
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <td colspan="2">No data Found</td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Package price :-</label>
                                    <div class="form-group">
                                        <input type="text" name="Package_total_price" class="form-control package_total_amount" value="{{$orders->price_total}}" readonly >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Total Price</label>
                                                <input type="number" name="prescription_total_price" class="form-control prescription_total_price" value="{{$orders->price_subtotal}}" readonly >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Offer Price</label>
                                                <input type="number" name="prescription_offer_price" class="form-control prescription_offer_price" value="{{$orders->price_total}}" readonly >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Discount %</label>
                                                <input type="number" name="prescription_discount" class="form-control prescription_discount" value="{{$orders->coupons_discount}}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary ">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    // labtest
    $(document).ready(function(){
        getTotalPrice();
        prescription_total_price();
        discount();
        $('.no_data').show();
        $('.task_add').on('click',function(){
            var status = $('.taskInput option:selected').val();
            var row = status;
            var package_id = $('#labtest_id_'+row).attr('data');
            console.log(package_id);
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
                        // console.log(data)
                        $('.no_data').hide();
                        $('.tasksList').append(data);
                        getTotalPrice();
                        prescription_total_price();
                        discount();
                        $(".delete").on("click", function(data) {
                            var id = $(this).data('id');
                            var price = $(this).data('test_price');
                            var total  = $('.total_amount').val();
                            swal({
                                    title: "Are you sure?",
                                    text: "To remove Test",
                                    showCancelButton: true,
                                    confirmButtonText: 'Yes, delete it!',
                                    cancelButtonColor: '#4eb92d',
                                    confirmButtonColor: '#d33',
                                }).then((result) => {
                                    if(result.value){
                                       $('.deleterow'+ id).remove();
                                       getTotalPrice();
                                       prescription_total_price();
                                        discount();
                                    }
                                    });
                        });
                    }
                });

            }
        });
    });
    $(".delete").on("click", function() {
        var order_id = $(this).data('id');
        var labtest_id = $(this).data('labtest_id')
        var order_item_price = $(this).data('price');
        var total  = $('.total_amount').val();
        var order_item_id = $(this).data('order_id');
        console.log(order_item_id);
        if(order_item_id !== ""){
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
                        url:'/admin/prescription-order-remove',
                        data:{
                            "order_id":order_id,
                            "order_item_id":order_item_id,
                            "order_item_price":order_item_price,
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(data) {
                            if(data == 1){
                                console.log(data)
                                $('.deleterow'+ labtest_id).remove();
                                getTotalPrice();
                                prescription_total_price();
                                discount();
                            }
                        }
                    });
                }
                })
        }
    });


    function getTotalPrice() {
        var total = 0;
        $(".test_price").each(function() {
            var val = $(this).val();
            total += isNaN(val) || $.trim(val)=="" ? 0 : parseFloat(val);
        });
        $('.total_amount').val(total);
    }


    // package
    $(document).ready(function(){
        getPackageTotalPrice();
        prescription_total_price();
        discount();
        $('.package_no_data').show();
        $('.package_task_add').on('click',function(){
            var id = $('.package_taskInput option:selected').val();
            var package_id = $('#package_id_'+id).attr('data');
            console.log(id);
            if(id == ''){
                swal('Selecte a package');
            }else{
                if(package_id == id){
                    swal('Package is already added');
                }else{
                    $.ajax({
                        type:'POST',
                        url:'/admin/package-task-add',
                        data:{
                            'id':id,
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(data) {
                            // console.log(data)
                            $('.package_no_data').hide();
                            $('.package_tasksList').append(data);
                            getPackageTotalPrice();
                            prescription_total_price();
                            discount();
                            $(".package-delete").click(function(){
                                var id = $(this).data('id');
                                swal({
                                    title: "Are you sure?",
                                    text: "To remove package",
                                    showCancelButton: true,
                                    confirmButtonText: 'Yes, delete it!',
                                    cancelButtonColor: '#4eb92d',
                                    confirmButtonColor: '#d33',
                                }).then((result) => {
                                    if(result.value){
                                       $('.package_deleterow'+ id).remove();
                                       getPackageTotalPrice();
                                       prescription_total_price();
                                        discount();
                                    }
                                    });
                            });
                        }
                    });

                }
            }
        });
    });
    // remove package
    $(".package-delete").click(function(){
        var id = $(this).data('id');
        var item_id = $(this).data('item_id');
        var item_price = $(this).data('item_price');
        var order_id = $(this).data('order_id');
        // console.log('item_id'+item_id+"item_price"+item_price+"order_id"+order_id);
        swal({
            title: "Are you sure?",
            text: "To remove package",
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonColor: '#4eb92d',
            confirmButtonColor: '#d33',
        }).then((result) => {
            if(result.value){
                console.log(id)
                if(order_id !== ""){
                    $.ajax({
                        type:'POST',
                        url:'/admin/prescription-order-package-remove',
                        data:{
                            "item_id":item_id,
                            "item_price":item_price,
                            "order_id":order_id,
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(data) {
                            if(data == 1){
                                console.log(data)
                                $('.package_deleterow'+ id).remove();
                                getPackageTotalPrice();
                                prescription_total_price();
                                discount();
                            }
                        }
                    });
                }
            }
        });
    });
    function getPackageTotalPrice() {
        var total = 0;
        $(".package_price").each(function() {
            var val = $(this).val();
            total += isNaN(val) || $.trim(val)=="" ? 0 : parseFloat(val);
        });
        $('.package_total_amount').val(total);
    }

    $('.prescription_discount').keyup(function(){
        discount();
    });
    $(document).ready(function(){
        prescription_total_price();
        discount();
    });

    function prescription_total_price() {
        var package_total_amount = parseFloat($('.package_total_amount').val());
        var labtesttotal_amount = parseFloat($('.total_amount').val());
        var tottal_value = package_total_amount + labtesttotal_amount;
        $('.prescription_total_price').val(tottal_value.toFixed(2));
        $('.prescription_offer_price').val(tottal_value.toFixed(2));
        // console.log(tottal_value);

    }
    function discount(){
        var discount = $('.prescription_discount').val();
        var totalprice = $('.prescription_total_price').val();
        var tottal_value = totalprice * discount;
        tottal_value = tottal_value / 100;
        tottal_value = totalprice - tottal_value
        $('.prescription_offer_price').val(tottal_value.toFixed(2));
    }
</script>
{{-- update pricsiption status --}}
<script>
    $(document).ready(function(){
        var base_url = window.location.origin;
        var order_id = $('#order_id').val();
        // refer doctor
        $('#refer_doctor_save').click(function(){
            var refer_doctor = $('#refer_doctor').val();
            if(refer_doctor !== ""){
                swal({
                    title: "Are you sure?",
                    text: "To Reference Name" +refer_doctor,
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Do it!',
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#4eb92d',
                }).then((result) => {
                    if(result.value){
                        console.log(base_url);
                        $.ajax({
                            type:'POST',
                            url:base_url+'/admin/order-doctor-name-add',
                            data:{
                                "refer_doctor":refer_doctor,
                                'order_id':order_id
                            },
                            success:function(data) {
                                if(data == 1){
                                    console.log(data);
                                    swal('Done')
                                }
                            }
                        });
                    }
                });
            }else{
                swal('Please Enter Doctor Name');
            }
        });
        // current_status
        $("#current_status").change(function(){
            var current_status = $(this).val();
            console.log(current_status)
            swal({
                    title: "Are you sure?",
                    text: "To Change Status",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Do it!',
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#4eb92d',
                }).then((result) => {
                    if(result.value){
                        console.log(base_url);
                        $.ajax({
                            type:'POST',
                            url:base_url+'/admin/order-current-status-add',
                            data:{
                                "current_status":current_status,
                                'order_id':order_id
                            },
                            success:function(data) {
                                if(data == 1){
                                    console.log(data);
                                    swal('Done')
                                }
                            }
                        });
                    }
                });
        })
        // blood_collection_boy
        $("#blood_collection_boy").change(function(){
            var blood_collection_boy = $(this).val();
            console.log(blood_collection_boy)
            swal({
                title: "Are you sure?",
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#4eb92d',
            }).then((result) => {
                if(result.value){
                    console.log(base_url);
                    $.ajax({
                        type:'POST',
                        url:base_url+'/admin/order-blood-collection-boy-add',
                        data:{
                            "blood_collection_boy":blood_collection_boy,
                            'order_id':order_id
                        },
                        success:function(data) {
                            if(data == 1){
                                console.log(data);
                                swal('Done')
                            }
                        }
                    });
                }
            });
        });
        // lab_partner
        $("#lab_partner").change(function(){
            var lab_partner = $(this).val();
            swal({
                title: "Are you sure?",
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#4eb92d',
            }).then((result) => {
                if(result.value){
                    console.log(base_url);
                    $.ajax({
                        type:'POST',
                        url:base_url+'/admin/order-lab-partner-add',
                        data:{
                            "lab_partner":lab_partner,
                            'order_id':order_id
                        },
                        success:function(data) {
                            if(data == 1){
                                console.log(data);
                                swal('Done')
                            }
                        }
                    });
                }
            });
        });
        // Payment status
        $('#payment_status').change(function(){
            var payment_status = $(this).val();
            swal({
                title: "Are you sure?",
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#4eb92d',
            }).then((result) => {
                if(result.value){
                    console.log(base_url);
                    $.ajax({
                        type:'POST',
                        url:base_url+'/admin/order-payment-status-add',
                        data:{
                            "payment_status":payment_status,
                            'order_id':order_id
                        },
                        success:function(data) {
                            if(data == 1){
                                swal('Done')
                            }
                        }
                    });
                }
            });
        });

        // lab partner status
        $('#lab_partner_status').change(function(){
            var lab_partner_status = $(this).val();
            console.log(lab_partner_status)
            if(lab_partner_status !== ""){
                swal({
                    title: "Are you sure?",
                    text: "To Change Status",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Do it!',
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#4eb92d',
                }).then((result) => {
                    if(result.value){
                        console.log(base_url);
                        $.ajax({
                            type:'POST',
                            url:base_url+'/admin/lab-partner-status',
                            data:{
                                "lab_partner_status":lab_partner_status,
                                'order_id':order_id
                            },
                            success:function(data) {
                                if(data == 1){
                                    console.log(data);
                                    swal('Done')
                                }else{
                                    swal('Samthing Worng')
                                }
                            }
                        });
                    }
                });
            }else{
                swal('Please Enter Status Name');
            }
        });

        // collectione boy status
        $('#collection_boy_status').change(function(){
            var collection_boy_status = $(this).val();
            console.log(order_id)
            if(collection_boy_status !== ""){
                swal({
                    title: "Are you sure?",
                    text: "To Change Status",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Do it!',
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#4eb92d',
                }).then((result) => {
                    if(result.value){
                        console.log(base_url);
                        $.ajax({
                            type:'POST',
                            url:base_url+'/admin/collection-boy-status',
                            data:{
                                "collection_boy_status":collection_boy_status,
                                'order_id':order_id
                            },
                            success:function(data) {
                                if(data == 1){
                                    console.log(data);
                                    swal('Done')
                                }else{
                                    swal('Samthing Worng')
                                }
                            }
                        });
                    }
                });
            }else{
                swal('Please Enter Doctor Name');
            }
        });
    });
</script>
@endsection





