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
                <a href="{{ URL::asset('admin/lab-partner/create') }}" class="btn btn-primary d-block float-right" style="margin-bottom: 20px;">Add Lab Partner</a>
                <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                    <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i class="fas fa-home fs-16"></i> Home</a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Lab Partner Details</li>
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
                    <h6>Lab Partner List</h6>
                </div>
                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table id="data_table" class="table w-100 thead-primary">
                            <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Lab Name</th>
                                    <th>Lab Address</th>
                                    <th>GST No</th>
                                    <th>POS</th>
                                    <th>Lab Person</th>
                                    <th>Lab License</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($lab_partner as $lab)
                            <tr role="row" class="odd">
                                <td>{{ $lab->id }}</td>
                                <td>{{ $lab->lab_name }}</td>
                                <td>{{ $lab->lab_address }}</td>
                                <td>{{ $lab->gst_no }}</td>
                                <td>{{ $lab->pos }}</td>
                                <td>{{ $lab->lab_person }}</td>
                                <td>{{ $lab->lab_license }}</td>

                                <td>
                                    @if($lab->is_active == 1)
                                        <a class="lab-partner-active" href="javascript:void(0)" item-id="{{$lab->id}}"><span class="badge badge-success">Active</span></a>
                                    @endif
                                    @if($lab->is_active == 0)
                                        <a class="lab-partner-inactive" href="javascript:void(0)" item-id="{{$lab->id}}"><span class="badge badge-danger">Inactive</span></a>
                                    @endif
                                </td>

                                <td style="display: flex;">
                                    <a href="{{ route('lab-partner.edit', $lab->id) }}"><i class="fas fa-pencil-alt text-secondary"></i></a>
                                    {{-- <a href="{{ url('admin/lab-partner/delete/'. $lab->id)}}" name="delete"><i class="far fa-trash-alt text-danger"></i></a> --}}
                                    <a href="javascript:void(0)" class="lab-partner-delete" data="{{$lab->id}}" name="delete"><i class="far fa-trash-alt text-danger"></i></a>
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
                            <!-- ------ -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function(){
        var base_url = window.location.origin;
        $('.imagelink').click(function(){
            var img = $(this).data('image');
            $('.imageset').prop("src",img);
        });
        $(document).on('click','.lab-partner-delete',function(){
            var lab_partner_id = $(this).attr('data');
            console.log(lab_partner_id)
            swal({
                title: "Are you sure?",
                text: "To Delete lab partner",
                showCancelButton: true,
                confirmButtonText: 'Yes, Do it!',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#4eb92d',
            }).then((result) => {
                if(result.value){
                    $.ajax({
                        type:'POST',
                        url:base_url+'/admin/lab-partner-delete',
                        data:{
                            "lab_partner_id":lab_partner_id
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
