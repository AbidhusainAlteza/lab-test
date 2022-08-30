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
                        {{-- <li class="breadcrumb-item" aria-current="page"> <a href="{{url('admin/administrator')}}">Administrator</a> --}}
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                    </ol>
                </nav>
            </div>

            <div class="col-md-6">
                <div class="ms-panel ">
                    <div class="ms-panel-header">
                        <h6>{{$title}}</h6>
                    </div>
                    <div class="ms-panel-body">
                        <form class="needs-validation validation-fill" action="{{url('admin/administrator/edit-post')}}" method="POST" enctype="multipart/form-data" novalidate>
                            <div class="error"></div>
                            @csrf
                            <input type="hidden" name="id" value="{{$administrator->id}}">
                            @include('flash_message')
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="administrator_avatar">
                                        <img src="{{url('Image/avatar')}}/{{$administrator->avatar}}" alt="" height="50" width="50">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom1">Name</label>
                                    <div class="input-group">
                                        <input type="text" name="administrator_name" class="form-control" id="validationCustom1"
                                            placeholder="Name" value="{{$administrator->user_name}}" required>
                                        <div class="invalid-feedback">Please provide a valid Administrator Name</div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom2">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="validationCustom2"
                                            placeholder="Email" name="email" value="{{$administrator->email}}" required>
                                        <div class="invalid-feedback">Please provide a valid Email</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom5">Contact Number</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control number Number" maxlength="12"  name="contact_number" value="{{$administrator->contact_number}}" minlength="10" id="validationCustom5" placeholder="Contact Number"
                                         required>
                                        <div class="invalid-feedback">Please provide a valid Contact Number.</div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Select Image <span class="text-red">Max Size 5Mb</span></label>
                                    <input type="file" name="avatar" class="form-control p-3" >
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
