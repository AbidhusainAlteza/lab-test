@include('Collection-boy.partials.header')
       <!-- Body Content Wrapper -->
       <div class="ms-content-wrapper">
           <div class="row">
               @if($errors-> any())
                   <div style="color:red;">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
               @endif

               <div class="col-md-12">
                   <nav aria-label="breadcrumb">
                   {{-- <a href="{{url('admin/order/invoice/'.$or_id)}}" target="_blank" class="btn btn-outline-info d-block float-right" style="margin-bottom: 20px;"><i class="fas fa-file"></i> Print Invoice</a> --}}
                       <ol class="breadcrumb breadcrumb-arrow has-gap first-rounded">
                       <li class="breadcrumb-item" aria-current="page"> <a href="{{url('collection-boy-dashboard')}}"><i class="material-icons">home</i> Home</a> </li>
                       <li class="breadcrumb-item" aria-current="page"> <a href="{{url('collection-boy/order')}}">Orders </a></li>
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
                           <form method="" autocomplate="off" >
                               @csrf
                               <input type="hidden" id="order_id" value="{{$order->id}}">
                               <div class="form-row ">
                                <div class="col-md-4">
                                    <label>Status :</label>
                                    <div class="input-group">
                                        <select class="form-control" name="collection_boy_status" id="collection_boy_status">
                                            <option value="">Select Status</option>
                                            <option value="assigned" {{$order->collection_boy_status == 'assigned'?'selected':''}}>Assigned</option>
                                            <option value="accepted" {{$order->collection_boy_status == 'accepted'?'selected':''}}>Accepted</option>
                                            <option value="rejected" {{$order->collection_boy_status == 'rejected'?'selected':''}}>Rejected</option>
                                            <option value="collected" {{$order->collection_boy_status == 'collected'?'selected':''}}>Collected</option>
                                            <option value="to_the_lab" {{$order->collection_boy_status == 'to_the_lab'?'selected':''}}>To The Lab</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                           </form>
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
@include('Collection-boy.partials.footer')
<script>
  $(document).ready(function(){
        var base_url = window.location.origin;
        var order_id = $('#order_id').val();
        // refer doctor
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
                            url:base_url+'/collection-boy-status',
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
        })
    })
</script>









