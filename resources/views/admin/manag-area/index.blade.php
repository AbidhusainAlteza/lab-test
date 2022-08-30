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
                    <li class="breadcrumb-item active" aria-current="page">Manag Area</li>
                </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="total_number_of_pincodes">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">share_location</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Total pincodes</h6>
                                <h6>{{$total_pincod}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="active_number_of_pincodes">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">share_location</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Active pincodes</h6>
                                <h6>{{$active_pincod}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="deactive_number_of_pincodes">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">share_location</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Deactive pincodes</h6>
                                <h6>{{$deactive_pincod}}</h6>
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
                            <h6>Manag Area</h6>
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{url('admin/manag-area-add')}}" class="btn btn-primary d-block float-right">Add Manag Area</a>
                            {{-- <a href="{{url('admin/manag-area-download')}}" class="btn btn-primary d-block float-right mr-1">download</a> --}}
                            <button class="btn btn-primary float-right mr-1" data-toggle="modal" data-target="#modal-14">Import Xlsx File</button>
                        </div>
                    </div>
                </div>
                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table id="manag_area_data_table" class="table w-100 thead-primary manag_area_data_table">
                            <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>State</th>
                                    <th>District</th>
                                    <th>Taluka</th>
                                    <th>Pincode</th>
                                    <th>Added Date</th>
                                    <th>Action</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <div class="modal fade" id="modal-14" tabindex="-1" role="dialog" aria-labelledby="modal-14">
        <div class="modal-dialog modal-dialog-centered modal-max" role="document">
          <div class="modal-content">

            <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h1>Import Xlsx File</h1>
              <p>only xlsx files are accepted  <a href="{{url('admin/manag-area-download')}}">chek the demo</a></p>
              <form action="{{url('admin/manag-area-csv-uplod')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ms-form-group has-icon">
                  <input type="file" placeholder="" class="form-control p-3" name="file" value="" required>
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
@endsection

@section('script_js')
<script src="{{ URL::asset('admin/js/manag-area.js') }}"></script>
@endsection
