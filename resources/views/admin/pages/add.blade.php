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
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{url('admin/pages')}}"> Pages</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Pages Add</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="ms-panel ">
                    <div class="ms-panel-header">
                        <h6>Add Page</h6>
                    </div>
                    <div class="ms-panel-body">
                        <form class="needs-validation validation-fill" action="{{url('admin/page/add-post')}}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            @include('flash_message')
                            <div class="form-row mb-3">
                                <div class="col-md-6 ">
                                    <label>Tile</label>
                                    <input type="text" name="title" class="form-control package_type"
                                        placeholder="Title" value="" required>
                                </div>
                                <div class="col-md-6 ">
                                    <label>Slug</label>
                                    <input type="text" class="form-control package_slug"
                                        placeholder="slug" name="slug" required>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-6">
                                    <label>Description (Meta Tag)</label>
                                    <input type="text" class="form-control" name="description" placeholder="Description (Meta Tag)" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Keywords (Meta Tag)</label>
                                    <input type="text" class="form-control" name="keywords" placeholder="Keywords (Meta Tag)" required>
                                </div>
                            </div>
                            {{-- <div class="form-row mb-3">
                                <div class="col-md-5">
                                    <label>Order</label>
                                    <input type="number" class="form-control" name="page_order" value="1" required>
                                </div>
                            </div> --}}
                            <div class="form-row">
                                <div class="col-md-3 mt-3">
                                    <label>Location</label>
                                </div>
                                <div class="col-md-6">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="location" value="policies" checked> <i class="ms-checkbox-check"></i>
                                            </label> <span> Policies </span>
                                        </li>
                                        <li class="ms-list-item">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="location" value="need_help" > <i class="ms-checkbox-check"></i>
                                            </label> <span> Need Help </span>
                                        </li>
                                        <li class="ms-list-item">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="location" value="company" > <i class="ms-checkbox-check"></i>
                                            </label> <span> Company  </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="col-md-3 mt-3">
                                    <label>Visibility</label>
                                </div>
                                <div class="col-md-6">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="visibility" value="show" checked> <i class="ms-checkbox-check"></i>
                                            </label> <span> Show </span>
                                        </li>
                                        <li class="ms-list-item">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="visibility" value="hide" > <i class="ms-checkbox-check"></i>
                                            </label> <span>Hide</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="col-md-3 mt-3">
                                    <label>Show Title</label>
                                </div>
                                <div class="col-md-6">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="title_active" value="yes" checked> <i class="ms-checkbox-check"></i>
                                            </label> <span> Yes </span>
                                        </li>
                                        <li class="ms-list-item">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="title_active" value="no" > <i class="ms-checkbox-check"></i>
                                            </label> <span>No</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Content</label>
                                    <textarea type="text" name="page_content" class="ckeditor form-control" required></textarea>
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
