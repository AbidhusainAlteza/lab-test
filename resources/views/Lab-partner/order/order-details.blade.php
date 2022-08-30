@include('Lab-partner.partials.header')
       <!-- Body Content Wrapper -->
       <div class="ms-content-wrapper">
           <div class="row">
            @include('flash_message')

               <div class="col-md-12">
                   <nav aria-label="breadcrumb">
                   {{-- <a href="{{url('admin/order/invoice/'.$or_id)}}" target="_blank" class="btn btn-outline-info d-block float-right" style="margin-bottom: 20px;"><i class="fas fa-file"></i> Print Invoice</a> --}}
                       <ol class="breadcrumb breadcrumb-arrow has-gap first-rounded">
                       <li class="breadcrumb-item" aria-current="page"> <a href="{{url('lab-partner-dashboard')}}"><i class="material-icons">home</i> Home</a> </li>
                       <li class="breadcrumb-item" aria-current="page"> <a href="{{url('lab-partner/order')}}">Orders </a></li>
                       <li class="breadcrumb-item active" aria-current="page">Orders Details</li>
                       </ol>
                   </nav>
               </div>
               {{-- Order Current Status  --}}
               <div class=" col-md-12">
                   <div class="ms-panel">
                       <div class="ms-panel-header">
                           <h4>Order Id :- {{$order->order_number}}</h4>
                       </div>
                       <div class="ms-panel-body">
                           <form action="{{url('lab-partner-report-upload')}}" method="POST" enctype="multipart/form-data"  autocomplate="off" >
                               @csrf
                               <input type="hidden" id="order_id" name="order_id" value="{{$order->id}}">
                               <div class="form-row ">
                                    <div class="col-md-4">
                                        <label>Status :</label>
                                        <div class="input-group">
                                            <select class="form-control" name="lab_partner_status" id="lab_partner_status">
                                                <option value="">Select Status</option>
                                                <option value="accepted" {{$order->lab_partner_status == 'accepted'?'selected':''}}>Accepted</option>
                                                <option value="sample_received" {{$order->lab_partner_status == 'sample_received'?'selected':''}}>Sample Received</option>
                                                <option value="in_progress" {{$order->lab_partner_status == 'in_progress'?'selected':''}}>In Progress</option>
                                                <option value="report_generated" {{$order->lab_partner_status == 'report_generated'?'selected':''}}>Report Generated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Report Upload : <span>MAX size 5MB</span></label>
                                        <div class="input-group">
                                            <input type="file" name="lab_file_upload" id="lab_file_upload" class="form-control p-1">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-4">
                                        <label></label>
                                        <button type="submit" class="btn btn-primary" id="report_upload">Submit</button>
                                    </div>
                                </div>
                           </form>
                           <div class="form-row">
                            <div class="col-md-6">
                                <label>Report :</label>
                                <div class="imput-group">
                                    @if (!empty($order->lab_partner_report))
                                    <embed src="{{url('')}}/upload/lab_partner_report/{{$order->lab_partner_report}}"   height="300px" width="100%" class="responsive">
                                        <a href="{{url('')}}/upload/lab_partner_report/{{$order->lab_partner_report}}" target="_blank" class="btn btn-primary">Download</a>
                                    @endif
                                </div>
                            </div>
                           </div>
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
                                       <p class="text-capitalize">{{$order->payment_status=='awaiting_payment'?'Awaiting Payment':'Payment Done'}}</p>
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
                                           <th class="text-center">Updated</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach($order_items as $items)
                                       <tr>
                                           <td class="text-center">{{ $items->id }}</td>
                                           <td class="text-center">{{ $items->item_title }}</td>
                                           <td class="text-center">{{ $items->item_price }}</td>
                                           <td class="text-center">{{ $items->updated_date }}</td>
                                       </tr>
                                       @endforeach
                                   </tbody>
                                   <tfoot>
                                       <tr>
                                           <th colspan="3">Sub Total: </th>
                                           <td style="width:26%; padding-right:15%;">{{$order->price_subtotal}}</td>
                                       </tr>
                                       <tr>
                                           <th colspan="3">Discount : </th>
                                           <td style="width:26%; padding-right:15%;">{{$order->coupons_discount}}</td>
                                       </tr>
                                       <tr>
                                           <th colspan="3">Total Amount: </th>
                                           <td style="width:26%; padding-right:15%;">{{$order->price_total}}</td>
                                       </tr>
                                   </tfoot>
                               </table>
                           </div>

                       </div>
                   </div>
               </div>
           </div>
       </div>


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
@include('Lab-partner.partials.footer')
<script>
  $(document).ready(function(){
        var base_url = window.location.origin;
        var order_id = $('#order_id').val();
        // lab partner status
        $('#lab_partner_status').change(function(){
            var lab_partner_status = $(this).val();
            console.log(order_id)
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
                            url:base_url+'/lab-partner-status',
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
                swal('Please Enter Doctor Name');
            }
        });
    });
</script>









