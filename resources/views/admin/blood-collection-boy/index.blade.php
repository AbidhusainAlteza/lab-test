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
                    <li class="breadcrumb-item active" aria-current="page">Blood Collection Boy Details</li>
                </ol>
                </nav>
            </div>

            @include('flash_message')

            <div class="ms-panel col-md-12">
                <div class="ms-panel-header">
                    <div class="row align-items-center">
                        <div class="col-md-6 ">
                            <h6>Blood Collection Boy List</h6>
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{ URL::asset('admin/blood-collection-boy/create') }}" class="btn btn-primary float-right" >Add Blood Collection Boy</a>
                        </div>

                    </div>
                </div>
                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table id="data_table" class="table w-100 thead-primary">
                            <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Name</th>
                                    {{-- <th>Image</th> --}}
                                    <th>E-Mail</th>
                                    <th>Phone No</th>
                                    <th>Pincode</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Area</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($blood_boy as $boy)
                            <tr role="row" class="odd">
                                <td>
                                    <a class="font-weight-bold" href="{{ route('blood-collection-boy.edit', $boy->id) }}">{{ $boy->id }}</a>
                                </td>
                                <td>
                                    <a class="font-weight-bold" href="{{ route('blood-collection-boy.edit', $boy->id) }}">
                                        {{ $boy->name }}
                                    </a>
                                </td>
                                {{-- <td>
                                    <a href="" data-toggle="modal" data-target="#img_show_modal">
                                        <img src="{{ URL('upload/blood_boy/')}}/{{$boy->image}}" data-image="{{ URL('upload/blood_boy/')}}/{{$boy->image}}" class="img_show_class" style='width:60px'>
                                    </a>
                                </td> --}}
                                <td>{{ $boy->email }}</td>
                                <td>{{ $boy->contact }}</td>
                                <td>{{ $boy->pincode }}</td>
                                <td>{{ $boy->city }}</td>
                                <td>{{ $boy->state }}</td>
                                <td>{{ $boy->area }}</td>

                                <td>
                                    @if($boy->is_active == 1)
                                        <a class="blood_boy_active_inactive" data="0" href="javascript:void(0)" item-id="{{$boy->id}}"><span class="badge badge-success">Active</span></a>
                                    @endif
                                    @if($boy->is_active == 0)
                                        <a class="blood_boy_active_inactive" data="1" href="javascript:void(0)" item-id="{{$boy->id}}"><span class="badge badge-danger">Inactive</span></a>
                                    @endif
                                </td>

                                <td style="display: flex;">
                                    <a href="javascript:void(0)" class="blood-collection-boy-delete" data="{{$boy->id}}"><i class="far fa-trash-alt text-danger"></i></a>
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
</main>

<script>
    $(document).ready(function(){
        $(document).on('click','.blood-collection-boy-delete',function(){
            var blood_collection_boy_delete = $(this).attr('data');
            console.log(blood_collection_boy_delete)
            swal({
                title: "Are you sure?",
                text: "To blood collection boy",
                showCancelButton: true,
                confirmButtonText: 'Yes, Do it!',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#4eb92d',
            }).then((result) => {
                if(result.value){
                    $.ajax({
                        type:'POST',
                        url:base_url+'/admin/blood-collection-boy-delete',
                        data:{
                            "blood_collection_boy_delete":blood_collection_boy_delete
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
