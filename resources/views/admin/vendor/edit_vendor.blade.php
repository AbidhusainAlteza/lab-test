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
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{url('admin/vendor')}}"> Vendor</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="ms-panel ">
                    <div class="ms-panel-header">
                        <h6>{{$title}}</h6>
                    </div>
                    <div class="ms-panel-body">
                        <form class="needs-validation validation-fill" action="{{url('admin/vendor/edit-post')}}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
                            <input type="hidden" name="user_id" value="{{$vendor->user_id}}">
                            @include('flash_message')
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom1">User Name</label>
                                    <div class="input-group">
                                        <input type="text" name="user_name" class="form-control" id="validationCustom1"
                                            placeholder="Name" value="{{$vendor->name}}" required>
                                        <div class="invalid-feedback">Please provide a valid User Name</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom2">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="validationCustom2"
                                            placeholder="Email" name="email" value="{{$vendor->email}}" required>
                                        <div class="invalid-feedback">Please provide a valid Email</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom3">Contact Number</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control Number" maxlength="12" name="contact_number" value="{{$vendor->contact_number}}" id="validationCustom3" placeholder="Contact Number"
                                         required>
                                        <div class="invalid-feedback">Please provide a valid Contact Number.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom3">Address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="address" value="{{$vendor->address}}" id="validationCustom3" placeholder="Address"
                                         required>
                                        <div class="invalid-feedback">Please provide a valid Address.</div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom4">City</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="city" value="{{$vendor->city}}" id="validationCustom4" placeholder="City"
                                            required>
                                        <div class="invalid-feedback">Please provide a valid City.</div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom4">State</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="state" value="{{$vendor->state}}" id="validationCustom4" placeholder="State"
                                            required>
                                        <div class="invalid-feedback">Please provide a valid state.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom5">Zip Code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="zip" value="{{$vendor->zip}}" id="validationCustom5" placeholder="Zip"
                                            required>
                                        <div class="invalid-feedback">Please provide a valid zip.</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom5">Commission</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control Number" maxlength="3" name="commission" value="{{$vendor->commission}}" id="validationCustom5" placeholder="Commission %"
                                            required>
                                        <div class="invalid-feedback">Please provide a valid Commission.</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Select Profile Image <span class="text-red">Max Size 5Mb </span></label>
                                    <input type="file" name="avatar" class="form-control p-3" onchange="formImageShow('edit_vendor_profile_img_show')" accept="image/png,image/jpg,image/jpeg,image/svg,image/webp" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div id="edit_vendor_profile_img_show" class="frame2">
                                        @isset($vendor->commission)
                                            <img src="{{url('Image/avatar/'.$vendor->avatar)}}">
                                        @endisset
                                    </div>
                                </div>
                                <div  class="col-md-12 mb-3">
                                    <hr>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label>Laboratory Name</label>
                                    <input type="text" class="form-control" name="laboratory_name" value="{{$vendor->laboratory_name}}" placeholder="Laboratory Name" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Laboratory Address</label>
                                    <input type="text" class="form-control" name="laboratory_address" value="{{$vendor->laboratory_address}}" placeholder="Laboratory Address" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Lecom Number</label>
                                    <input type="text" class="form-control" name="lecom_number" value="{{$vendor->lecom_number}}" placeholder="Lecom Number" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Select document</label>
                                    <select class="form-control" name="laboratory_document_type" required>
                                        <option>Select Document Type</option>
                                        <option value="gst_certificate" {{$vendor->laboratory_document_type=='gst_certificate'?'selected':''}}>GST Certificate</option>
                                        <option value="incorporation_certificate" {{$vendor->laboratory_document_type=='incorporation_certificate'?'selected':''}}>Incorporation Certificate</option>
                                        <option value="pancard" {{$vendor->laboratory_document_type=='pancard'?'selected':''}}>Pan Card</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Document Number</label>
                                    <input type="text" class="form-control" name="laboratory_document_number" value="{{$vendor->laboratory_document_number}}" placeholder="Document Number" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Document Image <span class="text-red">Max Size 5Mb</span></label>
                                    <input type="file" class="form-control p-3" name="laboratory_document_img" onchange="formImageShow('edit_laboratory_document_img_show')" accept="image/png,image/jpg,image/jpeg,image/svg,image/webp">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div id="edit_laboratory_document_img_show" class="frame2">
                                        @isset($vendor->laboratory_document_img)
                                            <img src="{{url('Image/avatar/'.$vendor->laboratory_document_img)}}">
                                        @endisset
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
