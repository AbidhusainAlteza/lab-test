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
                        <a href="{{ URL::asset('admin/seo/create') }}" class="btn btn-primary d-block float-right" style="margin-bottom: 20px;">Add SEO Details</a>
                        <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                            <li class="breadcrumb-item" aria-current="page"> <a href="{{ URL::asset('dashboard') }}"><i class="fas fa-home fs-16"></i> Home</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">SEO Details</li>
                        </ol>
                    </nav>
                </div>

                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <i class="flaticon-tick-inside-circle"></i>
                        <strong>Well done! </strong> {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        <i class="flaticon-alert-1"></i>
                        <strong>Sorry! </strong> {{ Session::get('error') }}
                    </div>
                @endif

                <div class="ms-panel col-md-12">
                    <div class="ms-panel-header">
                        <h6>SEO Details</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive">
                            <div id="data-table-5_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="data_table" class="table w-100 thead-primary dataTable no-footer" role="grid" aria-describedby="data-table-5_info" style="width: 100%!important;">
                                            <thead>
                                                <tr role="row">
                                                    <th>Id</th>
                                                    <th>Title</th>
                                                    <th>Slug</th>
                                                    <!-- <th>Meta Description</th> -->
                                                    <th>Keyword</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($Seo as $s)
                                                <tr role="row" class="odd">
                                                    <td>{{ $s->id }}</td>
                                                    <td>{{ $s->title }}</td>
                                                    <td>{{ $s->slug }}</td>
                                                    <td>{{ $s->keyword }}</td>
                                                    <td>
                                                        @if($s->is_active == 1)
                                                            <a class="seo-active" href="javascript:void(0)" item-id="{{$s->id}}"><span class="badge badge-success">Active</span></a>
                                                        @endif
                                                        @if($s->is_active == 0)
                                                            <a class="seo-inactive" href="javascript:void(0)" item-id="{{$s->id}}"><span class="badge badge-danger">Inactive</span></a>
                                                        @endif
                                                    </td>
                                                    <td style="display: flex;">
                                                        <a href="{{ route('seo.edit', $s->id) }}"><i class="fas fa-pencil-alt text-secondary"></i></a>

                                                        <a href="{{ url('admin/seo/delete/'. $s->id) }}"><i class="far fa-trash-alt text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection










