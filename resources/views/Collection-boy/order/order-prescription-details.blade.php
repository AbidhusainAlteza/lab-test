@include('Collection-boy.partials.header')

    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper box">
        <div class="row">
            <div  class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-arrow has-gap first-rounded">
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{url('collection-boy-dashboard')}}"><i
                                    class="material-icons">home</i> Home</a> </li>
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{url('collection-boy/order')}}">Order</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
            <div class=" col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h4>Order Details :- {{$orders->order_number}}</h4>
                    </div>
                    <div class="ms-panel-body">
                        <form method="" autocomplate="off" >
                            @csrf
                            <input type="hidden" id="order_id" value="{{$orders->id}}">
                            <div class="form-row ">
                                <div class="col-md-4">
                                    <label>Status :</label>
                                    <div class="input-group">
                                        <select class="form-control" name="collection_boy_status" id="collection_boy_status">
                                            <option value="">Select Status</option>
                                            <option value="assigned" {{$orders->collection_boy_status == 'assigned'?'selected':''}}>Assigned</option>
                                            <option value="accepted" {{$orders->collection_boy_status == 'accepted'?'selected':''}}>Accepted</option>
                                            <option value="rejected" {{$orders->collection_boy_status == 'rejected'?'selected':''}}>Rejected</option>
                                            <option value="collected" {{$orders->collection_boy_status == 'collected'?'selected':''}}>Collected</option>
                                            <option value="to_the_lab" {{$orders->collection_boy_status == 'to_the_lab'?'selected':''}}>To The Lab</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                {{-- <div class="col-md-6">
                                    <label>Refer Blood Collect Boy :</label>
                                    <div class="input-group">
                                        <select class="form-control " name="blood_collection_boy" id="blood_collection_boy">
                                            <option>Select Blood Collect Boy</option>
                                            @foreach ($blood_collection_boys as $blood_collection_boy)
                                                <option value="{{$blood_collection_boy->id}}" {{$orders->blood_collection_boy_id == $blood_collection_boy->id?'selected':''}}>{{$blood_collection_boy->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-6">
                                    <label>Refer by Lab Partner :</label>
                                    <div class="input-group">
                                        <select class="form-control" name="lab_partner" id="lab_partner">
                                            <option>Select Lab Partner</option>
                                            @foreach ($lab_partners as $lab_partner)
                                                <option value="{{$lab_partner->id}}" {{$orders->lab_partner_id == $lab_partner->id?'selected':''}}>{{$lab_partner->lab_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                            </div>
                        </form>
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
                                                <input type="number" name="prescription_discount" class="form-control prescription_discount" value="{{$orders->coupons_discount}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('Collection-boy.partials.footer')
<script>
    // labtest
    $(document).ready(function(){
        getTotalPrice();
        prescription_total_price();
        discount();
        $('.no_data').show();
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

    });

    function getPackageTotalPrice() {
        var total = 0;
        $(".package_price").each(function() {
            var val = $(this).val();
            total += isNaN(val) || $.trim(val)=="" ? 0 : parseFloat(val);
        });
        $('.package_total_amount').val(total);
    }
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






