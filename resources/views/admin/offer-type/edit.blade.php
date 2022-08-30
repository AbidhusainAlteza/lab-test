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
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/offer-type') }}">Offers type</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Offers type</li>
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
                            <form class="needs-validation validation-fill" novalidate method='POST' autocomplate="off" action="{{ route('offer-type.update', $offers->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Offers Type</label>
                                        <div class="input-group">
                                        <input type="hidden" class="form-control" name="id" value="{{ $offers['id'] ? $offers['id']:''}}">
                                            <input type="text" class="form-control package_type" name="title" value="{{ $offers['title'] ? $offers['title']:''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Slug *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_slug" name="slug" value="{{ $offers['slug'] ? $offers['slug']:''}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Status *</label>
                                        <div class="input-group">
                                            <select name="is_active" class="form-control" required>
                                                <option value="1" {{ $offers->is_active == '1' ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $offers->is_active == '0' ? 'selected' : '' }}>Inactive</option>
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
