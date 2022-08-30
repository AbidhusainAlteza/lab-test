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
                            <li class="breadcrumb-item active" aria-current="page">Lab Test</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="total_labtest">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">science</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Total Lab Test</h6>
                                    <h6>{{$total_labtest}}</h6>
                                  </div>
                                </div>
                              </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="active_labtest">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">science</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Active Lab Test</h6>
                                    <h6>{{$active_labtest}}</h6>
                                  </div>
                                </div>
                              </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="inactive_labtest">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">science</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Inactive Lab Test</h6>
                                    <h6>{{$inactive_labtest}}</h6>
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
                            <div class="col-md-3 ">
                                <h6>Lab Test List</h6>
                            </div>
                            <div class="col-md-9">
                                <a href="{{ URL::asset('admin/lab-test-manage/create') }}" class="btn btn-primary d-block float-right" style="margin-bottom: 20px;">Add Lab Test</a>
                                <button class="btn btn-primary float-right mr-1" data-toggle="modal" data-target="#modal-16">Import Lab Test Csv File</button>
                                <button class="btn btn-primary float-right mr-1" data-toggle="modal" data-target="#modal-17">Import Lab Test Result Table Csv File</button>
                            </div>
                        </div>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive">
                            <div id="data-table-5_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="data_table" class="labtest_manage_table table w-100 thead-primary dataTable no-footer" role="grid" aria-describedby="data-table-5_info" style="width: 100%!important;">
                                            <thead>
                                                <tr role="row">
                                                    <th>Id</th>
                                                    <th>Title</th>
                                                    <th>Slug</th>
                                                    <th>Image</th>
                                                    <th>Price</th>
                                                    <th>Discount</th>
                                                    <th>Offer_Price</th>
                                                    <th>Duration</th>
                                                    <th>Sample Required</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($lab_test_array as $lab_test)
                                                <tr role="row" class="odd">
                                                    <td>
                                                        <a class="font-weight-bold" href="{{ route('lab-test-manage.edit', $lab_test->id) }}">
                                                            {{ $lab_test->id }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $lab_test->title }}</td>
                                                    <td>{{ $lab_test->slug }}</td>
                                                    <td>
                                                        <a href="" data-toggle="modal" data-target="#modal-9"><img src="{{ URL('upload/lab_test_manage/')}}/{{$lab_test->image}}" data-image="{{ URL('upload/lab_test_manage/')}}/{{$lab_test->image}}" class="imagelink" style='width:70px'></a>
                                                    </td>
                                                    {{-- <!-- <td>{{ $lab_test->description }}</td> -->
                                                    <!-- <td>{{ $lab_test->short_description }}</td> -->
                                                    <!-- <td>{{ $lab_test->test_preparation }}</td> -->
                                                    <!-- <td>{{ $lab_test->result_understand }}</td> --> --}}
                                                    <td>{{ $lab_test->price }}</td>
                                                    <td>{{ $lab_test->discount }}</td>
                                                    <td>{{ $lab_test->offer_price }}</td>
                                                    <!-- <td>{{ $lab_test->is_prescription }}</td> -->
                                                    <td>{{ $lab_test->duration }}</td>
                                                    <td>{{ $lab_test->sample_required }}</td>

                                                    <td>
                                                        @if($lab_test->is_active == 1)
                                                            <a class="lab-test-active-inactive" data="0" href="javascript:void(0)" item-id="{{$lab_test->id}}"><span class="badge badge-success">Active</span></a>
                                                        @endif
                                                        @if($lab_test->is_active == 0)
                                                            <a class="lab-test-active-inactive" data="1" href="javascript:void(0)" item-id="{{$lab_test->id}}"><span class="badge badge-danger">Inactive</span></a>
                                                        @endif
                                                    </td>

                                                    <td >
                                                        {{-- <a href="{{ route('lab-test-manage.edit', $lab_test->id) }}"><i class="fas fa-pencil-alt text-secondary"></i></a> --}}
                                                        {{-- <a href="{{ url('admin/lab-test-manage-delete/'. $lab_test->id) }}" class="lab-test-manage-delete" data="{{$lab_test->id}}" name="delete"><i class="far fa-trash-alt text-danger"></i></a> --}}
                                                        <a href="javascript:void(0)" class="lab-test-manage-delete" data="{{$lab_test->id}}" name="delete"><i class="far fa-trash-alt text-danger"></i></a>
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
        {{-- modal csv upload --}}
        <div class="modal fade" id="modal-16" tabindex="-1" role="dialog" aria-labelledby="modal-16">
            <div class="modal-dialog modal-dialog-centered modal-max" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h1>Import Lab- Test Csv File</h1>
                    <p>only Csv files are accepted  <a href="{{url('admin/lab-test-manage-csv-download')}}">chek the demo</a></p>
                    <form action="{{url('admin/lab-test-manage-csv-uplod')}}" method="POST" enctype="multipart/form-data">
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
        {{-- result-table MODAL --}}
        <div class="modal fade" id="modal-17" tabindex="-1" role="dialog" aria-labelledby="modal-17">
            <div class="modal-dialog modal-dialog-centered modal-max" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h1>Import Lab Test Result Table Csv File</h1>
                    <p>only Csv files are accepted  <a href="{{url('admin/lab-test-result-table-csv-download')}}">chek the demo</a></p>
                    <form action="{{url('admin/lab-test-result-table-csv-uplod')}}" method="POST" enctype="multipart/form-data">
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
                $('.imageset').prop("src",img);
            });
            // $(document).on("click", ".lab-test-manage-delete", function(){
            //         console.log('sd')
            //     });
            $(document).on('click','.lab-test-manage-delete',function(){
                var lab_test_manage_id = $(this).attr('data');
                console.log(lab_test_manage_id)
                swal({
                    title: "Are you sure?",
                    text: "To delete lab test",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Do it!',
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#4eb92d',
                }).then((result) => {
                    if(result.value){
                        $.ajax({
                            type:'POST',
                            url:base_url+'/admin/lab-test-manage-delete',
                            data:{
                                "lab_test_manage_id":lab_test_manage_id
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
<script src="{{ URL::asset('admin/js/lab_test_manage.js') }}"></script>

@endsection
