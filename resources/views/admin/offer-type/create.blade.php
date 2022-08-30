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
                            <li class="breadcrumb-item" aria-current="page"> <a href="{{ URL::asset('dashboard') }}"><i class="material-icons">home</i> Home</a> </li>
                            <li class="breadcrumb-item"><a href="{{ URL::asset('admin/offer-type') }}">Offers Type</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Offers Type</li>
                        </ol>
                    </nav>
                </div>
                @include('flash_message')

                <div class="col-xl-12 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Add Offers Type</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form method="POST" autocomplate="off" action="{{ route('offer-type.store') }}" class="needs-validation validation-fill" novalidate>
                                @csrf

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Offers Type  *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_type" name="title" placeholder="Enter Offers Type" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Slug *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_slug" name="slug" placeholder="Enter Slug" required>
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
                                    <div class="col-md-12 mb-3">
                                        <button class="btn btn-primary d-block " type="submit">Save</button>
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
