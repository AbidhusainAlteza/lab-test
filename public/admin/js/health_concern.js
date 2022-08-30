$(document).ready(function(){
    var base_url = window.location.origin;

    // total health concern
    $(document).on('click','.total_health_concern',function(){
        // console.log('abid');
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/total-health-concern',
            success: function (data) {
                console.log(data);
            var table = $('.health_concern_table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/health-concern/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "title",
                    "render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/health-concern/edit/'+row.id+'">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "slug" },
                {
                    className: 'text-capitalize',
                    "data": "image","render":function(data,type,row){
                        return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/health_concern/'+row.image+'" data-image="'+base_url+'/upload/health_concern/'+row.image+'" class="imagelink" style="width:70px"></a>'
                }},
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="health-concern-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="health-concern-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="health-concern-delete" data="'+data.id+'"><i class="far fa-trash-alt text-danger"></i></a>'
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

    // active health concern
    $(document).on('click','.active_health_concern',function(){
        // console.log('abid');
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/active-health-concern',
            success: function (data) {
                console.log(data);
            var table = $('.health_concern_table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/health-concern/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "title",
                    "render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/health-concern/edit/'+row.id+'">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "slug" },
                {
                    className: 'text-capitalize',
                    "data": "image","render":function(data,type,row){
                        return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/health_concern/'+row.image+'" data-image="'+base_url+'/upload/health_concern/'+row.image+'" class="imagelink" style="width:70px"></a>'
                }},
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="health-concern-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="health-concern-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="health-concern-delete" data="'+data.id+'"><i class="far fa-trash-alt text-danger"></i></a>'
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

    // inactive health concern
    $(document).on('click','.inactive_health_concern',function(){
        // console.log('abid');
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/inactive-health-concern',
            success: function (data) {
                console.log(data);
            var table = $('.health_concern_table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/health-concern/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "title",
                    "render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/health-concern/edit/'+row.id+'">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "slug" },
                {
                    className: 'text-capitalize',
                    "data": "image","render":function(data,type,row){
                        return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/health_concern/'+row.image+'" data-image="'+base_url+'/upload/health_concern/'+row.image+'" class="imagelink" style="width:70px"></a>'
                }},
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="health-concern-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="health-concern-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="health-concern-delete" data="'+data.id+'"><i class="far fa-trash-alt text-danger"></i></a>'
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
