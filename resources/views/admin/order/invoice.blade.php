<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('admin/css/style.css') }}">
    </head>

    <body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">
        <!-- Main Content -->
        <main class="body-content">
            <!-- Body Content Wrapper -->
            <div class="ms-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="container-invoice">
                            <div id="content" class="card">
                                <div class="card-body invoice p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 style="text-align: center; font-size: 36px;font-weight: 400;margin-top: 20px;">Invoice</h1>
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 45px 30px;">
                                        <div class="col-6">
                                            <div class="logo">
                                                <!-- <img src="https://modesy.codingest.com/assets/img/logo.svg" alt="logo"> -->
                                                <h2>Logo</h2>
                                            </div>
                                            <div>
                                                3111 Camino Del Rio N Suite 400 San Diego                                
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="float-right">
                                                <p class="font-weight-bold mb-1"><span style="display: inline-block;width: 100px;">Invoice:</span>#10357</p>
                                                <p class="font-weight-bold"><span style="display: inline-block;width: 100px;">Date:</span>26 April 2022</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="padding: 45px 30px;">
                                        <div class="col-6">
                                            <p class="font-weight-bold mb-3">Client Information</p>
                                            <p class="mb-1">{{ $order_shipping->fullname }}</p>
                                            <p class="mb-1">{{ $order_shipping->email }}</p>
                                            <p class="mb-1">{{ $order_shipping->address }}</p>
                                            <p class="mb-1">{{ $order_shipping->city }}, {{ $order_shipping->state }}</p>
                                            <p class="mb-1">{{ $order_shipping->contact_number }}</p>
                                        </div>
                                        <div class="col-6">
                                            <div class="float-right">
                                                <p class="font-weight-bold mb-3">Payment Details</p>
                                                <p class="mb-1"><span style="display: inline-block;min-width: 158px;">Payment Status:</span>{{ $order->payment_status }}</p>
                                                <p class="mb-1"><span style="display: inline-block;min-width: 158px;">Payment Method:</span>{{ $order->payment_method }}</p>
                                                <!-- <p class="mb-1"><span style="display: inline-block;min-width: 158px;">Currency:</span>USD</p> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-4">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-0 font-weight-bold">Seller</th>
                                                            <th class="border-0 font-weight-bold">Product Id</th>
                                                            <th class="border-0 font-weight-bold">Description</th>
                                                            <th class="border-0 font-weight-bold">Quantity</th>
                                                            <th class="border-0 font-weight-bold">Unit Price</th>
                                                            <th class="border-0 font-weight-bold">VAT</th>
                                                            <th class="border-0 font-weight-bold">Total</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach($order_items as $items)
                                                    <tbody>
                                                        <tr style="font-size: 15px;">
                                                            <td>admin</td>
                                                            <td>{{ $items->id}}</td>
                                                            <td>{{ $items->item_title }}</td>
                                                            <td>1</td>
                                                            <td style="white-space: nowrap"><span>Rs. </span>{{ $items->item_price }}</td>
                                                            <td style="white-space: nowrap"></td>
                                                            <td style="white-space: nowrap"><span>Rs. </span>{{ $items->item_price }}</td>
                                                        </tr>
                                                    </tbody>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="order-total float-right">
                                                <div class="row mb-2">
                                                    <div class="col-6 col-left">
                                                        Subtotal                                        
                                                    </div>
                                                    <div class="col-6 col-right">
                                                        <strong class="font-600"><span>Rs. </span>500</strong>
                                                    </div>
                                                </div>
                                                    <div class="row mb-2">
                                                        <div class="col-6 col-left">
                                                            Shipping                                            
                                                        </div>
                                                        <div class="col-6 col-right">
                                                            <strong class="font-600"><span>Rs. </span>80</strong>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-6 col-left">
                                                            Total                                        
                                                        </div>
                                                    <div class="col-6 col-right">
                                                        <strong class="font-600"><span>Rs. </span>580</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    body {
                                        font-size: 16px !important;
                                    }

                                    .logo img {
                                        width: 160px;
                                        height: auto;
                                    }

                                    .container-invoice {
                                        max-width: 900px;
                                        margin: 0 auto;
                                    }

                                    table {
                                        border-bottom: 1px solid #dee2e6;
                                    }

                                    table th {
                                        font-size: 14px;
                                        white-space: nowrap;
                                    }

                                    .order-total {
                                        width: 400px;
                                        max-width: 100%;
                                        float: right;
                                        padding: 20px;
                                    }

                                    .order-total .col-left {
                                        font-weight: 600;
                                    }

                                    .order-total .col-right {
                                        text-align: right;
                                    }

                                    #btn_print {
                                        min-width: 180px;
                                    }

                                    @media print {
                                        .hidden-print {
                                            display: none !important;
                                        }
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>  

                <div class="row">
                    <div class="col-12 text-center mt-3">
                        <button id="btn_print" class="btn btn-secondary btn-md hidden-print">
                            <svg id="i-print" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" style="margin-top: -4px;">
                                <path d="M7 25 L2 25 2 9 30 9 30 25 25 25 M7 19 L7 30 25 30 25 19 Z M25 9 L25 2 7 2 7 9 M22 14 L25 14"></path>
                            </svg>
                            &nbsp;&nbsp;Print</button>
                    </div>
                </div>
            </div> 
        </main>
    </body>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script>
        $(document).on('click', '#btn_print', function () {
            window.print();
        });

    </script>

</html>