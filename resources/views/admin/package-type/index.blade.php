

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
                            <li class="breadcrumb-item" aria-current="page"> <a href="{{ URL::asset('dashboard') }}"><i class="fas fa-home fs-16"></i> Home</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Packages Type</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="total_package_type">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">view_timeline</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Total Package Type</h6>
                                    <h6>{{$total_package_type}}</h6>
                                  </div>
                                </div>
                              </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="active_package_type">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">view_timeline</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Active Package Type</h6>
                                    <h6>{{$active_package_type}}</h6>
                                  </div>
                                </div>
                              </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="inactive_package_type">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">view_timeline</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Inactive Package Type</h6>
                                    <h6>{{$inactive_package_type}}</h6>
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
                                <h6>Packages Type</h6>
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{ URL::asset('admin/package-type/create') }}" class="btn btn-primary d-block float-right" style="margin-bottom: 20px;">Add Packages Type</a>
                            </div>
                        </div>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive">
                            <div id="data-table-5_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="data_table" class="package-type-table table w-100 thead-primary dataTable no-footer" role="grid" aria-describedby="data-table-5_info" style="width: 100%!important;">
                                            <thead>
                                                <tr role="row">
                                                    <th>Id</th>
                                                    <th>Package Type</th>
                                                    <th>Slug</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    @foreach($product_type as $product)
                                                    <tr role="row" class="odd">
                                                        <td>
                                                            <a class="font-weight-bold" href="{{ route('package-type.edit', $product->id) }}">
                                                                {{ $product->id }}
                                                            </a>
                                                        </td>
                                                        <td class="text-capitalize">
                                                            <a class="font-weight-bold" href="{{ route('package-type.edit', $product->id) }}">
                                                                {{ ucwords($product->package_type) }}
                                                            </a>
                                                        </td>
                                                        <td class="text-capitalize">{{ $product->slug }}</td>
                                                        <td>
                                                            @if($product->is_active == 1)
                                                                <a class="pack-type-active-inactive" data="0" href="javascript:void(0)" item-id="{{$product->id}}"><span class="badge badge-success">Active</span></a>
                                                            @endif
                                                            @if($product->is_active == 0)
                                                                <a class="pack-type-active-inactive" data="1" href="javascript:void(0)" item-id="{{$product->id}}"><span class="badge badge-danger">Inactive</span></a>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <a href="{{ route('package-type.edit', $product->id) }}"><i class="fas fa-pencil-alt text-secondary"></i></a>
                                                            {{-- <a href="{{ url('admin/package-type/delete/'. $product->id) }}"><i class="far fa-trash-alt text-danger"></i></a> --}}
                                                            <a href="javascript:void(0)" class="package-type-delete" data="{{$product->id}}"><i class="far fa-trash-alt text-danger"></i></a>
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
<script>
    $(document).ready(function(){
        var base_url = window.location.origin;
        $(document).on('click','.package-type-delete',function(){
            var package_type_id = $(this).attr('data');
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
                        url:base_url+'/admin/package-type-delete',
                        data:{
                            "package_type_id":package_type_id
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
        })
    });
</script>
@endsection

@section('script_js')
<script src="{{ URL::asset('admin/js/package.js') }}"></script>
@endsection








