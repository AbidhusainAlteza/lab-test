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
                        <a href="javascript:void(0)" class="total_user">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">person</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Total customer</h6>
                                <h6>{{$total_user}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="active_user">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">person</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Active customer</h6>
                                <h6>{{$active_user}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="banned_user">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">person</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Banned customer</h6>
                                <h6>{{$banned_user}}</h6>
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
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <div class="row align-items-center">
                            <div class="col-md-6 ">
                                <h6>{{$title}}</h6>
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{url('admin/user/add')}}" class="btn btn-primary d-block float-right text-capitalize">Add customer</a>
                            </div>
                        </div>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive">
                            <table id="data_table" class="table w-100 thead-primary user_data_table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td class="text-uppercase">{{$user->user_name}}</td>
                                        <td>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#img_show_modal">
                                                <img class="img_show_class" src="{{url('Image/avatar')}}/{{isset($user->avatar)?$user->avatar:"no_img.png"}}" alt="Avatar" height="50" width="50">
                                            </a>
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->contact_number}}</td>
                                        <td><span class="badge badge-secondary">{{$user->order_count}}</span></td>
                                        <td>
                                            @if($user->is_active == 1)
                                                <a class="ban_user" href="javascript:void(0)" user-id="{{$user->id}}">
                                                    <span class="badge badge-success">Active</span>
                                                </a>
                                            @endif
                                            @if($user->is_active == 0)
                                                <a class="remove_user_ban" href="javascript:void(0)" user-id="{{$user->id}}">
                                                    <span class="badge badge-danger">Banned</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="user_delete" href="javascript:void(0)" user-id="{{$user->id}}"><i class='far fa-trash-alt ms-text-danger'></i></a>
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
<script src="{{ URL::asset('admin/js/user.js') }}"></script>
@endsection
