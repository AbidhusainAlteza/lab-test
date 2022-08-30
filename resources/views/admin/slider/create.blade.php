@extends('admin/layouts.master')
@section('content')

<!-- Main Content -->
<main class="body-content">
    @include('admin/layouts/menu')
    <div class="ms-content-wrapper">
        <div class="row">
            <!--start page wrapper -->
            <div class="page-wrapper">
                <div class="page-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                            <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i class="fas fa-home fs-16"></i> Home</a> </li>
                            <li class="breadcrumb-item" aria-current="page"> <a href="{{url('admin/slider')}}"> Slider</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Slider Item</li>
                        </ol>
                    </nav>

                    @include('flash_message')

                    <!--end breadcrumb-->
                    <div class="row col-12">
                        <div class="col">
                            <div class="card ">
                                <div class="card-body ">
                                    <form class="needs-validation validation-fill" action="{{ route('slider.store') }}" method='POST' enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control package_type" name="title" placeholder="Enter Title" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Slug</label>
                                                <input type="text" class="form-control package_slug" name="slug" placeholder="Slug" required>
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <label class="form-label">Slider Image <span style="color: red; margin-left: 20px;">( Min Size 1100 x 250 * )</span></label>
                                                <input type="file" name="image" class="form-control p-3" accept="image/png,image/jpg,image/jpeg,image/svg,image/webp" onchange="preview()" required>
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <img id="frame" style="width: 500px; height: 120px;"/>
                                            </div>

                                            <div class="col-md-6 mb-3 mt-3">
                                                <label class="form-label">Redirect URL</label>
                                                <input type="text" class="form-control" name="url" placeholder="Enter Redirect URL" required>
                                            </div>

                                            <div class="col-md-6 mb-3 mt-3">
                                                <label>Status *</label>
                                                <div class="input-group">
                                                    <select name="is_active" class="form-control" required>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12 pt-3">
                                                <button type="submit" class="btn btn-primary px-5">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
