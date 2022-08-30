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
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fas fa-home fs-16"></i>Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/package-type') }}">Package type</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Package type</li>
                        </ol>
                    </nav>
                </div>

                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        <i class="flaticon-alert-1"></i>
                        <strong>Sorry! </strong> {{ Session::get('error') }}
                    </div>
                @endif

                <div class="col-xl-10 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Edit Form</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form class="needs-validation validation-fill" method='POST' autocomplate="off" action="{{ route('package-type.update', $product_type->id) }}" novalidate>
                                @csrf
                                @method('PATCH')
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Package Type</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_type" required name="package_type" value="{{ $product_type->package_type ? $product_type->package_type:''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Slug *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_slug" name="slug" placeholder="Enter Slug" required value="{{ $product_type->slug ? $product_type->slug:''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Status *</label>
                                        <div class="input-group">
                                            <select name="is_active" class="form-control" required>
                                                <option value="1" {{ $product_type->is_active == '1' ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $product_type->is_active == '0' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
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
