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
            <div class="row order-tab">
                <div class="col-md-4 col-sm-12">
                    @include('setting.setting_tab')
                </div>
                <div class="col-md-8 col-sm-12">
                    <table id="order-table" class="table w-100 thead-primary">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Prescription</th>
                                <th>Date</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>#{{$order->order_number}}</td>
                                <td>{{$order->price_total}}</td>
                                @if($order->payment_status == 'awaiting_payment')
                                <td>Awaiting Payment</td>
                                @else
                                <td>Payment Received</td>
                                @endif

                                {{-- status --}}
                                @if($order->current_status == 'pending')
                                <td>Pending</td>
                                @endif
                                @if($order->current_status == 'valid')
                                <td>Valid</td>
                                @endif
                                @if($order->current_status == 'under_review')
                                <td>Under Review</td>
                                @endif
                                @if($order->current_status == 'in_proccess')
                                <td>In Proccess</td>
                                @endif
                                @if($order->current_status == 'wait_for_confirmation')
                                <td>Wait For Confirmation</td>
                                @endif
                                @if($order->current_status == 'assigned')
                                <td>Assigned</td>
                                @endif
                                @if($order->current_status == 'accepted')
                                <td>Accepted</td>
                                @endif
                                @if($order->current_status == 'ready')
                                <td>Ready</td>
                                @endif
                                @if($order->current_status == 'dispatched')
                                <td>Dispatched</td>
                                @endif
                                @if($order->current_status == 'completed')
                                <td>Completed</td>
                                @endif
                                @if($order->current_status == 'rejected')
                                <td>Rejected</td>
                                @endif
                                @if($order->current_status == 'cancelled')
                                <td>Cancelled</td>
                                @endif
                                @if($order->prescription == 1)
                                    <td>Yes</td>
                                @else
                                    <td>No</td>
                                @endif
                                <td>{{format_date($order->added_date)}}</td>
                                @if($order->prescription == 1)
                                    <td><a href="{{url('prescription-order-details')}}/{{$order->order_number}}" class="btn btn-sm btn-table-info">Details</a></td>
                                @else
                                    <td><a href="{{url('order-details')}}/{{$order->order_number}}" class="btn btn-sm btn-table-info">Details</a></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>



<!-- main-area-end -->
@include ('partials.footer')
