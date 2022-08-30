@php
    $keys  = parse_url(url()->current());
    $path = explode("/", $keys['path']);
    $base_url_2 = end($path);
// user active
    $user_active_a = "";
    $user_active_ul = "";
    if($base_url_2 == 'administrator' || $base_url_2 == 'vendor' ||$base_url_2 == 'customer'){
        $user_active_a = "active";
        $user_active_ul = "show";
    }
// lab test active
    $lab_test_active_a = "";
    $lab_test_active_ul = "";
    if($base_url_2 == 'health-concern' || $base_url_2 == 'lab-test-manage'){
        $lab_test_active_a = "active";
        $lab_test_active_ul = "show";
    }
// package test active
    $package_active_a = "";
    $package_active_ul = "";
    if($base_url_2 == 'package-type' || $base_url_2 == 'packages'){
        $package_active_a = "active";
        $package_active_ul = "show";
    }
// offers active
    $offers_active_a = "";
    $offers_active_ul = "";
    if($base_url_2 == 'offer-type' || $base_url_2 == 'offers'){
        $offers_active_a = "active";
        $offers_active_ul = "show";
    }
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{isset($title)?$title:"Lab Test admin"}}</title>
    <link rel="canonical" href="{{ url(Request::url()) }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('admin/img/favicon.ico') }}">

    <!-- Iconic Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('admin/vendors/iconic-fonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/vendors/iconic-fonts/flat-icons/flaticon.css') }}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/custome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/style.css') }}">

    <!-- CKeditor -->
    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script> --}}
    {{-- <link rel="stylesheet" href="{{ URL::asset('admin/js/jquery-3.1.1.min.js') }}"> --}}
    <script src="{{ URL::asset('admin/js/jquery-3.5.0.min.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">

    <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
    <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>

    <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
        <!-- Logo -->
        <div class="row">
            <div class="col-12 logo_col_color">
                <a class="pl-0 ml-0 text-center" href="{{ URL::asset('dashboard') }}">
                    <div class="logo_des">
                        <div class="p-1">
                             {{-- {{ get_user()->avatar; }} --}}
                            <img src="{{ URL('image/avatar')}}/{{ get_user()->avatar;}}" alt="logo" class="logo_img">
                        </div>
                        <h5 class="m-0 p-0">{{ ucwords(get_user()->user_name)}}</h5>
                    </div>
                </a>

            </div>
        </div>
{{-- @php var_dump(session('email'));die; @endphp --}}
        <!-- Navigation -->
        <ul class="page accordion ms-main-aside fs-14" id="side-nav-accordion">
            <!-- Dashboard -->
            <li class="menu-item">
                <a href="{{ URL::asset('dashboard') }}"> <span><i class="fas fa-home fs-16"></i>Dashboard </span></a>
            </li>
            <!-- Dashboard -->
            @if (get_user()->role == 'admin')
            <!-- user -->
            <li class="menu-item">
                <a href="#" class="has-chevron {{$user_active_a}}" data-toggle="collapse" data-target="#user" aria-expanded="false" aria-controls="user">
                    <span><i class="fas fa-user-friends fs-16"></i>users </span>
                </a>
                <ul id="user" class="collapse sub-menu {{$user_active_ul}}" aria-labelledby="user" data-parent="#side-nav-accordion" style="">
                    <li><a href="{{url('admin/administrator')}}"><i class="fas fa-user fs-16"></i>Administrators </a></li>
                    <li><a href="{{url('admin/vendor')}}"><i class="fas fa-user-friends fs-16"></i>Vendor </a></li>
                    <li><a href="{{url('admin/customer')}}"><i class="fas fa-users fs-16"></i>Customer </a></li>
                </ul>
            </li>
            <!-- end user -->
            <!-- Appointment -->
            {{-- <li class="menu-item">
                <a href="#" class="has-chevron" data-toggle="collapse" data-target="#appointment" aria-expanded="false" aria-controls="appointment">
                    <span><i class="fa fa-calendar-check fs-16"></i>Appointment </span>
                </a>
                <ul id="appointment" class="collapse sub-menu" aria-labelledby="appointment" data-parent="#side-nav-accordion" style="">
                    <li><a href="{{ URL::asset('admin/blood-collection-boy') }}"><i class="fas fa-vial fs-16"></i>Blood Collection Boy </a></li>
                    <li><a href="{{ URL::asset('admin/lab-partner') }}"><i class="fas fa-flask fs-16"></i>Lab Partners </a></li>
                </ul>
            </li> --}}
            <!-- end Appointment -->
            @endif

            <!-- order -->
            {{-- <li class="menu-item">
                <a href="#" class="has-chevron" data-toggle="collapse" data-target="#order" aria-expanded="false" aria-controls="order">
                    <span><i class="fas fa-shopping-cart fs-16"></i>Orders </span>
                </a>
                <ul id="order" class="collapse sub-menu" aria-labelledby="order" data-parent="#side-nav-accordion" style="">
                    <li><a href="{{ URL::asset('admin/order') }}"><span><i class="fas fa-list fs-16"></i>ALL Orders</span></a></li>
                    <li><a href="{{url('admin/pending-order')}}"><span><i class="fas fa-list fs-16"></i>Pending Orders</span></a></li>
                    <li><a href="{{url('admin/completed-order')}}"><span><i class="fas fa-list fs-16"></i>Completed Orders</span></a></li>
                    <li><a href="{{url('admin/prescription-order')}}"><span><i class="fas fa-prescription-bottle fs-16"></i>Prescription Order</span></a></li>
                </ul>
            </li> --}}
            <li class="menu-item">
                <a href="{{ url('admin/order') }}"> <span><i class="fa fa-shopping-cart fs-16"></i>Orders</span>
                </a>
            </li>
            <!-- end order -->
            @if (get_user()->role == 'vendor')
                {{-- collection boy --}}
                <li class="menu-item">
                    <a href="{{ URL::asset('admin/blood-collection-boy') }}"> <span><i class="fa fa-id-card fs-16"></i>Collection Boy</span>
                    </a>
                </li>
                {{-- End page --}}
            @endif

            @if (get_user()->role == 'admin')
                <!-- Lab Test -->
                <li class="menu-item">
                    <a href="#" class="has-chevron {{$lab_test_active_a}}" data-toggle="collapse" data-target="#lab" aria-expanded="false" aria-controls="lab">
                        <span><i class="fas fa-flask fs-16"></i>Lab Test </span>
                    </a>
                    <ul id="lab" class="collapse sub-menu {{$lab_test_active_ul}}" aria-labelledby="lab" data-parent="#side-nav-accordion" style="">
                        <li><a href="{{ URL::asset('admin/health-concern') }}"> <span><i class="fas fa-plus-square fs-16"></i>View Health Concern </span></a></li>
                        <li><a href="{{ URL::asset('admin/lab-test-manage') }}"> <span><i class="fas fa-flask fs-16"></i>View Lab Test </span></a></li>
                    </ul>
                </li>
                <!-- Lab Test end -->
                <!-- Packages Start -->
                <li class="menu-item">
                    <a href="#" class="has-chevron {{$package_active_a}}" data-toggle="collapse" data-target="#Pack_ages" aria-expanded="false" aria-controls="Pack_ages">
                        <span><i class="fas fa-box fs-16"></i>Packages </span>
                    </a>
                    <ul id="Pack_ages" class="collapse sub-menu {{$package_active_ul}}" aria-labelledby="Pack_ages" data-parent="#side-nav-accordion" style="">
                        <li><a href="{{ URL::asset('admin/package-type') }}"> <span><i class="fas fa-list fs-16"></i>View Packages Type</span></a></li>
                        <li><a href="{{ URL::asset('admin/packages') }}"> <span><i class="fas fa-list fs-16"></i>View Packages </span></a></li>
                    </ul>
                </li>
                <!-- Packages end -->
                <!-- Slider -->
                <li class="menu-item">
                    <a href="{{ URL::asset('admin/slider') }}">
                        <span><i class="fas fa-image fs-16"></i>Slider </span>
                    </a>

                </li>
                <!-- end Slider -->
                <!-- Offers Code -->
                <li class="menu-item">
                    <a href="#" class="has-chevron {{$offers_active_a}}" data-toggle="collapse" data-target="#Offers" aria-expanded="false" aria-controls="Offers">
                        <span><i class="fas fa-gift fs-16"></i>Offer Codes </span>
                    </a>
                    <ul id="Offers" class="collapse sub-menu {{$offers_active_ul}}" aria-labelledby="Offers" data-parent="#side-nav-accordion" style="">
                        <li><a href="{{ URL::asset('admin/offer-type') }}"> <span><i class="fas fa-list fs-16"></i>View Offers Type </span></a></li>
                        <li><a href="{{ URL::asset('admin/offers') }}"> <span><i class="fas fa-list fs-16"></i>View Offers </span></a></li>
                    </ul>
                </li>
                <!-- end Offers Code -->
                {{-- pages --}}
                <li class="menu-item">
                    <a href="{{url('admin/pages')}}"> <span><i class="fa fa-file"></i>Pages</span>
                    </a>
                </li>
                {{-- End page --}}

                <!-- seo work -->
                {{-- <li class="menu-item">
                    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#seo" aria-expanded="false" aria-controls="seo">
                        <span><i class="fas fa-search fs-16"></i>SEO Pages </span>
                    </a>
                    <ul id="seo" class="collapse sub-menu" aria-labelledby="seo" data-parent="#side-nav-accordion" style="">
                        <li><a href="{{ URL::asset('admin/seo') }}"><span><i class="fas fa-list fs-16"></i>View SEO </span></a></li>
                    </ul>
                </li> --}}
                <!-- seo work -->
                <!-- Top Booked Start -->
                {{-- <li class="menu-item">
                    <a href="{{ URL::asset('admin/top-booked') }}"> <span><i class="fas fa-chart-line fs-16"></i>Top Booked Test </span></a>
                </li> --}}
                <!-- Top Booked end -->
                {{-- Manage Area Start --}}
                <li class="menu-item">
                    <a href="{{ url('admin/manag-area') }}"> <span><i class="fas fa-location-arrow fs-16"></i>Manage Area</span></a>
                </li>
                {{-- Manage Area End --}}
                {{-- assign area --}}
                <li class="menu-item">
                    <a href="{{ url('admin/assign-area') }}"> <span><i class="fas fa-compass fs-16"></i>Assign Area</span></a>
                </li>
                {{-- assign area end --}}
            @endif
        </ul>

    </aside>

    @include('admin.modal')
    @yield('content')

    <!-- SCRIPTS -->
    <script src="{{ URL::asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('admin/js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/widgets.js') }}"></script>
    <script src="{{ URL::asset('admin/js/clients.js') }}"></script>
    <script src="{{ URL::asset('admin/js/Chart.Financial.js') }}"></script>
    <script src="{{ URL::asset('admin/js/d3.v3.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/topojson.v1.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/data-tables.js') }}"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.js"></script>
    <script src="{{ URL::asset('admin/js/framework.js') }}"></script>
    <script src="{{ URL::asset('admin/js/settings.js') }}"></script>
    <script src="{{ URL::asset('admin/js/custome.js') }}"></script>
    @yield('script_js')


    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });

        // $(".package_type").keyup(function() {
        //     var type = $(this).val();
        //     type = type.toLowerCase();
        //     type = type.replace(/[^a-zA-Z0-9]+/g,'-');
        //     $(".package_slug").val(type);
        // });

        function preview() {
            frame.src=URL.createObjectURL(event.target.files[0]);
        }

        $(document).ready(function($){
            var url = window.location.href;
            $('.page li a[href="'+url+'"]').addClass('active');
            console.log(url);
        });
    </script>
</body>


</html>

