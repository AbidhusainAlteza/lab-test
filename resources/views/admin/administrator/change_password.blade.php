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
                    <ol class="breadcrumb breadcrumb-arrow has-gap first-rounded">
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
                        <form class="needs-validation validation-fill admin-change-password" action="{{url('admin/administrator/change-password-post')}}" method="POST"  novalidate>
                            <div class="error"></div>
                            @csrf
                            <input type="hidden" name="id" value="{{$administrator->id}}">
                            @include('flash_message')

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom2">Old Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control"  name="old_Password" minlength="4" id="validationCustom2" placeholder="Old Password"
                                         required>
                                        <div class="invalid-feedback ">Please provide a Minimum 4 Characters password.</div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom2">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control password password1"  name="password" minlength="4" id="validationCustom2" placeholder="Password"
                                         required>
                                        <div class="invalid-feedback ">Please provide a Minimum 4 Characters password.</div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom3">Confirm password</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control confirm_password " name="confirm_password" minlength="4" id="validationCustom3" placeholder="Confirm password"
                                         required>
                                        <div class="invalid-feedback ">Please provide a valid Confirm password.</div>
                                    </div>
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
