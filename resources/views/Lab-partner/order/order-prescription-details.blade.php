@include('Lab-partner.partials.header')

    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper box">
        <div class="row">
            <div  class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-arrow has-gap first-rounded">
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{url('lab-partner-dashboard')}}"><i
                                    class="material-icons">home</i> Home</a> </li>
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{url('lab-partner/order')}}">Order</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                @include('flash_message')
            </div>
            <div class=" col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h4>Order Details :- {{$orders->order_number}}</h4>
                    </div>
                    <div class="ms-panel-body">
                        <form action="{{url('lab-partner-report-upload')}}" method="POST" enctype="multipart/form-data" autocomplate="off" >
                            @csrf
                            <input type="hidden" id="order_id" name="order_id" value="{{$orders->id}}">
                            <div class="form-row ">
                                <div class="col-md-4">
                                    <label>Status :</label>
                                    <div class="input-group">
                                        <select class="form-control" name="lab_partner_status" id="lab_partner_status">
                                            <option value="">Select Status</option>
                                            <option value="accepted" {{$orders->lab_partner_status == 'accepted'?'selected':''}}>Accepted</option>
                                            <option value="sample_received" {{$orders->lab_partner_status == 'sample_received'?'selected':''}}>Sample Received</option>
                                            <option value="in_progress" {{$orders->lab_partner_status == 'in_progress'?'selected':''}}>In Progress</option>
                                            <option value="report_generated" {{$orders->lab_partner_status == 'report_generated'?'selected':''}}>Report Generated</option>
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
                                    @if (!empty($orders->lab_partner_report))
                                    <embed src="{{url('')}}/upload/lab_partner_report/{{$orders->lab_partner_report}}"   height="300px" width="100%" class="responsive">
                                        <a href="{{url('')}}/upload/lab_partner_report/{{$orders->lab_partner_report}}" target="_blank" class="btn btn-primary">Download</a>
                                    @endif
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
@include('Lab-partner.partials.footer')
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






