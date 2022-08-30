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
                            <li class="breadcrumb-item active" aria-current="page">Slider Item</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="total_slider">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">photo_library</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Total Slider</h6>
                                    <h6>{{$total_slider}}</h6>
                                  </div>
                                </div>
                              </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="active_slider">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">photo_library</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Active Slider</h6>
                                    <h6>{{$active_slider}}</h6>
                                  </div>
                                </div>
                              </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="inactive_slider">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">photo_library</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Inactive Slider</h6>
                                    <h6>{{$inactive_slider}}</h6>
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
                                <h6>Slider Item</h6>
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{url('admin/slider/create')}}" class="btn btn-primary d-block float-right">Add Slider Item</a>
                            </div>
                        </div>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive">
                            <div id="data-table-5_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="data_table" class="slider-table table w-100 thead-primary dataTable no-footer" role="grid" aria-describedby="data-table-5_info" style="width: 100%!important;">
                                            <thead>
                                                <tr role="row">
                                                    <th>Title</th>
                                                    <th>Slug</th>
                                                    <th>Redirect URL</th>
                                                    <th>image</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Slider as $banner)
                                                <tr role="row" class="odd">
                                                    <td class="text-capitalize">
                                                        <a class="font-weight-bold" href="{{ route('slider.edit', $banner->id) }}">
                                                            {{ $banner->title }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $banner->slug }}</td>
                                                    <td>{{ $banner->url }}</td>
                                                    <td>
                                                        <a href="" data-toggle="modal" data-target="#modal-9"><img src="{{ url('/upload/slider')}}/{{$banner->image}}" data-image="{{ url('/upload/slider')}}/{{$banner->image}}" class="imagelink" style='width:100px'></a></td>
                                                    <td>
                                                        @if($banner->is_active == 1)
                                                            <a class="slider-active-inactive" href="javascript:void(0)" data="0" item-id="{{$banner->id}}" ><span class="badge badge-success">Active</span></a>
                                                        @endif
                                                        @if($banner->is_active == 0)
                                                            <a class="slider-active-inactive" href="javascript:void(0)" data="1" item-id="{{$banner->id}}"><span class="badge badge-danger">Inactive</span></a>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('slider.edit', $banner->id) }}"><i class="fas fa-pencil-alt text-secondary"></i></a>
                                                        {{-- <a href="{{ url('admin/slider/delete/'. $banner['id'])}}"><i class="far fa-trash-alt text-danger"></i></a> --}}
                                                        <a href="javascript:(0)" class="slider-delete" data="{{$banner->id}}"><i class="far fa-trash-alt text-danger"></i></a>
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
            $(document).on('click','.slider-delete',function(){
                var slider_delete_id = $(this).attr('data');
                console.log(slider_delete_id)
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
                            url:base_url+'/admin/slider-delete',
                            data:{
                                "slider_delete_id":slider_delete_id
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
<script src="{{ URL::asset('admin/js/slider.js') }}"></script>
@endsection
