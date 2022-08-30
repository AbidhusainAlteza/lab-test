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
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{ url('admin/manag-area') }}">Manag Area</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manag Area Edit</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="ms-panel ">
                    <div class="ms-panel-header">
                        <h6>Manag Area Edit</h6>
                    </div>
                    <div class="ms-panel-body">
                        <form class="needs-validation validation-fill" action="{{url('admin/manag-area-edit-post')}}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            <input type="hidden" name="manag_area_ia" value="{{$manag_area->id}}">
                            @include('flash_message')
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom1">State</label>
                                    <div class="input-group">
                                        <input type="text" name="state" class="form-control" id="validationCustom1"
                                            placeholder="State" value="{{$manag_area->state}}" required>
                                        <div class="invalid-feedback">Please provide a valid State</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom2">District</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="validationCustom2"
                                            placeholder="District" name="district" value="{{$manag_area->district}}" required>
                                        <div class="invalid-feedback">Please provide a valid District</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom3">Taluka</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  name="taluka" value="{{$manag_area->taluka}}" id="validationCustom3"
                                        placeholder="Taluka"  required>
                                        <div class="invalid-feedback">Please provide a valid Taluka.</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom4">Pincode</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control Number" maxlength="6" name="pincode" value="{{$manag_area->pincode}}" id="validationCustom4" placeholder="Pincode"
                                         required>
                                        <div class="invalid-feedback">Please provide a valid Pincode.</div>
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
