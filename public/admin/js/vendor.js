$(document).ready(function(){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var base_url = window.location.origin;
    // vendor active inactive
    $(document).on('click','.vandor-active-inactive',function(){
        var a_tag = $(this);
        var user_id = a_tag.attr('user-id');
        var vendor_id = a_tag.attr('vendor-id');
        var actione = a_tag.attr('data');
        console.log(actione+'-'+user_id+'-'+vendor_id);
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
                console.log('asd');
                $.ajax({
                    type: "POST",
                    url: base_url + '/admin/vendor-active-inactive',
                    data: {
                        "vendor_id": vendor_id,
                        "user_id":user_id,
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
                            // console.log(data);
                            Swal('Error');
                        }
                    }
                });
            }
        });
    });
    // total vendor data
    $(document).on('click','.total_vendor',function(){
        console.log('abid2');
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/total-vendor-getdata',
            success: function (data) {
            var table = $('.vandor_data_table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'admin/vendor/edit'+data+'">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "name","render":function(data,type,row){
                        return '<a class="font-weight-bold" href="'+base_url+'admin/vendor/edit'+row.id+'">'+data+'</a>'
                    }
                },
                {
                    className: 'text-uppercase',
                    "data": "avatar","render":function(data){
                        return '<a href="javascript:void(0)" data-toggle="modal" data-target="#img_show_modal"><img class="img_show_class" src="'+base_url+'/Image/avatar/'+data+'" alt="Avatar" height="50" width="50"></a>'
                    }
                },
                {
                    className: 'text-uppercase',
                    "data": "laboratory_name"
                },
                { "data": "email" },
                { "data": "contact_number"},
                { "data": "is_active","render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="vandor-active-inactive" data="0" href="javascript:void(0)" vendor-id="'+row.id+'" user-id="'+row.user_id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="vandor-active-inactive" data="1" href="javascript:void(0)" vendor-id="'+row.id+'" user-id="'+row.user_id+'"><span class="badge badge-danger">inactive</span></a>'
                    }
                }},
                { "data": "id","render":function(data,type,row){
                    return ' <a href="javascript:void(0)" class="vendor_delete" user-id="'+row.user_id+'" vendor-id="'+row.id+'"><i class="far fa-trash-alt ms-text-danger"></i></a>'
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

    // active vendor data
    $(document).on('click','.active_vendor',function(){
        console.log('abid2');
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/active-vendor-getdata',
            success: function (data) {
            var table = $('.vandor_data_table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'admin/vendor/edit'+data+'">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "name","render":function(data,type,row){
                        return '<a class="font-weight-bold" href="'+base_url+'admin/vendor/edit'+row.id+'">'+data+'</a>'
                    }
                },
                {
                    className: 'text-uppercase',
                    "data": "avatar","render":function(data){
                        return '<a href="javascript:void(0)" data-toggle="modal" data-target="#img_show_modal"><img class="img_show_class" src="'+base_url+'/Image/avatar/'+data+'" alt="Avatar" height="50" width="50"></a>'
                    }
                },
                {
                    className: 'text-uppercase',
                    "data": "laboratory_name"
                },
                { "data": "email" },
                { "data": "contact_number"},
                { "data": "is_active","render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="vandor-active-inactive" data="0" href="javascript:void(0)" vendor-id="'+row.id+'" user-id="'+row.user_id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="vandor-active-inactive" data="1" href="javascript:void(0)" vendor-id="'+row.id+'" user-id="'+row.user_id+'"><span class="badge badge-danger">inactive</span></a>'
                    }
                }},
                { "data": "id","render":function(data,type,row){
                    return ' <a href="javascript:void(0)" class="vendor_delete" user-id="'+row.user_id+'" vendor-id="'+row.id+'"><i class="far fa-trash-alt ms-text-danger"></i></a>'
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

    // deactive vendor data
    $(document).on('click','.deactive_vendor',function(){
        console.log('abid2');
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/deactive-vendor-getdata',
            success: function (data) {
            var table = $('.vandor_data_table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'admin/vendor/edit'+data+'">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "name","render":function(data,type,row){
                        return '<a class="font-weight-bold" href="'+base_url+'admin/vendor/edit'+row.id+'">'+data+'</a>'
                    }
                },
                {
                    className: 'text-uppercase',
                    "data": "avatar","render":function(data){
                        return '<a href="javascript:void(0)" data-toggle="modal" data-target="#img_show_modal"><img class="img_show_class" src="'+base_url+'/Image/avatar/'+data+'" alt="Avatar" height="50" width="50"></a>'
                    }
                },
                {
                    className: 'text-uppercase',
                    "data": "laboratory_name"
                },
                { "data": "email" },
                { "data": "contact_number"},
                { "data": "is_active","render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="vandor-active-inactive" data="0" href="javascript:void(0)" vendor-id="'+row.id+'" user-id="'+row.user_id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="vandor-active-inactive" data="1" href="javascript:void(0)" vendor-id="'+row.id+'" user-id="'+row.user_id+'"><span class="badge badge-danger">inactive</span></a>'
                    }
                }},
                { "data": "id","render":function(data,type,row){
                    return ' <a href="javascript:void(0)" class="vendor_delete" user-id="'+row.user_id+'" vendor-id="'+row.id+'"><i class="far fa-trash-alt ms-text-danger"></i></a>'
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
})
