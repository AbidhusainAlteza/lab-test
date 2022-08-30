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
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="fas fa-home fs-16"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/top-booked')}}">Top Booked</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Top Booked</li>
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
                            <h6>Edit Form</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form method='POST' action="{{ route('top-booked.update', $top_booked->id) }}">
                                @csrf
                                @method('PATCH')

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Packages</label>
                                        <div class="input-group">
                                            <select class="form-control" name="package_type" required>
                                                    <option value="">Select Packages</option>
                                                    @foreach($package as $p)
                                                        <option value="{{$p->id}}"  {{$top_booked->package_id == $p->id ? 'selected' : '' }}> {{ucwords($p->title)}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Lab Test Name </label>
                                        <div class="inputFields">
                                            <select class="form-control" name="lab_test_id">
                                                <option value="" Disabled>Select Lab Test Name</option>
                                                @foreach($lab_test_array as $lab_test)
                                                    <option value="{{$lab_test->id}}"> {{$lab_test->title}} </option>
                                                @endforeach
                                            </select>
                                        </div> 
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Status *</label>
                                        <div class="input-group">
                                            <select name="is_active" class="form-control" required>
                                                <option value="1" {{ $top_booked->is_active == '1' ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $top_booked->is_active == '0' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                            
                                    <div class="col-md-12 pt-5">
                                        <button class="btn btn-primary px-5" type="submit">Save</button>
                                        <a href="{{ URL('admin/top-booked') }}" class="btn btn-info  px-5 mx-5">Back</a>
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


