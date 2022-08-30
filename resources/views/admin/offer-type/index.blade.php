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
                            <li class="breadcrumb-item" aria-current="page"> <a href="{{ URL::asset('dashboard') }}"><i class="material-icons">home</i> Home</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Offers Type</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="total_offer_type">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">shopping_bag</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Total offer type</h6>
                                    <h6>{{$total_offer_type}}</h6>
                                  </div>
                                </div>
                              </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="active_offer_type">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">shopping_bag</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Active offer type</h6>
                                    <h6>{{$active_offer_type}}</h6>
                                  </div>
                                </div>
                              </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="inactive_offer_type">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">shopping_bag</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Inactive offer type</h6>
                                    <h6>{{$inactive_offer_type}}</h6>
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
                                <h6>Offers Type</h6>
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{ URL::asset('admin/offer-type/create') }}" class="btn btn-primary d-block float-right" style="margin-bottom: 20px;">Add Offers Type</a>
                            </div>
                        </div>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive">
                            <div id="data-table-5_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="data_table" class="offer-type-table table w-100 thead-primary dataTable no-footer" role="grid" aria-describedby="data-table-5_info" style="width: 100%!important;">
                                            <thead>
                                                <tr role="row">
                                                    <th>Id</th>
                                                    <th>Offers Type</th>
                                                    <th>Slug</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($offers as $offer)
                                                <tr role="row" class="odd">
                                                    <td>
                                                        <a class="font-weight-bold" href="{{ route('offer-type.edit', $offer->id) }}">
                                                            {{ $offer->id }}
                                                        </a>
                                                    </td>
                                                    <td>{{ ucwords($offer->title) }}</td>
                                                    <td>{{ $offer->slug }}</td>

                                                    <td>
                                                        @if($offer->is_active == 1)
                                                            <a class="offer-type-active-inactive" href="javascript:void(0)" data="0" item-id="{{$offer->id}}"><span class="badge badge-success">Active</span></a>
                                                        @endif
                                                        @if($offer->is_active == 0)
                                                            <a class="offer-type-active-inactive" href="javascript:void(0)" data="1" item-id="{{$offer->id}}"><span class="badge badge-danger">Inactive</span></a>
                                                        @endif
                                                    </td>

                                                    <td style="display: flex;">
                                                        {{-- <a href="{{ route('offer-type.edit', $offer->id) }}"><i class="fas fa-pencil-alt text-secondary"></i></a> --}}
                                                        {{-- <a href="{{url('')}}/admin/offer-type-delete/{{$offer->id}}"><i class="far fa-trash-alt text-danger"></i></a> --}}
                                                        <a href="javascript:void(0)" class="offer-type-delete" data="{{$offer->id}}"><i class="far fa-trash-alt text-danger"></i></a>
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
        $(document).on('click','.offer-type-delete',function(){
            var base_url = window.location.origin;
            var offer_type_delete_id = $(this).attr('data');
            console.log(offer_type_delete_id)
            swal({
                title: "Are you sure?",
                text: "To delete Offer type",
                showCancelButton: true,
                confirmButtonText: 'Yes, Do it!',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#4eb92d',
            }).then((result) => {
                if(result.value){
                    $.ajax({
                        type:'POST',
                        url:base_url+'/admin/offer-type-delete',
                        data:{
                            "offer_type_delete_id":offer_type_delete_id
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
<script src="{{ URL::asset('admin/js/offer.js') }}"></script>
@endsection
