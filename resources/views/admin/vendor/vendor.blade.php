@extends('admin/layouts.master')

@section('content')

<!-- Main Content -->
<main class="body-content">

    @include('admin/layouts/menu')

    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper box">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i
                                    class="material-icons">home</i> Home</a> </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="total_vendor">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">group</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Total Vendor</h6>
                                <h6>{{$total_vendor}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="active_vendor">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">group</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Active Vendor</h6>
                                <h6>{{$active_vendor}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="deactive_vendor">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">group</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Deactive Vendor</h6>
                                <h6>{{$deactive_vendor}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @include('flash_message')
            </div>
            <div class="col-md-12">
                <div class="ms-panel ">
                    <div class="ms-panel-header">
                        <div class="row align-items-center">
                            <div class="col-md-6 ">
                                <h6>{{$title}}</h6>
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{url('admin/vendor/add')}}" class="btn btn-primary d-block float-right">Add vendor</a>
                            </div>
                        </div>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive">
                            <table id="data_table" class="table w-100 thead-primary vandor_data_table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Laboratory Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vendors as $vendor)
                                    <tr>
                                        <td>
                                            <a class="font-weight-bold" href="{{url('admin/vendor/edit')}}/{{$vendor->id}}">
                                                {{$vendor->id}}
                                            </a>
                                        </td>
                                        <td>
                                            <a class="font-weight-bold" href="{{url('admin/vendor/edit')}}/{{$vendor->id}}">
                                                {{$vendor->name}}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#img_show_modal">
                                                <img class="img_show_class" src="{{url('Image/avatar')}}/{{isset($vendor->avatar)?$vendor->avatar:"no_img.png"}}" alt="Avatar" height="50" width="50">
                                            </a>
                                        </td>
                                        <td>{{$vendor->laboratory_name}}</td>
                                        <td>{{$vendor->email}}</td>
                                        <td>{{$vendor->contact_number}}</td>
                                        <td>
                                            @if($vendor->is_active == 1)
                                            <a class="vandor-active-inactive" data="0" href="javascript:void(0)" vendor-id="{{$vendor->id}}" user-id="{{$vendor->user_id}}">
                                                <span class="badge badge-success">Active</span>
                                            </a>
                                            @endif
                                            @if($vendor->is_active == 0)
                                            <a class="vandor-active-inactive" data="1" href="javascript:void(0)" vendor-id="{{$vendor->id}}" user-id="{{$vendor->user_id}}">
                                                <span class="badge badge-danger">inactive</span>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="vendor_delete" user-id="{{$vendor->user_id}}" vendor-id="{{$vendor->id}}"><i class='far fa-trash-alt ms-text-danger'></i></a>
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
{{-- js is vandor.js file --}}

@endsection

@section('script_js')
<script src="{{ URL::asset('admin/js/vendor.js') }}"></script>
@endsection
