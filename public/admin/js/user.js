

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var base_url = window.location.origin;
    // total user data
    $(document).on('click','.total_user',function(){
        console.log('abid2');
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/total-user-getdata',
            success: function (data) {
            var table = $('.user_data_table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id"},
                {
                    className: 'text-uppercase',
                    "data": "user_name"
                },
                {
                    className: 'text-uppercase',
                    "data": "avatar","render":function(data){
                        if(data !== null){
                            return '<a href="javascript:void(0)" data-toggle="modal" data-target="#img_show_modal"><img class="img_show_class" src="'+base_url+'/Image/avatar/'+data+'" alt="Avatar" height="50" width="50"></a>'
                        }else{
                            return '<a href="javascript:void(0)" data-toggle="modal" data-target="#img_show_modal"><img class="img_show_class" src="'+base_url+'/Image/avatar/no_img.png" alt="Avatar" height="50" width="50"></a>'
                        }
                    }
                },
                { "data": "email" },
                { "data": "contact_number"},
                { "data": "order_count","render":function(data){
                    return '<span class="badge badge-secondary">'+data+'</span>'
                }},
                { "data": "is_active","render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="ban_user" href="javascript:void(0)" user-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="remove_user_ban" href="javascript:void(0)" user-id="'+row.id+'"><span class="badge badge-danger">Banned</span></a>'
                    }
                }},
                { "data": "id","render":function(data,type,row){
                    return '<a class="user_delete" href="javascript:void(0)" user-id="'+row.id+'"><i class="far fa-trash-alt ms-text-danger"></i></a>'
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

    // active user data
    $(document).on('click','.active_user',function(){
        console.log('abid2');
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/active-user-getdata',
            success: function (data) {
            var table = $('.user_data_table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id"},
                {
                    className: 'text-uppercase',
                    "data": "user_name"
                },
                {
                    className: 'text-uppercase',
                    "data": "avatar","render":function(data){
                        if(data !== null){
                            return '<a href="javascript:void(0)" data-toggle="modal" data-target="#img_show_modal"><img class="img_show_class" src="'+base_url+'/Image/avatar/'+data+'" alt="Avatar" height="50" width="50"></a>'
                        }else{
                            return '<a href="javascript:void(0)" data-toggle="modal" data-target="#img_show_modal"><img class="img_show_class" src="'+base_url+'/Image/avatar/no_img.png" alt="Avatar" height="50" width="50"></a>'
                        }
                    }
                },
                { "data": "email" },
                { "data": "contact_number"},
                { "data": "order_count","render":function(data){
                    return '<span class="badge badge-secondary">'+data+'</span>'
                }},
                { "data": "is_active","render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="ban_user" href="javascript:void(0)" user-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="remove_user_ban" href="javascript:void(0)" user-id="'+row.id+'"><span class="badge badge-danger">Banned</span></a>'
                    }
                }},
                { "data": "id","render":function(data,type,row){
                    return '<a class="user_delete" href="javascript:void(0)" user-id="'+row.id+'"><i class="far fa-trash-alt ms-text-danger"></i></a>'
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

    // banned user data
    $(document).on('click','.banned_user',function(){
        console.log('abid2');
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/banned-user-getdata',
            success: function (data) {
            var table = $('.user_data_table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id"},
                {
                    className: 'text-uppercase',
                    "data": "user_name"
                },
                {
                    className: 'text-uppercase',
                    "data": "avatar","render":function(data){
                        if(data !== null){
                            return '<a href="javascript:void(0)" data-toggle="modal" data-target="#img_show_modal"><img class="img_show_class" src="'+base_url+'/Image/avatar/'+data+'" alt="Avatar" height="50" width="50"></a>'
                        }else{
                            return '<a href="javascript:void(0)" data-toggle="modal" data-target="#img_show_modal"><img class="img_show_class" src="'+base_url+'/Image/avatar/no_img.png" alt="Avatar" height="50" width="50"></a>'
                        }
                    }
                },
                { "data": "email" },
                { "data": "contact_number"},
                { "data": "order_count","render":function(data){
                    return '<span class="badge badge-secondary">'+data+'</span>'
                }},
                { "data": "is_active","render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="ban_user" href="javascript:void(0)" user-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="remove_user_ban" href="javascript:void(0)" user-id="'+row.id+'"><span class="badge badge-danger">Banned</span></a>'
                    }
                }},
                { "data": "id","render":function(data,type,row){
                    return '<a class="user_delete" href="javascript:void(0)" user-id="'+row.id+'"><i class="far fa-trash-alt ms-text-danger"></i></a>'
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
