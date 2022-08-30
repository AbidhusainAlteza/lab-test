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
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{ url('admin/assign-area') }}">Assign Area</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Assign Area Add</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="ms-panel ">
                    <div class="ms-panel-header">
                        <h6>Assign Area Add</h6>
                    </div>
                    <div class="ms-panel-body">
                        <form class=" assign_area_add_form" action="{{url('admin/assign-area-add-post')}}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            @include('flash_message')
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom1">Pincode</label>
                                    <div class="input-group">
                                        <select name="pincode_id" id="pincode_id" class="form-control" required>
                                            <option value="">Select Pincode</option>
                                            @foreach ($manag_area_pincodes as $manag_area_pincode)
                                                <option value="{{$manag_area_pincode->id}}">{{$manag_area_pincode->pincode}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom2">Vendor</label>
                                    <div class="input-group">
                                        <select name="vendor_id" id="vendor_id" class="form-control" required="required">
                                            <option value="" >Select Vendor</option>
                                            @foreach ($vendors as $vendor)
                                            <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                            @endforeach
                                        </select>
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
<script>
    $(document).ready(function(){
        $(document).on('submit','.assign_area_add_form',function(){
            var pincode = $('#pincode_id').val();
            var vendor = $('#vendor_id').val();
            if(pincode == ""){
                $('#pincode_id').css('border-color','red');
                return false;
            }else{
                $('#pincode_id').css('border-color','green');
            }
            if(vendor == ""){
                $('#vendor_id').css('border-color','red');
                return false;
            }else{
                $('#vendor_id').css('border-color','green');
            }
        })
    });
</script>
@endsection
