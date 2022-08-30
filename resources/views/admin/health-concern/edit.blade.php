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
                            <li class="breadcrumb-item"><a href="{{ URL::asset('admin/health-concern') }}">Health Concern</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Health Concern</li>
                        </ol>
                    </nav>
                </div>

                @include('flash_message')

                <div class="col-xl-10 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Edit Form</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form class="needs-validation validation-fill" method='POST' action="{{ route('health-concern.update', $health_concern_array->id) }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PATCH')

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Title</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_type" name="title" value="{{ $health_concern_array->title }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Slug </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_slug" name="slug" value="{{ $health_concern_array->slug }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Select Image <span class="text-red">( Min Size 200 x 100 * )</span></label>
                                        <input type="file" name="image" class="form-control p-3" accept="image/png,image/jpg,image/jpeg,image/svg,image/webp" onchange="preview()">
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        @if($health_concern_array->image)
                                            <img src="{{ url('/upload/health_concern/'.$health_concern_array->image) }}" id="frame" style="width: 100%; height: 200px;">
                                            <input type="hidden" name="old_image" value="{{ $health_concern_array->image }}">
                                        @endif
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>Description</label>
                                        <div class="input-group">
                                            <textarea rows="5" class="form-control" name="description" required>{{ $health_concern_array->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Status *</label>
                                        <div class="input-group">
                                            <select name="is_active" class="form-control" required>
                                                <option value="1" {{ $health_concern_array->is_active == '1' ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $health_concern_array->is_active == '0' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="ms-panel-header col-md-12 mt-3 mb-3">
                                        <h6>Health Concern SEO</h6>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>SEO Meta Title</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="meta_title" value="{{ $health_concern_array->meta_title }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>SEO Meta Keyword</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="meta_keyword" value="{{ $health_concern_array->meta_keyword }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>SEO Meta Description</label>
                                        <div class="input-group">
                                            <textarea type="text" rows="4" class="form-control" name="meta_description">{{ $health_concern_array->meta_description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12 pt-5">
                                        <button class="btn btn-primary px-5" type="submit">Save</button>
                                        <a href="{{ url('admin/health-concern') }}"class="btn btn-secondary px-5 mx-5">Back</a>
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
