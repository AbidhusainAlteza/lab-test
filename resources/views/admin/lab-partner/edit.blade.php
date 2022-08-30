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
                            <li class="breadcrumb-item"><a href="{{ URL::asset('admin/lab-partner') }}">Lab Partner</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Lab Partner</li>
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
                            <form class="needs-validation validation-fill" method='POST' action="{{ route('lab-partner.update', $lab_partner->id) }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PATCH')

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Lab Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="lab_name" value="{{ $lab_partner->lab_name }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Lab Address </label>
                                        <div class="input-group">
                                            <textarea rows="3" type="text" class="form-control" name="lab_address" required>{{ $lab_partner->lab_address }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>GST No</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="gst_no" value="{{ $lab_partner->gst_no }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>POS</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="pos" value="{{ $lab_partner->pos }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>Lab Person</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="lab_person" value="{{ $lab_partner->lab_person }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>Lab License</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="lab_license" value="{{ $lab_partner->lab_license }}" required>
                                        </div>
                                    </div>


                                    <div class="col-md-12 pt-5">
                                        <button class="btn btn-primary px-5" type="submit">Save</button>
                                        <a href="{{ url('admin/lab-partner') }}"class="btn btn-secondary px-5 mx-5">Back</a>
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
