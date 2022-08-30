
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
    <link rel="stylesheet" href="{{ URL::asset('admin/css/custome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/style.css') }}">




</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">

    <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
    <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>

    <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
        <!-- Logo -->
        <div class="row">
            <div class="col-12 logo_col_color">
                <a class="pl-0 ml-0 text-center" href="{{ URL::asset('collection-boy-dashboard') }}">
                    <div class="logo_des">
                        <div class="p-1">
                             {{-- @php  var_dump(get_collection_boy()->image);die; @endphp --}}
                            <img src="{{ URL('upload/blood_boy')}}/{{ get_collection_boy()->image;}}" alt="logo" class="logo_img">
                        </div>
                        <h5 class="m-0 p-0">{{ ucwords(get_collection_boy()->name)}}</h5>
                    </div>
                </a>

            </div>
        </div>
        <!-- Navigation -->
        <ul class="page accordion ms-main-aside fs-14" id="side-nav-accordion">
            <!-- Dashboard -->
            <li class="menu-item">
                <a href="{{ URL::asset('collection-boy-dashboard') }}"> <span><i class="fas fa-home fs-16"></i>Dashboard </span></a>
            </li>
            <!-- Dashboard -->
            <!-- order -->
            <li class="menu-item">
                <a href="{{ URL::asset('collection-boy/order') }}"> <span><i class="fas fa-list fs-16"></i>Orders</span></a></a>
            </li>
            <!-- order -->
        </ul>

    </aside>
<!-- Main Content -->
<main class="body-content">
    @include('Collection-boy.partials.menu')
