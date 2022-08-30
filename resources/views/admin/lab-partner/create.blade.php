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
                            <li class="breadcrumb-item"><a href="{{url('admin/lab-partner')}}">Lab Partner</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Lab Partner</li>
                        </ol>
                    </nav>
                </div>

                @include('flash_message')

                <div class="col-xl-12 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Add Lab Partner</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form class="needs-validation validation-fill" method='post' action="{{ route('lab-partner.store') }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label>Lab Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="lab_name" placeholder="Enter Lab Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="lab_email" placeholder="Enter Lab Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="lab_password" placeholder="Enter Lab Password" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>Lab Address</label>
                                        <div class="input-group">
                                            <textarea rows="3" type="text" class="form-control" name="lab_address" placeholder="Enter Lab Address" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>GST No</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="gst_no" placeholder="Enter GST No" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>POS</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="pos" placeholder="Enter POS" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>Lab Person</label>
                                        <div class="input-group">
                                        <input type="text" class="form-control" name="lab_person" placeholder="Enter Lab Person" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>Lab License </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="lab_license" placeholder="Enter Lab License" required>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <button class="btn btn-primary d-block" type="submit">Save</button>
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
