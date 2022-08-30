@include('partials.header')
<main>
    <div class="breadcrumb-area breadcrumb-bg-two">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- shop-details-area -->
    <section class="shop-details-area pt-20 pb-20">
        <div class="container custom-container">
            <div class="row ">
                <div class="col-md-4 col-sm-12 order-tab">
                    @include('setting.setting_tab')
                </div>
                <div class="col-md-8 col-sm-12 order_details">
                    <div class="col-12 order_details_number ">
                        <h3>Order:#{{$orders->order_number}}</h3>
                    </div>
                    <div class="col-12">
                        <div class="row order-row-item">
                            <div class="col-3">
                                <span class="lable">Status</span>
                            </div>
                            <div class="col-9">
                                {{-- status --}}
                                @if($orders->current_status == 'pending')
                                <span class="lable">Pending</span>
                                @endif
                                @if($orders->current_status == 'valid')
                                <span class="lable">Valid</span>
                                @endif
                                @if($orders->current_status == 'under_review')
                                <span class="lable">Under Review</span>
                                @endif
                                @if($orders->current_status == 'in_proccess')
                                <span class="lable">In Proccess</span>
                                @endif
                                @if($orders->current_status == 'wait_for_confirmation')
                                <span class="lable">Wait For Confirmation</span>
                                @endif
                                @if($orders->current_status == 'assigned')
                                <span class="lable">Assigned</span>
                                @endif
                                @if($orders->current_status == 'accepted')
                                <span class="lable">Accepted</span>
                                @endif
                                @if($orders->current_status == 'ready')
                                <span class="lable">Ready</span>
                                @endif
                                @if($orders->current_status == 'dispatched')
                                <span class="lable">Dispatched</span>
                                @endif
                                @if($orders->current_status == 'completed')
                                <span class="lable">Completed</span>
                                @endif
                                @if($orders->current_status == 'rejected')
                                <span class="lable">Rejected</span>
                                @endif
                                @if($orders->current_status == 'cancelled')
                                <span class="lable">Cancelled</span>
                                @endif
                                <a href="{{url('prescription-invoice')}}/{{$orders->order_number}}" target="_blank"class="btn btn-sm  float-right _header_btn">
                                    <i class="fa-solid fa-file-invoice"></i>&nbsp;View Invoice</a>
                            </div>
                        </div>
                        <div class="row order-row-item">
                            <div class="col-3">
                                <span class="lable">Payment Status</span>
                            </div>
                            <div class="col-9">
                                @if($orders->payment_status == 'awaiting_payment')
                                <span class="lable">Awaiting Payment</span>
                                @endif
                                @if($orders->payment_status == 'payment_received')
                                <span class="lable">Payment Received</span>
                                @endif
                                {{-- report --}}
                                @if (!empty($orders->lab_partner_report))
                                    <a href="{{url('')}}/upload/lab_partner_report/{{$orders->lab_partner_report}}" target="_blank" class="btn btn-sm  float-right _header_btn"><i class="fa-solid fa-book-medical"></i> Report</a>
                                @endif
                            </div>
                        </div>
                        <div class="row order-row-item">
                            <div class="col-3">
                                <span class="lable">Payment Method</span>
                            </div>
                            <div class="col-9">
                                @if($orders->payment_method == 'cash_on_delivery')
                                <span class="lable">Cash On Delivery</span>
                                @endif
                            </div>
                        </div>
                        <div class="row order-row-item">
                            <div class="col-3">
                                <span class="lable">Date</span>
                            </div>
                            <div class="col-9">
                                <span class="lable">{{format_date($orders->added_date)}}</span>
                            </div>
                        </div>
                        <div class="row order-row-item">
                            <div class="col-3">
                                <span class="lable">Updated</span>
                            </div>
                            <div class="col-9">
                                <span class="lable">{{ time_ago($orders->updated_date)}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 order_details_number  pt-20">
                        <h3 class="border-0 m-0">Shipping Address</h3>
                    </div>
                    <div class="col-12">
                        <div class="row order-row-item">
                            <div class="col-3">
                                <span class="lable">Full Name</span>
                            </div>
                            <div class="col-9">
                                <span class="lable">{{$orders_shipping->fullname}}</span>
                            </div>
                        </div>
                        <div class="row order-row-item">
                            <div class="col-3">
                                <span class="lable">Phone Number</span>
                            </div>
                            <div class="col-9">
                                <span class="lable">{{$orders_shipping->contact_number}}</span>
                            </div>
                        </div>
                        <div class="row order-row-item">
                            <div class="col-3">
                                <span class="lable">Address</span>
                            </div>
                            <div class="col-9">
                                <span class="lable">{{$orders_shipping->address}}</span>
                            </div>
                        </div>
                        <div class="row order-row-item">
                            <div class="col-3">
                                <span class="lable">State</span>
                            </div>
                            <div class="col-9">
                                <span class="lable">{{$orders_shipping->state}}</span>
                            </div>
                        </div>
                        <div class="row order-row-item">
                            <div class="col-3">
                                <span class="lable">City</span>
                            </div>
                            <div class="col-9">
                                <span class="lable">{{$orders_shipping->city}}</span>
                            </div>
                        </div>
                        <div class="row order-row-item">
                            <div class="col-3">
                                <span class="lable">Zip Code</span>
                            </div>
                            <div class="col-9">
                                <span class="lable">{{$orders_shipping->zip}}</span>
                            </div>
                        </div>
                        <div class="row order-row-item">
                            <div class="col-3">
                                <span class="lable">Message</span>
                            </div>
                            <div class="col-9">
                                <span class="lable">{{$orders_shipping->message}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 order_details_number  pt-20">
                        <h3 class="border-0 m-0">Prescription</h3>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            @php $img = json_decode($orders->prescription_img);  @endphp
                            @for ($i=0; $i < count($img); $i++)
                                <div class="">
                                    <div class="prescription-box">
                                        <div class="prescription-box-shadow">
                                            <img src="{{url('')}}/image/upload-prescription/{{$img[$i]}}" alt="prescription img" class="img_show">
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <table id="order-table" class="table w-100 thead-primary">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Items</th>
                                        <th>Order Price</th>
                                        <th>Order Status</th>
                                        <th>Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($orders_items_prescription_labtests) > 0)
                                        <?php $i= 1; ?>
                                        @foreach($orders_items_prescription_labtests as $orders_items_prescription_labtest)
                                            <tr>
                                                <td class="prescription_row_number"></td>
                                                <td>{{$orders_items_prescription_labtest->item_title}}</td>
                                                <td>₹{{$orders_items_prescription_labtest->item_price}}</td>
                                                {{-- status --}}
                                                @if($orders->current_status == 'pending')
                                                <td>Pending</td>
                                                @endif
                                                @if($orders->current_status == 'valid')
                                                <td>Valid</td>
                                                @endif
                                                @if($orders->current_status == 'under_review')
                                                <td>Under Review</td>
                                                @endif
                                                @if($orders->current_status == 'in_proccess')
                                                <td>In Proccess</td>
                                                @endif
                                                @if($orders->current_status == 'wait_for_confirmation')
                                                <td>Wait For Confirmation</td>
                                                @endif
                                                @if($orders->current_status == 'assigned')
                                                <td>Assigned</td>
                                                @endif
                                                @if($orders->current_status == 'accepted')
                                                <td>Accepted</td>
                                                @endif
                                                @if($orders->current_status == 'ready')
                                                <td>Ready</td>
                                                @endif
                                                @if($orders->current_status == 'dispatched')
                                                <td>Dispatched</td>
                                                @endif
                                                @if($orders->current_status == 'completed')
                                                <td>Completed</td>
                                                @endif
                                                @if($orders->current_status == 'rejected')
                                                <td>Rejected</td>
                                                @endif
                                                @if($orders->current_status == 'cancelled')
                                                <td>Cancelled</td>
                                                @endif
                                                <td>{{time_ago($orders_items_prescription_labtest->updated_date)}}</td>

                                            </tr>
                                        <?php $i++?>
                                        @endforeach
                                    @endif
                                    @if(count($orders_items_prescription_packages) > 0)
                                        <?php $i= 1; ?>
                                        @foreach($orders_items_prescription_packages as $orders_items_prescription_package)
                                            <tr>
                                                <td class="prescription_row_number"></td>
                                                <td>{{$orders_items_prescription_package->item_title}}</td>
                                                <td>₹{{$orders_items_prescription_package->item_price}}</td>
                                                {{-- status --}}
                                                @if($orders->current_status == 'pending')
                                                <td>Pending</td>
                                                @endif
                                                @if($orders->current_status == 'valid')
                                                <td>Valid</td>
                                                @endif
                                                @if($orders->current_status == 'under_review')
                                                <td>Under Review</td>
                                                @endif
                                                @if($orders->current_status == 'in_proccess')
                                                <td>In Proccess</td>
                                                @endif
                                                @if($orders->current_status == 'wait_for_confirmation')
                                                <td>Wait For Confirmation</td>
                                                @endif
                                                @if($orders->current_status == 'assigned')
                                                <td>Assigned</td>
                                                @endif
                                                @if($orders->current_status == 'accepted')
                                                <td>Accepted</td>
                                                @endif
                                                @if($orders->current_status == 'ready')
                                                <td>Ready</td>
                                                @endif
                                                @if($orders->current_status == 'dispatched')
                                                <td>Dispatched</td>
                                                @endif
                                                @if($orders->current_status == 'completed')
                                                <td>Completed</td>
                                                @endif
                                                @if($orders->current_status == 'rejected')
                                                <td>Rejected</td>
                                                @endif
                                                @if($orders->current_status == 'cancelled')
                                                <td>Cancelled</td>
                                                @endif
                                                <td>{{time_ago($orders_items_prescription_package->updated_date)}}</td>

                                            </tr>
                                        <?php $i++?>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td>Sub Total Cost:</td>
                                        <td style="color:#4eb92d"><b>₹{{$orders->price_subtotal}}</b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @if($orders->coupons_discount !== 0)
                                    <tr>
                                        <td></td>
                                        <td>Coupons Discount:</td>
                                        <td style="color: red">{{$orders->coupons_discount}}%</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td></td>
                                        <td>Total Cost:</td>
                                        <td style="color:#4eb92d"><b>₹{{$orders->price_total}}</b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="prescription_img_modal">

    </div>
</main>



<!-- main-area-end -->
@include ('partials.footer')
