 @extends('admin/layouts.master')
 @section('content')

    <!-- Main Content -->
    <main class="body-content">

        @include('admin/layouts/menu')

        <div class="ms-content-wrapper">
            <div class="row">

                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                            <li class="breadcrumb-item"><a href="{{ URL::asset('dashboard') }}"><i class="fas fa-home fs-16"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ URL::asset('admin/blood-collection-boy') }}">Blood Collection Boy</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Blood Collection Boy</li>
                        </ol>
                    </nav>
                </div>

                @include('flash_message')

                <div class="col-xl-12 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Edit Form</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form class="needs-validation validation-fill" method='POST' action="{{ route('blood-collection-boy.update', $blood_boy->id) }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="user_id" value="{{$blood_boy->user_id}}">
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label>Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name" value="{{ $blood_boy->name }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>E-Mail </label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="email" value="{{ $blood_boy->email }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>Phone No</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control Number" maxlength="12" name="contact" value="{{ $blood_boy->contact }}" required>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-3 mb-3">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="password" value="{{ $password }}">
                                        </div>
                                    </div> --}}

                                    <div class="col-md-3 mb-3">
                                        <label>Pincode</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="pincode" maxlength="6" value="{{ $blood_boy->pincode }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>City</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="city" value="{{ $blood_boy->city }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>State</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="state" value="{{ $blood_boy->state }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Area</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="area" value="{{ $blood_boy->area }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Profile Image <span style="color: red; margin-left: 20px;">( Min Size 100 x 150 * )</span></label>
                                        <input type="file" name="image" class="form-control p-3" accept="image/png,image/jpg,image/jpeg,image/svg,image/webp" onchange="preview()">
                                    </div>

                                    <div class="col-md-6 mt-3 px-3">
                                        @if($blood_boy->image)
                                            <img src="{{ url('Image/avatar/'.$blood_boy->image) }}" id="frame">
                                            <input type="hidden" name="old_image" value="{{ $blood_boy->image }}">
                                        @else
                                        <img src="" id="frame">
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>

                                </div>
                                {{-- Driving Licence --}}
                                <div class="form-row  mt-1 mb-1">
                                    <div class="col-md-4 mb-3">
                                        <label>Driving Licence No:</label>
                                        <input type="text" class="form-control" name="driving_licence_no" value="{{$blood_boy->driving_licence_no}}" placeholder="Driving Licence" required>
                                    </div>
                                    <div class="col-md-4 mb3">
                                        <label for="">Driving Licence Image</label>
                                        <input type="file" class="form-control p-3" name="driving_licence_img" value="{{$blood_boy->driving_licence_img}}" accept="image/png,image/jpg,image/jpeg,image/svg,image/webp" onchange="formImageShow('driving_licence_img_show')">
                                    </div>
                                    <div class="col -md-4 mb-3 pl-1" id="">
                                        <div id="driving_licence_img_show" class="frame2">
                                            @isset($blood_boy->driving_licence_img)
                                                <img id=""  src="{{url('/upload/blood_boy/'.$blood_boy->driving_licence_img)}}">
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                </div>
                                {{-- document --}}
                                <div class="form-row  mt-1 mb-1">
                                    <div class="col-md-6 mb-3">
                                        <label>Select document</label>
                                        <select class="form-control" name="c_bo_document_type" required>
                                            <option>Select Document Type</option>
                                            <option value="pancard" {{$blood_boy->c_bo_document_type=='pancard'?'selected':''}}>Pan Card</option>
                                            <option value="aadharcard" {{$blood_boy->c_bo_document_type=='aadharcard'?'selected':''}}>Aadhar Card</option>
                                            <option value="voter_id" {{$blood_boy->c_bo_document_type=='voter_id'?'selected':''}}>Voter Id</option>
                                            <option value="driving_licence" {{$blood_boy->c_bo_document_type=='driving_licence '?'selected':''}}>Driving Licence</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Document Number</label>
                                        <input type="text" class="form-control" name="c_bo_document_number" value="{{$blood_boy->c_bo_document_number}}" placeholder="Document Number" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Document Image <span class="text-red">Max Size 5Mb</span></label>
                                        <input type="file" class="form-control p-3" name="c_bo_document_img" id="" accept="image/png,image/jpg,image/jpeg,image/svg,image/webp" onchange="formImageShow('document_img_show')">
                                    </div>
                                    <div class="col-md-6">
                                        <div id="document_img_show" class="frame2">
                                            @isset($blood_boy->c_bo_document_img)
                                                <img src="{{url('/upload/blood_boy/'.$blood_boy->c_bo_document_img)}}">
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                </div>
                                {{-- relative --}}
                                <div class="form-row mt-1 mb-1">
                                    <div class="col-md-3 mb-3">
                                        <label for="">Relative Phone Number</label>
                                        <input type="text" class="form-control Number" name="relative_phone_number" value="{{$blood_boy->relative_phone_number}}" maxlength="12" placeholder="Relative Phone Number" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Relative Name</label>
                                        <input type="text" class="form-control" name="relative_name" value="{{$blood_boy->relative_name}}" placeholder="Relative Name" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label>Relative Document</label>
                                        <select class="form-control" name="relative_do_type" required>
                                            <option>Select Document Type</option>
                                            <option value="pancard" {{$blood_boy->relative_do_type=='pancard'?'selected':''}}>Pan Card</option>
                                            <option value="aadharcard" {{$blood_boy->relative_do_type=='aadharcard'?'selected':''}}>Aadhar Card</option>
                                            <option value="voter_id" {{$blood_boy->relative_do_type=='voter_id'?'selected':''}}>Voter Id</option>
                                            <option value="driving_licence" {{$blood_boy->relative_do_type=='driving_licence'?'selected':''}}>Driving Licence</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Document Number</label>
                                        <input type="text" class="form-control" name="relative_do_number" value="{{$blood_boy->relative_do_number}}" placeholder="Document Number" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Relative Document Image <span class="text-red">Max Size 5Mb</span></label>
                                        <input type="file" class="form-control p-3" name="relative_do_img" accept="image/png,image/jpg,image/jpeg,image/svg,image/webp" onchange="formImageShow('relative_document_img_show')">
                                    </div>
                                    <div class="col -md-4 mb-3" id="">
                                        <div id="relative_document_img_show" class="frame2">
                                            @isset($blood_boy->relative_do_img)
                                            <img src="{{url('/upload/blood_boy/'.$blood_boy->relative_do_img)}}" alt="">
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 pt-5">
                                        <button class="btn btn-primary px-5" type="submit">Save</button>
                                        <a href="{{ url('admin/blood-collection-boy') }}"class="btn btn-secondary px-5 mx-5">Back</a>
                                    </div>
                                </div>



                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>

@endsection
