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
                            <li class="breadcrumb-item"><a href="{{ url('admin/seo') }}">SEO</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit SEO</li>
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
                            <form method='POST' autocomplate="off" action="{{ route('seo.update', $Seo->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Offers Type</label>
                                        <div class="input-group">
                                            <!-- <input type="hidden" name="id" value="{{ $Seo->id ? $Seo->id:''}}"> -->
                                            <input type="text" class="form-control package_type" name="title" value="{{ $Seo->title ? $Seo->title:''}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label>Slug *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_slug" name="slug" value="{{ $Seo->slug ? $Seo->slug:''}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>Description</label>
                                        <div class="input-group">
                                            <textarea type="text" rows="5" class="form-control" name="description">{{ $Seo->description ? $Seo->description:''}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Keywords</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="keyword" value="{{ $Seo->keyword ? $Seo->keyword:''}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Status *</label>
                                        <div class="input-group">
                                            <select name="is_active" class="form-control">
                                                <option value="1" {{ $Seo->is_active == '1' ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $Seo->is_active == '0' ? 'selected' : '' }}>Inactive</option>
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