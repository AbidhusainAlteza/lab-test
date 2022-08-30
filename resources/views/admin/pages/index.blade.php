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
                        <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i
                                    class="material-icons">home</i> Home</a> </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                    </ol>
                </nav>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="total_pages">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">auto_stories</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Total pages</h6>
                                <h6>{{$total_pages}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="visibility_show_pages">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">auto_stories</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Visibility show pages</h6>
                                <h6>{{$visibility_show_pages}}</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <a href="javascript:void(0)" class="visibility_hide_pages">
                          <div class="ms-panel manag_area ms-panel-hoverable has-border ms-widget ms-has-new-msg ms-notification-widget">
                            {{-- <span class="msg-count">5</span> --}}
                            <div class="ms-panel-body media">
                              <i class="material-icons">auto_stories</i>
                              <div class="media-body">
                                <h6 class="text-capitalize">Visibility hide pages</h6>
                                <h6>{{$visibility_hide_pages}}</h6>
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

            <div class="col-md-12">
                <div class="ms-panel ">
                    <div class="ms-panel-header">
                        <div class="row align-items-center">
                            <div class="col-md-6 ">
                                <h6>{{$title}}</h6>
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{url('admin/page/add')}}" class="btn btn-primary d-block float-right">Add Page</a>
                            </div>
                        </div>
                    </div>

                    <div class="ms-panel-body">
                        <div class="table-responsive">
                            <table id="data_table" class="admin-pages-table table w-100 thead-primary">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Location</th>
                                        <th>Visibility</th>
                                        <th>Add Date</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pages as $page)
                                    <tr>
                                        <td>
                                            <a class="font-weight-bold" href="{{url('admin/page/edit/'.$page->id)}}">
                                                {{$page->id}}
                                            </a>
                                        </td>
                                        <td>
                                            <a class="font-weight-bold" href="{{url('admin/page/edit/'.$page->id)}}">
                                                {{ucwords($page->title)}}
                                            </a>
                                        </td>
                                        <td class="text-capitalize">
                                            @if ($page->location == 'policies')
                                                Policies
                                            @elseif ($page->location == 'need_help')
                                                Need Help
                                            @elseif($page->location == 'company')
                                                Company
                                            @endif
                                        </td>
                                        <td>
                                            @if ($page->visibility == 'show')
                                                <a href="javascript:void(0)" class="page-show-hide" data="hide" item-id="{{$page->id}}">
                                                    <span class="badge badge-success"><i class="fa fa-eye m-0"></i></span>
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" class="page-show-hide" data="show" item-id="{{$page->id}}">
                                                    <span class="badge badge-danger"><i class="fa fa-eye m-0"></i></span>
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{format_date($page->added_date)}}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="admin-page-delete" data="{{$page->id}}"><i class="far fa-trash-alt text-danger"></i></a>
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
</main>

@endsection
@section('script_js')
<script src="{{URL::asset('admin/js/pages.js')}}"></script>
@endsection
