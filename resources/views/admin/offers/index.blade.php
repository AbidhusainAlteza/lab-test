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
                        <a href="{{ URL::asset('admin/offers/create') }}" class="btn btn-primary d-block float-right" style="margin-bottom: 20px;">Add Offers Item</a>
                        <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                            <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i class="material-icons">home</i> Home</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Offers</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="total_offer">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">shopping_bag</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Total offer</h6>
                                    <h6>{{$total_offer}}</h6>
                                  </div>
                                </div>
                              </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="active_offer">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">shopping_bag</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Active offer</h6>
                                    <h6>{{$active_offer}}</h6>
                                  </div>
                                </div>
                              </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <a href="javascript:void(0)" class="inactive_offer">
                              <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                                {{-- <span class="msg-count">5</span> --}}
                                <div class="ms-panel-body media">
                                  <i class="material-icons">shopping_bag</i>
                                  <div class="media-body">
                                    <h6 class="text-capitalize">Inactive offer</h6>
                                    <h6>{{$inactive_offer}}</h6>
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
                                <h6>Offers List</h6>
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{ URL::asset('admin/offers/create') }}" class="btn btn-primary d-block float-right" style="margin-bottom: 20px;">Add Offers Item</a>
                            </div>
                        </div>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive">
                            <div id="data-table-5_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                @if($errors-> any())
                                    <div style="color:red;">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="data_table" class="offer-table table w-100 thead-primary dataTable no-footer" role="grid" aria-describedby="data-table-5_info" style="width: 100%!important;">
                                            <thead>
                                                <tr role="row">
                                                    <th>Id</th>
                                                    <th>Title</th>
                                                    <th>Slug</th>
                                                    <th>Image</th>
                                                    <th>Description</th>
                                                    <th>Coupen Code</th>
                                                    <th>Discount(%)</th>
                                                    <th>Discount Type</th>
                                                    <th>Min Order Amount</th>
                                                    <th>Max Order Amount</th>
                                                    <th>Valid For</th>
                                                    <th>Exp Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($offers_array as $offers)
                                                    <tr role="row" class="odd">
                                                        <td>
                                                            <a class="font-weight-bold" href="{{ route('offers.edit', $offers->id) }}">
                                                                {{ $offers->id }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a class="font-weight-bold" href="{{ route('offers.edit', $offers->id) }}">
                                                                {{ $offers->title }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $offers->slug }}</td>
                                                        <td>
                                                            <a href="" data-toggle="modal" data-target="#modal-9"><img src="{{ URL('upload/offers/')}}/{{$offers->image}}" data-image="{{ URL('upload/offers/')}}/{{$offers->image}}" class="imagelink" style='width:50px'></a>
                                                        </td>
                                                        <td>{{ $offers->description }}</td>
                                                        <td>{{ $offers->coupon_code }}</td>
                                                        <td>{{ $offers->discount_amount }}</td>
                                                        <td>{{ $offers->offers_type_title }}</td>
                                                        <td>{{ $offers->min_order_amount }}</td>
                                                        <td>{{ $offers->max_order_amount }}</td>
                                                        <td>{{ $offers->valid_for }}</td>
                                                        <td>{{ $offers->exp_date }}</td>
                                                        <td>
                                                            @if($offers->is_active == 1)
                                                                <a class="offers-active-inactive" href="javascript:void(0)" data="0" item-id="{{$offers->id}}"><span class="badge badge-success">Active</span></a>
                                                            @endif
                                                            @if($offers->is_active == 0)
                                                                <a class="offers-active-inactive" href="javascript:void(0)" data='1' item-id="{{$offers->id}}"><span class="badge badge-danger">Inactive</span></a>
                                                            @endif
                                                        </td>
                                                        <td style="display: flex;">
                                                            {{-- <a href="{{ route('offers.edit', $offers->id) }}"><i class="fas fa-pencil-alt text-secondary"></i></a> --}}
                                                            {{-- <a href="{{url('')}}/admin/offers-delete/{{$offers->id}}"  name="delete"><i class="far fa-trash-alt text-danger"></i></a> --}}
                                                            <a href="javascript:void(0)" class="offers-delete" data="{{$offers->id}}"><i class="far fa-trash-alt text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
            $(document).on('click','.offers-delete',function(){
                var base_url = window.location.origin;
                var offers_delete_id = $(this).attr('data');
                console.log(offers_delete_id)
                swal({
                    title: "Are you sure?",
                    text: "To delete Offer",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Do it!',
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#4eb92d',
                }).then((result) => {
                    if(result.value){
                        $.ajax({
                            type:'POST',
                            url:base_url+'/admin/offers-delete',
                            data:{
                                "offers_delete_id":offers_delete_id
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
