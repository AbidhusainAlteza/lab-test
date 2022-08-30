 @extends('admin/layouts.master')

 @section('content')
    <!-- Main Content -->
    <main class="body-content">

        @include('admin/layouts/menu')
        <!-- Body Content Wrapper -->
        <div class="ms-content-wrapper">
            <div class="row">

                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                    <a href="{{url('admin/order/invoice/'.$or_id)}}" target="_blank" class="btn btn-outline-info d-block float-right" style="margin-bottom: 20px;"><i class="fas fa-file"></i> Print Invoice</a>
                        <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i class="material-icons">home</i> Home</a> </li>
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{ URL::previous() }}">Orders </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Orders Details</li>
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
                            <h4>Order No :- {{$order->order_number}}</h4>
                        </div>
                        <div class="ms-panel-body">
                            <input type="hidden" id="order_id" value="{{$order->id}}">
                            @if (get_user()->role == 'admin')
                            <div class="form-row ">
                                <div class="col-md-6">
                                    <label>Order Current Status :</label>
                                    <div class="input-group">
                                        <select class="form-control" name="current_status" id="current_status" buyer-id="{{$order->buyer_id}}">
                                            <option value="">Select Status</option>
                                            <option value="pending" {{$order->current_status == 'pending'?'selected':''}}>Pending</option>
                                            <option value="valid" {{$order->current_status == 'valid'?'selected':''}}>Valid</option>
                                            <option value="under_review" {{$order->current_status == 'under_review'?'selected':''}}>Under Review</option>
                                            <option value="in_proccess" {{$order->current_status == 'in_proccess'?'selected':''}}>In Proccess</option>
                                            <option value="wait_for_confirmation" {{$order->current_status == 'wait_for_confirmation'?'selected':''}}>Wait for Confirmation</option>
                                            <option value="assigned" {{$order->current_status == 'assigned'?'selected':''}}>Assigned</option>
                                            <option value="accepted" {{$order->current_status == 'accepted'?'selected':''}}>Accepted</option>
                                            <option value="ready" {{$order->current_status == 'ready'?'selected':''}}>Ready</option>
                                            <option value="dispatched" {{$order->current_status == 'dispatched'?'selected':''}}>Dispatched</option>
                                            <option value="completed" {{$order->current_status == 'completed'?'selected':''}}>Completed</option>
                                            <option value="rejected" {{$order->current_status == 'rejected'?'selected':''}}>Rejected</option>
                                            <option value="cancelled" {{$order->current_status == 'cancelled'?'selected':''}}>Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Order Payment Status :</label>
                                    <div class="input-group">
                                        <select class="form-control" name="payment_status" id="payment_status">
                                            <option value="">Select Status</option>
                                            <option value="awaiting_payment" {{$order->payment_status == 'awaiting_payment'?'selected':''}}>Awaiting Payment</option>
                                            <option value="payment_received" {{$order->payment_status == 'payment_received'?'selected':''}}>Payment Received</option>
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
                                            <option value="{{$blood_collection_boy->id}}" {{$order->blood_collection_boy_id == $blood_collection_boy->id?'selected':''}}>{{$blood_collection_boy->user_name}}</option>
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
                                            <option value="assigned" {{$order->collection_boy_status == 'assigned'?'selected':''}}>Assigned</option>
                                            <option value="accepted" {{$order->collection_boy_status == 'accepted'?'selected':''}}>Accepted</option>
                                            <option value="rejected" {{$order->collection_boy_status == 'rejected'?'selected':''}}>Rejected</option>
                                            <option value="collected" {{$order->collection_boy_status == 'collected'?'selected':''}}>Collected</option>
                                            <option value="to_the_lab" {{$order->collection_boy_status == 'to_the_lab'?'selected':''}}>To The Lab</option>
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
                                                    <option value="{{$vendor->id}}" {{$order->lab_partner_id == $vendor->id?'selected':''}}>{{$vendor->user_name}}</option>
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
                                            <option value="accepted" {{$order->lab_partner_status == 'accepted'?'selected':''}}>Accepted</option>
                                            <option value="sample_received" {{$order->lab_partner_status == 'sample_received'?'selected':''}}>Sample Received</option>
                                            <option value="in_progress" {{$order->lab_partner_status == 'in_progress'?'selected':''}}>In Progress</option>
                                            <option value="report_generated" {{$order->lab_partner_status == 'report_generated'?'selected':''}}>Report Generated</option>
                                        </select>
                                    </div>
                                </div>

                                @endif
                                @if (get_user()->role == 'vendor')
                                <div class="col-md-6">
                                    <form action="{{url('admin/lab-partner-report-upload')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="order_id" name="order_id" value="{{$order->id}}">
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
                                        @if (!empty($order->lab_partner_report))
                                            <embed src="{{url('')}}/upload/lab_partner_report/{{$order->lab_partner_report}}"   height="300px" width="100%" class="responsive">
                                            <a href="{{url('')}}/upload/lab_partner_report/{{$order->lab_partner_report}}" target="_blank" class="btn btn-primary">Report Download</a>
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
                                        <p class="text-capitalize">{{ $order_shipping->fullname }}</p>
                                    </div>
                                    <div class="display-flex">
                                        <h6 class="mb-1">Email : </h6>
                                        <p class="text-capitalize">{{$order_shipping->email}}</p>
                                    </div>
                                    <div class="display-flex">
                                        <h6 class="mb-1">Phone Number : </h6>
                                        <P class="text-capitalize">{{ $order_shipping->contact_number }}</P>
                                    </div>
                                    <div class="display-flex">
                                        <h6 class="mb-1">Address : </h6>
                                        <p class="text-capitalize">{{ $order_shipping->address}}</p>
                                    </div>
                                    <div class="display-flex">
                                        <h6 class="mb-1">State : </h6>
                                        <p class="text-capitalize">{{ $order_shipping->state }}</p>
                                    </div>
                                    <div class="display-flex">
                                        <h6 class="mb-1">City : </h6>
                                        <p class="text-capitalize">{{ $order_shipping->city }}</p>
                                    </div>
                                    <div class="display-flex">
                                        <h6 class="mb-1">Zip Code : </h6>
                                        <p class="text-capitalize">{{ $order_shipping->zip }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="strong mb-0">Payment Status </h4>
                                    <hr>
                                    <div class="display-flex">
                                        <h6>Payment Method : </h6>
                                        <p class="text-capitalize">{{ $order->payment_method=='cash_on_delivery'?'Cash On Delivery':'Online'}}</p>
                                    </div>
                                    <div class="display-flex">
                                        <h6>Payment Status :</h6>
                                        @if ($order->payment_status=='awaiting_payment')
                                            <p class="text-capitalize">Awaiting Payment</p>
                                        @endif
                                        @if ($order->payment_status=='payment_received')
                                            <p class="text-capitalize">Payment Received</p>
                                        @endif
                                    </div>
                                    <div class="display-flex">
                                        <h6>Updated : </h6>
                                        <p class="text-capitalize">{{ time_ago($order->updated_date) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Items --}}
                <div class=" col-md-12">
                    <div class="ms-panel">
                        <div class="ms-panel-body">
                            <div class="ms-invoice-table table-responsive mt-2">
                                <table class="table table-hover text-right thead-light">
                                    <h4 class="strong">Product </h4>
                                    <thead>
                                        <tr>
                                            <th class="text-center w-5">Id</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Updated</th>
                                            {{-- <th class="text-center">Options</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order_items as $items)
                                        <tr>
                                            <td class="text-center">{{ $items->id }}</td>
                                            <td class="text-center">{{ $items->item_title }}</td>
                                            <td class="text-center">{{ $items->item_price }}</td>
                                            <td class="text-center">{{ $items->order_status }}</td>
                                            <td class="text-center">{{ $items->updated_date }}</td>
                                            {{-- <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-info option_btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height:30px; padding-top: 4px;">
                                                    Select an option
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-15"><i class="fas fa-edit"></i>Update Order Status</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4">Sub Total: </th>
                                            <td class="text-center">₹{{$order->price_subtotal}}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Discount: </th>
                                            <td class="text-center">{{$order->coupons_discount}}%</td>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Total Amount: </th>
                                            <td class="text-center">₹{{$order->price_total}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


<!-- Model -->
<div class="modal fade" id="modal-15" tabindex="-1" role="dialog" aria-labelledby="modal-15">
    <div class="modal-dialog modal-dialog-centered modal-max" role="document">
        <div class="modal-content">

        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h1>Update Order Status</h1>
            <label>Status</label>
            <div class="input-group">
                <select name="order_status" class="form-control">
                    <option value="awaiting_payment">Awaiting Payment</option>
                    <option value="payment_received">Payment Received</option>
                    <option value="order_processing" selected="">Order Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="completed">Completed</option>
                    <option value="refund_approved">Refund Approved</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-primary shadow-none" data-dismiss="modal">Continue</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
        </div>

        </div>
    </div>
</div>
<!-- ------ -->

<script>
    $(document).ready(function(){
        var base_url = window.location.origin;
        var order_id = $('#order_id').val();
        // current_status
        $("#current_status").change(function(){
            var current_status = $(this).val();
            var buyer_id = $(this).attr('buyer-id')
            // console.log(buyer_id)
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
                                'order_id':order_id,
                                "buyer_id":buyer_id
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
        })
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
        })
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
    })
</script>
@endsection








