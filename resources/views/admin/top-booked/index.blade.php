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
                        <a href="{{ URL::asset('admin/top-booked/create') }}" class="btn btn-primary d-block float-right" style="margin-bottom: 20px;">Add Top Booked</a>
                        <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                            <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i class="fas fa-home fs-16"></i> Home</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Top Booked</li>
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
                        <h6>Top Booked List</h6>
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
                                                    <th>Package</th>
                                                    <th>Lab Test</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                @foreach ($top_booked as $booked)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $booked->id }}</td>
                                                        <td>{{ $booked->package_title }}</td>
                                                        <td>{{ $booked->lab_test_title }}</td>
                                                        <td>
                                                            @if($booked->is_active == 1)
                                                                <span class="badge badge-success">Active</span>
                                                            @endif
                                                            @if($booked->is_active == 0)
                                                                <span class="badge badge-danger">Inactive</span>
                                                            @endif
                                                        </td>

                                                        <td style="display: flex;">
                                                            <a href="{{ route('top-booked.edit', $booked->id) }}"><i class="fas fa-pencil-alt text-secondary"></i></a>
                                                            <a href="{{ url('admin/top-booked/delete/'. $booked->id) }}"><i class="far fa-trash-alt text-danger"></i></a>
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



