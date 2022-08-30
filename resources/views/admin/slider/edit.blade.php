@extends('admin/layouts.master')
 @section('content')

<!-- Main Content -->
<main class="body-content">

    @include('admin/layouts/menu')
    <div class="ms-content-wrapper">
        <div class="row">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                            <li class="breadcrumb-item"><a href="{{ URL('dashboard') }}"><i class="fas fa-home fs-16"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ URL('admin/slider') }}">Slider</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Slider Item Edit</li>
                        </ol>
                    </nav>
                </div>

                @include('flash_message')

                <!--end breadcrumb-->
                <div class="row col-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Edit Slider Form</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form class="row g-3 needs-validation validation-fill" action="{{ route('slider.update', $Slider->id) }}" method='POST' enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PATCH')

                                <input type="hidden" name="id" value="{{$Slider->id}}">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control package_type" name="title" value="{{$Slider->title}}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control package_slug" name="slug" value="{{$Slider->slug}}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Slider Image <span style="color: red; margin-left: 20px;">Min Size 1100 x 250 *</span></label>
                                    <input type="file" name="image" class="form-control p-3" accept="image/png,image/jpg,image/jpeg,image/svg,image/webp" onchange="preview()" multiple >
                                </div>

                                <div class="col-md-6 mt-3">
                                    @if($Slider->image)
                                        <img src="{{url('')}}/upload/slider/{{$Slider->image}}" id="frame" style="width: 100%; height: 115px;" class="slider_show_img">
                                        <input type="hidden" name="old_image" value="{{ $Slider->image }}">
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3 mt-3">
                                    <label class="form-label">Link</label>
                                    <input type="text" class="form-control" name="url" value="{{$Slider->url}}" required>
                                </div>

                                <div class="col-md-6 mb-3 mt-3">
                                    <label>Status *</label>
                                    <div class="input-group">
                                        <select name="is_active" class="form-control" required>
                                            <option value="1" {{ $Slider->is_active == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $Slider->is_active == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 pt-5">
                                    <button type="submit" class="btn btn-primary px-5">Save</button>

                                    <a href="{{url('')}}/admin/slider" class="btn btn-secondary px-5 mx-5">Back</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
            <!--end overlay-->
        </div>
    </div>

@endsection
