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
                    <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i class="fas fa-home fs-16"></i> Home</a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Assign Area</li>
                </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="total_assign_area">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">my_location</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Total assign area</h6>
                                <h6>{{$total_assign_area}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="active_assign_area">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">my_location</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Active assign area</h6>
                                <h6>{{$active_assign_area}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="inactive_assign_area">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">my_location</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">inactive assign area</h6>
                                <h6>{{$inactive_assign_area}}</h6>
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

            <div class="ms-panel col-md-12">
                <div class="ms-panel-header">
                    <div class="row align-items-center">
                        <div class="col-md-6 ">
                            <h6>Assign Area</h6>
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{url('admin/assign-area-add')}}" class="btn btn-primary d-block float-right">Add Assign Area</a>
                        </div>
                    </div>
                </div>
                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table id="data_table" class="table w-100 thead-primary assign_area_data_table">
                            <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Pincod</th>
                                    <th>Vendor</th>
                                    <th>Added Date</th>
                                    <th>Action</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($assign_area_datas) > 0)
                                    @foreach ($assign_area_datas as $assign_area_data)
                                    <tr>
                                        <td>
                                            <a class="font-weight-bold" href="{{url('admin/assign-area-edit')}}/{{$assign_area_data->id}}">
                                                {{$assign_area_data->id}}
                                            </a>
                                        </td>
                                        <td class="text-uppercase">{{$assign_area_data->pincode}}</td>
                                        <td class="text-uppercase">{{$assign_area_data->name}}</td>
                                        <td class="text-uppercase">{{$assign_area_data->added_date}}</td>
                                        <td class="text-uppercase">
                                            @if($assign_area_data->is_active == 1)
                                            <a class="assign-area-active-inactive" data="0" href="javascript:void(0)" id="{{$assign_area_data->id}}">
                                                <span class="badge badge-success">Active</span>
                                            </a>
                                            @endif
                                            @if($assign_area_data->is_active == 0)
                                            <a class="assign-area-active-inactive" data="1" href="javascript:void(0)" id="{{$assign_area_data->id}}">
                                                <span class="badge badge-danger">inactive</span>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="assign_area_delete" id="{{$assign_area_data->id}}"><i class='far fa-trash-alt ms-text-danger'></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
@section('script_js')
<script src="{{ URL::asset('admin/js/assign-area.js') }}"></script>
@endsection
