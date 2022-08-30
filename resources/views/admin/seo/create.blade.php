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
                            <li class="breadcrumb-item" aria-current="page"> <a href="{{ URL::asset('dashboard') }}"><i class="fas fa-home fs-16"></i> Home</a> </li>
                            <li class="breadcrumb-item"><a href="{{ URL::asset('admin/seo') }}">SEO Details</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add SEO Details</li>
                        </ol>
                    </nav>
                </div>
                
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        <i class="flaticon-alert-1"></i> 
                        <strong>Sorry! </strong> {{ Session::get('error') }}
                    </div>
                @endif

                <div class="col-xl-12 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Add SEO Details</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form method="POST" autocomplate="off" action="{{ route('seo.store') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Title </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_type" name="title" placeholder="Enter Title" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Slug </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_slug" name="slug" placeholder="Enter Slug" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>Meta Description </label>
                                        <div class="input-group">
                                            <textarea type="text" rows="5" class="form-control" name="description" placeholder="Enter Description" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Meta Keyword </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Enter Keyword" required>
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
