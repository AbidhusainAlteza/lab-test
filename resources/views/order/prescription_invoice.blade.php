<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{isset($title)?$title:""}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"> -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/custome.css')}}">
    <style>
    ul {
        list-style: none;
    }
    </style>
</head>

<body>
    <div class="container ">
        <div class="row ">
            <div class="col-12">
                <div class="ms-panel m-3">
                    <div class="ms-panel-header header-mini">
                        <div class="d-flex justify-content-between">
                            <h6>Invoice</h6>
                            <h6>#{{$orders->order_number}}</h6>
                        </div>
                    </div>
                    <div class="ms-panel-body">
                        <!-- Invoice To -->
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="invoice-address">
                                    <h3>Reciever: </h3>
                                    <h5>{{$orders_shipping->fullname}}</h5>
                                    <p class="mb-0">{{$orders_shipping->address}}</p>
                                    <p class="mb-0">City : {{$orders_shipping->city}}</p>
                                    <p class="mb-0">State : {{$orders_shipping->state}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <ul class="invoice-date">
                                    <li>Invoice Date : {{helper_date_format(now())}}</li>
                                    <li>Due Date : {{helper_date_format($orders->added_date)}}</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Invoice Table -->
                        <div class="ms-invoice-table table-responsive mt-5">
                            <table class="table table-hover text-right thead-light">
                            <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Items</th>
                                        <th>Order Status</th>
                                        <th>Order Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($orders_items_prescription_labtests) > 0)
                                    <?php $i= 1; ?>
                                    @foreach($orders_items_prescription_labtests as $orders_items_prescription_labtest)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$orders_items_prescription_labtest->item_title}}</td>
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
                                        <td>₹{{$orders_items_prescription_labtest->item_price}}</td>
                                    </tr>
                                    <?php $i++?>
                                    @endforeach
                                    @endif
                                    @if(count($orders_items_prescription_packages) > 0)
                                    <?php $i= 1; ?>
                                    @foreach($orders_items_prescription_packages as $orders_items_prescription_package)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$orders_items_prescription_package->item_title}}</td>
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
                                        <td>₹{{$orders_items_prescription_package->item_price}}</td>
                                    </tr>
                                    <?php $i++?>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">Sub Total Cost:</td>
                                        <td>₹{{$orders->price_subtotal}}</td>
                                    </tr>
                                    @if($orders->coupons_discount !== null)
                                    <tr>
                                        <td colspan="3">Coupons Discount:</td>
                                        <td style="color: red">{{$orders->coupons_discount}}%</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td colspan="3">Total Cost:</td>
                                        <td>₹{{$orders->price_total}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    @media print {
        .hidden-print {
            display: none !important;
        }
    }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-3">
                <button id="btn_print" class="btn btn-secondary btn-md hidden-print">
                    <svg id="i-print" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16"
                        fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" style="margin-top: -4px;">
                        <path
                            d="M7 25 L2 25 2 9 30 9 30 25 25 25 M7 19 L7 30 25 30 25 19 Z M25 9 L25 2 7 2 7 9 M22 14 L25 14" />
                    </svg>
                    &nbsp;&nbsp;<?php echo trans("print"); ?></button>
            </div>
        </div>
    </div>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script>
    $(document).on('click', '#btn_print', function() {
        window.print();
    });
    </script>
</body>

</html>
