
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var base_url = window.location.origin;
    $.ajax({
        type: 'POST',
        url: base_url+'/admin/manag-area-get-data',
        success: function (data) {
        var table = $('#manag_area_data_table').DataTable({

            data: data,
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            columns: [
            { "data": "id","render":function(data){
                return '<a class="font-weight-bold" href="'+base_url+'/admin/manag-area-edit/'+data+'">'+data+'</a>'
            }},
            {
                className: 'text-uppercase',
                "data": "state",
                "render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/manag-area-edit/'+row.id+'">'+data+'</a>'
            }},
            {
                className: 'text-uppercase',
                "data": "district" },
            {
                className: 'text-uppercase',
                "data": "taluka" },
            { "data": "pincode" },
            { "data": "added_date"},
            { "data": "is_active", "render":function(data,type,row){
                // active
                if(data == '1'){
                    return '<a href="javascript:void(0)" class="manag_area_active_inactive" data="0" manag_area_id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                }
                // inactive
                if(data == '0'){
                    return '<a href="javascript:void(0)" class="manag_area_active_inactive" data="1" manag_area_id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                }
            }},
            { "data": "id","render": function (data) {
                return '<a href="javascript:void(0)" class="manag_area_delete" data="'+data+'"><i class="far fa-trash-alt ms-text-danger"></i></a>'
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

    // active inactive
    $(document).on('click','.manag_area_active_inactive',function(){
        var a_tag = $(this);
        var action_data = a_tag.attr('data');
        var manag_area_id = a_tag.attr('manag_area_id');
        // console.log(action_data+'-'+manag_area_id)
        Swal.fire({
            title: 'Are you sure?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085D6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: base_url + '/admin/manag-area-active-inactive',
                    data: {
                        "manag_area_id": manag_area_id,
                        "action_data":action_data
                    },
                    success: function(data) {
                        if (data == '1') {
                            if(action_data == 1){
                                // Swal.fire('Show the Top Booked!', 'success');
                                $(a_tag).attr('data',0);
                                $(a_tag).html('<span class="badge badge-success">Active</span>')
                            }
                            if(action_data == 0){
                                // Swal.fire('Hide the Top Booked!', 'success');
                                $(a_tag).attr('data',1);
                                $(a_tag).html('<span class="badge badge-danger">Inactive</span>')

                            }
                        } else {
                            console.log(data);
                            Swal('Error');
                        }
                    }
                });
            }
        });
    });
    // Delete
    $(document).on('click','.manag_area_delete',function(){
        var a_tag = $(this);
        var manag_area_id = a_tag.attr('data');
        console.log(manag_area_id)
        Swal.fire({
            title: 'Are you sure?',
            text:'To Delete Area',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085D6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: base_url + '/admin/manag-area-delete',
                    data: {
                        "manag_area_id": manag_area_id,
                    },
                    success: function(data) {
                        if (data == '1') {
                            location.reload();
                        } else {
                            console.log(data);
                            Swal('Error');
                        }
                    }
                });
            }
        });
    });
    // total number of pincodes
    $(document).on('click','.total_number_of_pincodes',function(){
        // console.log('abid');
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/manag-area-total-number-pincodes',
            success: function (data) {
            var table = $('.manag_area_data_table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/manag-area-edit/'+data+'">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "state",
                    "render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/manag-area-edit/'+row.id+'">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "district" },
                {
                    className: 'text-uppercase',
                    "data": "taluka" },
                { "data": "pincode" },
                { "data": "added_date"},
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a href="javascript:void(0)" class="manag_area_active_inactive" data="0" manag_area_id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a href="javascript:void(0)" class="manag_area_active_inactive" data="1" manag_area_id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="manag_area_delete" data="'+data+'"><i class="far fa-trash-alt ms-text-danger"></i></a>'
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
    // active number of pincodes
    $(document).on('click','.active_number_of_pincodes',function(){
        console.log('abid2');
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/manag-area-active-number-pincodes',
            success: function (data) {
            var table = $('.manag_area_data_table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/manag-area-edit/'+data+'">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "state",
                    "render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/manag-area-edit/'+row.id+'">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "district" },
                {
                    className: 'text-uppercase',
                    "data": "taluka" },
                { "data": "pincode" },
                { "data": "added_date"},
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a href="javascript:void(0)" class="manag_area_active_inactive" data="0" manag_area_id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a href="javascript:void(0)" class="manag_area_active_inactive" data="1" manag_area_id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="manag_area_delete" data="'+data+'"><i class="far fa-trash-alt ms-text-danger"></i></a>'
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
    // deactive number of pincodes
    $(document).on('click','.deactive_number_of_pincodes',function(){
        console.log('abid2');
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/manag-area-deactive-number-pincodes',
            success: function (data) {
            var table = $('.manag_area_data_table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/manag-area-edit/'+data+'">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "state",
                    "render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/manag-area-edit/'+row.id+'">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "district" },
                {
                    className: 'text-uppercase',
                    "data": "taluka" },
                { "data": "pincode" },
                { "data": "added_date"},
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a href="javascript:void(0)" class="manag_area_active_inactive" data="0" manag_area_id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a href="javascript:void(0)" class="manag_area_active_inactive" data="1" manag_area_id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="manag_area_delete" data="'+data+'"><i class="far fa-trash-alt ms-text-danger"></i></a>'
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
