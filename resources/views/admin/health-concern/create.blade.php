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
                            <li class="breadcrumb-item"><a href="{{url('admin/health-concern')}}">Health Concern</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Health Concern</li>
                        </ol>
                    </nav>
                </div>

                @include('flash_message')

                <div class="col-xl-12 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Add Health Concern</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form class="needs-validation validation-fill" method='post' action="{{ route('health-concern.store') }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label  >Title</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_type"  id="validationCustom1" name="title" placeholder="Enter Title" required>
                                            <div class="invalid-feedback">Please provide a Title</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Slug</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_slug" name="slug" placeholder="Enter Slug" required>
                                            <div class="invalid-feedback">Please provide a Slug</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-5 mb-5">
                                        <label class="form-label">Select Image <span style="color: red; margin-left: 20px;">( Min Size 350 x 250 * )</span></label>
                                        <input type="file" name="image" class="form-control p-3" accept="image/png,image/jpg,image/jpeg,image/svg,image/webp" onchange="preview()" required>
                                        <div class="invalid-feedback">Please provide a Image</div>
                                    </div>

                                    <div class="col-md-6 mt-5 mb-5 px-5">
                                        <img id="frame" style="width: 300px; height: 150px;"/>
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <label>Description</label>
                                        <div class="input-group">
                                            <textarea type="text" rows="5" class="form-control" name="description" placeholder="Message" required></textarea>
                                            {{-- <div class="invalid-feedback">Please provide a Description</div> --}}
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Status *</label>
                                        <div class="input-group">
                                            <select name="is_active" class="form-control" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ms-panel-header col-md-12 mt-3 mb-3">
                                        <h6>Health Concern SEO</h6>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>SEO Meta Title</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_type" name="meta_title" placeholder="Enter Meta Title" >
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>SEO Meta Keyword</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_type" name="meta_keyword" placeholder="Enter Meta Keyword" >
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>SEO Meta Description</label>
                                        <div class="input-group">
                                            <textarea type="text" rows="4" class="form-control" name="meta_description" placeholder="Enter Your Meta Description" ></textarea>
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
