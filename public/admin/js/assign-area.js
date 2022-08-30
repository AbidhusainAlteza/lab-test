$(document).ready(function(){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var base_url = window.location.origin;
    // assign area active inactive
    $(document).on('click','.assign-area-active-inactive',function(){
        var a_tag = $(this);
        var assign_area_id = a_tag.attr('id');
        var actione = a_tag.attr('data');
        console.log(actione+'-'+assign_area_id+'-');
        Swal.fire({
            title: 'Are you sure?',
            // text: "This Item is Inactive!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085D6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: base_url + '/admin/assign-area-active-inactive',
                    data: {
                        "assign_area_id": assign_area_id,
                        "actione":actione
                    },
                    success: function(data) {
                        if (data == '1') {
                            if (actione == '1') {
                                a_tag.attr('data','0');
                                a_tag.html('<span class="badge badge-success">Active</span>');
                            }
                            if(actione == '0'){
                                a_tag.attr('data','1');
                                a_tag.html('<span class="badge badge-danger">Inactive</span>');
                            }
                        } else {
                            Swal('Error');
                        }
                    }
                });
            }
        });
    });
    // assign area delete
    $(document).on('click','.assign_area_delete',function(){
        var assign_area_id = $(this).attr('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then(function (result) {
              if (result.value) {
                $.ajax({
                    type: "POST",
                    url:base_url+'/admin/assign-area-delete',
                    data: {
                        "assign_area_id": assign_area_id,
                    },
                    success: function (d) {
                        if (d == '1') {
                            Swal.fire('Deleted!', 'Assign area has been deleted.', 'success').then((value) => {
                                location.reload();
                                });
                        }else{
                            console.log(d);
                            swal('Error')
                        }
                    }
                });
            }
          });
    });
    // get total_assign_area data
    $(document).on('click','.total_assign_area',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/assign-area-total-data',
            success: function (data) {
            var table = $('.assign_area_data_table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/assign-area-edit/'+data+'">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "pincode"
                 },
                {
                    className: 'text-uppercase',
                    "data": "name"
                },
                {
                    className: 'text-uppercase',
                    "data": "added_date"
                },
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="assign-area-active-inactive" data="0" href="javascript:void(0)" id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="assign-area-active-inactive" data="1" href="javascript:void(0)" id=""'+row.id+'""><span class="badge badge-danger">inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="assign_area_delete" id="'+data+'"><i class="far fa-trash-alt ms-text-danger"></i></a>'
                }}
                ],
                "dom": '<"top"<"left-col "l><"center-col"B><"right-col"f>>rtip',
                buttons: [{
                    extend: "excel",
                    className: "btn-table-custome",
                    titleAttr: 'Export in Excel',
                    text: 'Download Excel',
                    init: function(api, node, config) {
                        $(node).removeClass('btn-default')
                    }
                }],
                responsive: true,
                lengthMenu: [
                    [10, 25, 50, -1 ],
                    [ '10', '25', '50', 'Show all' ]
                ],
                order: [[0, 'desc']],
            });
            }
        });
    });
    // get active_assign_area data
    $(document).on('click','.active_assign_area',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/assign-area-active-data',
            success: function (data) {
            var table = $('.assign_area_data_table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/assign-area-edit/'+data+'">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "pincode"
                 },
                {
                    className: 'text-uppercase',
                    "data": "name"
                },
                {
                    className: 'text-uppercase',
                    "data": "added_date"
                },
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="assign-area-active-inactive" data="0" href="javascript:void(0)" id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="assign-area-active-inactive" data="1" href="javascript:void(0)" id=""'+row.id+'""><span class="badge badge-danger">inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="assign_area_delete" id="'+data+'"><i class="far fa-trash-alt ms-text-danger"></i></a>'
                }}
                ],
                "dom": '<"top"<"left-col "l><"center-col"B><"right-col"f>>rtip',
                buttons: [{
                    extend: "excel",
                    className: "btn-table-custome",
                    titleAttr: 'Export in Excel',
                    text: 'Download Excel',
                    init: function(api, node, config) {
                        $(node).removeClass('btn-default')
                    }
                }],
                responsive: true,
                lengthMenu: [
                    [10, 25, 50, -1 ],
                    [ '10', '25', '50', 'Show all' ]
                ],
                order: [[0, 'desc']],
            });
            }
        });
    });
    // get inactive_assign_area data
    $(document).on('click','.inactive_assign_area',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/assign-area-inactive-data',
            success: function (data) {
            var table = $('.assign_area_data_table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/assign-area-edit/'+data+'">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "pincode"
                 },
                {
                    className: 'text-uppercase',
                    "data": "name"
                },
                {
                    className: 'text-uppercase',
                    "data": "added_date"
                },
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="assign-area-active-inactive" data="0" href="javascript:void(0)" id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="assign-area-active-inactive" data="1" href="javascript:void(0)" id=""'+row.id+'""><span class="badge badge-danger">inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="assign_area_delete" id="'+data+'"><i class="far fa-trash-alt ms-text-danger"></i></a>'
                }}
                ],
                "dom": '<"top"<"left-col "l><"center-col"B><"right-col"f>>rtip',
                buttons: [{
                    extend: "excel",
                    className: "btn-table-custome",
                    titleAttr: 'Export in Excel',
                    text: 'Download Excel',
                    init: function(api, node, config) {
                        $(node).removeClass('btn-default')
                    }
                }],
                responsive: true,
                lengthMenu: [
                    [10, 25, 50, -1 ],
                    [ '10', '25', '50', 'Show all' ]
                ],
                order: [[0, 'desc']],
            });
            }
        });
    });
});
