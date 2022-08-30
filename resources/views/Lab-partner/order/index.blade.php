@include('Lab-partner.partials.header')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-arrow has-gap first-rounded">
                <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i class="material-icons">home</i> Home</a> </li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </nav>
        </div>

        <div class="col-12">
            <div class="ms-panel">
                <div class="ms-panel-header">
                    <h6>Order List</h6>
                </div>

                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table id="data_table" class="table table-hover thead-primary">
                            <thead>
                                <tr>
                                    <th>Order No</th>
                                    <th>City</th>
                                    <th>Prescription</th>
                                    <th>Payable</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    @if($order->prescription == 1)
                                        {{-- <a class="dropdown-item" href="{{url('admin/order/order-prescription-details/'.$order->id)}}"><i class="fas fa-info"></i>View Details</a> --}}
                                        <th><a href="{{ URL::asset('lab-partner/order/order-prescription-details/'.$order->id)}}">{{ $order->order_number}}</a></th>
                                    @else
                                        <th><a href="{{ URL::asset('lab-partner/order/order-details/'.$order->id)}}">{{ $order->order_number}}</a></th>
                                    @endif
                                    {{-- <th><a href="{{ URL::asset('admin/order/order-details/'.$order->id)}}">{{ $order->order_number}}</a></th> --}}
                                    <td class="text-capitalize">{{ $order->city}}</td>
                                    <th>{{ $order->prescription == 1 ? 'Yes':'No'}}</th>
                                    <td>{{ $order->price_total}}</td>
                                    <th>{{ $order->added_date}}</th>

                                    @if ($order->lab_partner_status == '')
                                    <td class="text-capitalize">Panding</td>
                                    @endif
                                    @if ($order->lab_partner_status == 'accepted')
                                    <td class="text-capitalize">Accepted</td>
                                    @endif
                                    @if ($order->lab_partner_status == 'sample_received')
                                    <td class="text-capitalize">Sample Received</td>
                                    @endif
                                    @if ($order->lab_partner_status == 'in_progress')
                                    <td class="text-capitalize">In Progress</td>
                                    @endif
                                    @if ($order->lab_partner_status == 'report_generated')
                                    <td class="text-capitalize">Report Generated</td>
                                    @endif
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

@include('Lab-partner.partials.footer')
