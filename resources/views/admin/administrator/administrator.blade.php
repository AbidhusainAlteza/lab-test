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

                @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
            <div class="col-md-12">
                <div class="ms-panel ">
                    <div class="ms-panel-header">
                        <div class="row align-items-center">
                            <div class="col-md-6 ">
                                <h6>{{$title}}</h6>
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{url('admin/administrator/add')}}" class="btn btn-primary d-block float-right">Add Administrator</a>
                            </div>
                        </div>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive">
                            <table id="data_table" class="table w-100 thead-primary">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>image</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <a class="font-weight-bold" href="{{url('admin/administrator/edit')}}/{{$user->id}}">{{$user->id}}</a>
                                        </td>
                                        <td>
                                            <a class="font-weight-bold" href="{{url('admin/administrator/edit')}}/{{$user->id}}">
                                                {{$user->user_name}}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#img_show_modal">
                                                <img class="img_show_class" src="{{url('Image/avatar')}}/{{isset($user->avatar)?$user->avatar:"no_img.png"}}" alt="Avatar" height="50" width="50" >
                                            </a>
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->contact_number}}</td>
                                        @if($user->is_active == 1)
                                        <td><span class="badge badge-success">Active</span></td>
                                        @endif
                                        @if($user->is_active == 0)
                                        <td><span class="badge badge-danger">Banned</span></td>
                                        @endif
                                        <td>
                                            <a class=" administrator_delete" href="javascript:void(0)" user-id="{{$user->id}}"><i class='far fa-trash-alt'></i></a>
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


