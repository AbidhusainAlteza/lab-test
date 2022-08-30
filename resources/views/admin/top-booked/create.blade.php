 @extends('admin/layouts.master') 
 
 @section('content')

    <!-- Main Content -->
    <main class="body-content">
        
        @include('admin/layouts/menu')

        <div class="ms-content-wrapper">
            <div class="row">

                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                            <li class="breadcrumb-item" aria-current="page"> <a href="{{url('dashboard')}}"><i class="fas fa-home fs-16"></i> Home</a> </li>
                            <li class="breadcrumb-item"><a href="{{url('admin/top-booked')}}">Top Booked</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Top Booked</li>
                        </ol>
                    </nav>
                </div>

                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        <i class="flaticon-alert-1"></i> 
                        <strong>Sorry! </strong> {{ Session::get('error') }}
                    </div>
                @endif

                <div class="col-xl-12 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Add Top Booked Form</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form method='post' action="{{ route('top-booked.store') }}">
                                @csrf

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Select Packages</label>
                                        <div class="input-group">
                                            <select class="form-control task" name="package_id" required>
                                                    <option value="">Select Package</option>
                                                    @foreach($package as $p)
                                                        <option value="{{$p->id}}"> {{ucwords($p->title)}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Lab Test Name </label>
                                        <div class="inputFields">
                                            <select class="form-control taskInput" name="lab_test_id" required>
                                                <option value="">Select Lab Test Name</option>
                                                @foreach($lab_test_array as $lab_test)
                                                    <option value="{{$lab_test->id}}"> {{$lab_test->title}} </option>
                                                @endforeach
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="col-md-2 mb-3 mt-4">
                                        <div class="inputFields">
                                            <span class="btn btn-primary task_add"><i class="fa fa-plus"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                       <table class="table w-100%" class="tasks">
                                           <thead>
                                                <tr>
                                                    <th>Lab Test List</th>
                                                    <th>#</th>
                                                </tr>
                                           </thead>
                                           <tbody class="tasksList">
                                               <tr class="no_data">
                                                   <td colspan="2">No data Found</td>
                                               </tr> 
                                            </tbody>
                                       </table>
                                    </div>

                                    <div class="col-md-5 mb-3">
                                        <label>Status *</label>
                                        <div class="input-group">
                                            <select name="is_active" class="form-control" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-12 mb-3 mt-3">
                                        <button class="btn btn-primary d-block " type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function(){
            $('.no_data').show();
            $('.task_add').on('click',function(){
                var status = $('.taskInput option:selected').val();
                var package = $('.task option:selected').val();
                var row = status;

                $.ajax({
                    type:'POST',
                    url:'/top-booked-add',
                    data:{
                        row:row,
                        status:status,
                        package:package,
                        "_token": "{{ csrf_token() }}",
                    },
                    success:function(data) {
                        $('.no_data').hide();
                        $('.tasksList').append(data);

                        $(".delete").on("click", function(data) {
                            var id = $(this).data('id');
                            $('.deleterow'+ id).remove();
                        });
                    }
                });
            });
        });

    </script>

@endsection




