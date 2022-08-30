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
                    <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                    <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i class="material-icons">home</i> Home</a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-xl-3 col-md-3">
                        <a href="javascript:void(0)" class="admin_allorder_get_data">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">shopping_cart_checkout</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">All Orders</h6>
                                <h6>{{$admin_allorder}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-3">
                        <a href="javascript:void(0)" class="admin_pending_order_get_data">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">shopping_cart_checkout</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Pending Orders</h6>
                                <h6>{{$admin_pending_order}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-3">
                        <a href="javascript:void(0)" class="admin_completed_order_get_data">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">shopping_cart_checkout</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Completed Orders</h6>
                                <h6>{{$admin_completed_order}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-3">
                        <a href="javascript:void(0)" class="admin_prescription_order_get_data">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">shopping_cart_checkout</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Prescription Order</h6>
                                <h6>{{$admin_prescription_order}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                @include ('flash_message')
            </div>
            <div class="col-12">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h6>Order List</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-hover thead-primary admin-order-table">
                                <thead>
                                    <tr>
                                        <th>Order No</th>
                                        <th>User Name</th>
                                        <th>Address</th>
                                        <th>Prescription</th>
                                        <th>Payable</th>
                                        <th>Payment Method</th>
                                        <th>Order Date</th>
                                        <th>Current Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order_array as $order)
                                    <tr>
                                        @if($order->prescription == 1)
                                            {{-- <a class="dropdown-item" href="{{url('admin/order/order-prescription-details/'.$order->id)}}"><i class="fas fa-info"></i>View Details</a> --}}
                                            <th><a href="{{ URL::asset('admin/order/order-prescription-details/'.$order->id)}}">{{ $order->order_number}}</a></th>
                                        @else
                                            <th><a href="{{ URL::asset('admin/order/order-details/'.$order->id)}}">{{ $order->order_number}}</a></th>
                                        @endif
                                        <td class="text-capitalize">{{$order->fullname}}</td>
                                        <td class="text-capitalize">{{ $order->address}}</td>
                                        <th>{{ $order->prescription == 1 ? 'Yes':'No'}}</th>
                                        <td>{{ $order->price_total}}</td>
                                        <td>{{ $order->payment_method == 'cash_on_delivery'?'Cash On Delivery':'Online Payment' }}</td>
                                        <th>{{ $order->added_date}}</th>

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
                                        <td>
                                            <a href="javascript:void(0)" class="admin-order-delete" data-id="{{$order->id}}"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script_js')
    <script src="{{ URL::asset('admin/js/admin_order.js') }}"></script>
@endsection

