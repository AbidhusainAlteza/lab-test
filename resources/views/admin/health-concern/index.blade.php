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
                    <li class="breadcrumb-item active" aria-current="page">Health Concern Details</li>
                </ol>
                </nav>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="total_health_concern">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">add_box</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Total Health Concern</h6>
                                <h6>{{$total_health_concern}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="active_health_concern">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">add_box</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Active Health Concern</h6>
                                <h6>{{$active_health_concern}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="inactive_health_concern">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">add_box</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Inactive Health Concern</h6>
                                <h6>{{$inactive_health_concern}}</h6>
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
                            <h6>Health Concern List</h6>
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{ URL::asset('admin/health-concern/create') }}" class="btn btn-primary d-block float-right" style="margin-bottom: 20px;">Add Health Concern</a>
                            <button class="btn btn-primary float-right mr-1" data-toggle="modal" data-target="#modal-15">Import Csv File</button>
                        </div>
                    </div>
                </div>
                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table id="data_table" class="table w-100 thead-primary health_concern_table">
                            <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <!-- <th>Description</th> -->
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($health_concern_array as $health_concern)
                            <tr role="row" class="odd">
                                <td>
                                    <a class="font-weight-bold" href="{{ route('health-concern.edit', $health_concern->id) }}">
                                        {{ $health_concern->id }}
                                    </a>
                                </td>
                                <td class="text-capitalize">
                                    <a class="font-weight-bold" href="{{ route('health-concern.edit', $health_concern->id) }}">
                                        {{ $health_concern->title }}
                                    </a>
                                </td>
                                <td class="text-capitalize">{{ $health_concern->slug }}</td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#modal-9"><img src="{{ URL('upload/health_concern/')}}/{{$health_concern->image}}" data-image="{{ URL('upload/health_concern/')}}/{{$health_concern->image}}" class="imagelink" style='width:70px'></a>
                                </td>

                                <td>
                                    @if($health_concern->is_active == 1)
                                        <a class="health-concern-active-inactive" data="0" href="javascript:void(0)" item-id="{{$health_concern->id}}"><span class="badge badge-success">Active</span></a>
                                    @endif
                                    @if($health_concern->is_active == 0)
                                        <a class="health-concern-active-inactive" data="1" href="javascript:void(0)" item-id="{{$health_concern->id}}"><span class="badge badge-danger">Inactive</span></a>
                                    @endif
                                </td>

                                <td style="display: flex;">
                                    {{-- <a href="{{ route('health-concern.edit', $health_concern->id) }}"><i class="fas fa-pencil-alt text-secondary"></i></a> --}}
                                    <a href="javascript:void(0)" class="health-concern-delete" data="{{$health_concern->id}}"><i class="far fa-trash-alt text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal csv upload --}}
    <div class="modal fade" id="modal-15" tabindex="-1" role="dialog" aria-labelledby="modal-15">
        <div class="modal-dialog modal-dialog-centered modal-max" role="document">
          <div class="modal-content">

            <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h1>Import Csv File</h1>
              <p>only Csv files are accepted  <a href="{{url('admin/health-concern-csv-download')}}">chek the demo</a></p>
              <form action="{{url('admin/health-concern-csv-uplod')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ms-form-group has-icon">
                  <input type="file" placeholder="" class="form-control p-3" name="csv_file" value="" required>
                </div>
                <div class="d-flex justify-content-between">
                  <button type="submit" class="btn btn-primary shadow-none">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function(){
        var base_url = window.location.origin;
        $(document).on('click','.imagelink',function(){
            var img = $(this).data('image');
            console.log(img);
            $('.imageset').prop("src",img);
        });
        // health-concern-delete
        $(document).on('click','.health-concern-delete',function(){
            var health_concern_id = $(this).attr('data');
            console.log(health_concern_id)
            swal({
                title: "Are you sure?",
                text: "To delete Health Concern",
                showCancelButton: true,
                confirmButtonText: 'Yes, Do it!',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#4eb92d',
            }).then((result) => {
                if(result.value){
                    $.ajax({
                        type:'POST',
                        url:base_url+'/admin/health-concern-delete',
                        data:{
                            "health_concern_id":health_concern_id
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
<script src="{{ URL::asset('admin/js/health_concern.js') }}"></script>
@endsection
