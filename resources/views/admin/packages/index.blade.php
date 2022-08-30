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
                            <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i class="fas fa-home fs-16"></i> Home</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Packages</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="total_package">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">view_timeline</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Total Package</h6>
                                    <h6>{{$total_package}}</h6>
                                  </div>
                                </div>
                              </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="active_package">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">view_timeline</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Active Package</h6>
                                    <h6>{{$active_package}}</h6>
                                  </div>
                                </div>
                              </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="inactive_package">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">view_timeline</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Inactive Package</h6>
                                    <h6>{{$inactive_package}}</h6>
                                  </div>
                                </div>
                              </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    @include('flash_message')
                </div>

                <div class="ms-panel col-md-12">
                    <div class="ms-panel-header">
                        <div class="row align-items-center">
                            <div class="col-md-6 ">
                                <h6>Packages List</h6>
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{ URL::asset('admin/packages/create') }}" class="btn btn-primary d-block float-right" style="margin-bottom: 20px;">Add Packages</a>
                            </div>
                        </div>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive">
                            <div id="data-table-5_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="data_table" class="package-table table w-100 thead-primary dataTable no-footer" role="grid" aria-describedby="data-table-5_info" style="width: 100%!important;">
                                            <thead>
                                                <tr role="row">
                                                    <th>Id</th>
                                                    <th>Package Type</th>
                                                    <!-- <th>Test Name</th> -->
                                                    {{-- <th>Total_Test</th> --}}
                                                    <th>Title</th>
                                                    <th>Slug</th>
                                                    <th>Image</th>
                                                    <th>Description</th>
                                                    <th>Total_Amount</th>
                                                    <th>Discount(%)</th>
                                                    <th>Offer Amount</th>
                                                    <th>Offer Valid</th>
                                                    <th>Status</th>
                                                    <th>Top Booked</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                    @foreach ($packages_array as $packages)
                                                    <tr role="row" class="odd">
                                                        <td>
                                                            <a class="font-weight-bold" href="{{ route('packages.edit', $packages->id) }}">
                                                                {{ $packages->id }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a class="font-weight-bold" href="{{ route('packages.edit', $packages->id) }}">
                                                                {{ucwords($packages->package_type)}}
                                                            </a>
                                                        </td>
                                                        {{-- <td>{{ $users->where('package_id', $packages->id)->count() }}</td> --}}
                                                        <td>{{ ucwords($packages->title) }}</td>
                                                        <td>{{ $packages->slug }}</td>
                                                        <td>
                                                            <a href="" data-toggle="modal" data-target="#modal-9"><img src="{{ URL('upload/packages/')}}/{{$packages->image}}" data-image="{{ URL('upload/packages/')}}/{{$packages->image}}" class="imagelink" style='width:70px'></a>
                                                        </td>
                                                        <td>{{ $packages->description }}</td>
                                                        <td>{{ $packages->total_amount }}</td>
                                                        <td>{{ $packages->discount }}</td>
                                                        <td>{{ $packages->offer_amount }}</td>
                                                        <td>{{ date("d-m-Y",strtotime($packages->offer_valid_till)) }}</td>

                                                        <td>
                                                            @if($packages->is_active == 1)
                                                                <a class="package-active-inactive" data="0" href="javascript:void(0)" item-id="{{$packages->id}}"><span class="badge badge-success">Active</span></a>
                                                            @endif
                                                            @if($packages->is_active == 0)
                                                                <a class="package-active-inactive" data="1" href="javascript:void(0)" item-id="{{$packages->id}}"><span class="badge badge-danger">Inactive</span></a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($packages->top_booked == '1')
                                                                <a class="package_top_book" data="0" href="javascript:void(0)" book-id="{{$packages->id}}"><span class="badge badge-success">Show</span></a>
                                                            @endif
                                                            @if($packages->top_booked == 0)
                                                                <a class="package_top_book" data="1" href="javascript:void(0)" book-id="{{$packages->id}}"><span class="badge badge-danger">Hide</span></a>
                                                            @endif
                                                        </td>

                                                        <td style="display: flex;">
                                                            <a href="{{ route('packages.edit', $packages->id) }}"><i class="fas fa-pencil-alt text-secondary"></i></a>

                                                            {{-- <a href="{{ url('admin/packages-destroy/'. $packages->id) }}"><i class="far fa-trash-alt text-danger"></i></a> --}}
                                                            <a href="javascript:void(0)" class="package-delete" data="{{$packages->id}}"><i class="far fa-trash-alt text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <!-- Model -->
                                                <div class="modal fade" id="modal-9" tabindex="-1" role="dialog" aria-labelledby="modal-9">
                                                    <div class="modal-dialog modal-dialog-centered modal-max" role="document">
                                                        <div class="modal-content">

                                                        <div class="modal-body">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <img style="width:100%" src="" class="imageset">
                                                            <br><br>
                                                        </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ------ -->
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

    <script>
        $(document).ready(function(){
            $(document).on('click','.imagelink',function(){
                var img = $(this).data('image');
                $('.imageset').prop("src",img);
            });
            $(document).on('click','.package-delete',function(){
                var base_url = window.location.origin;
                var package_delete_id = $(this).attr('data');
                console.log(package_delete_id)
                swal({
                    title: "Are you sure?",
                    text: "To delete package type",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Do it!',
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#4eb92d',
                }).then((result) => {
                    if(result.value){
                        $.ajax({
                            type:'POST',
                            url:base_url+'/admin/package-delete',
                            data:{
                                "package_delete_id":package_delete_id
                            },
                            success:function(data) {
                                if(data == 1){
                                    location.reload()
                                }else{
                                    swal('Samthing Worng')
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>

@endsection

@section('script_js')
<script src="{{ URL::asset('admin/js/package.js') }}"></script>
@endsection


