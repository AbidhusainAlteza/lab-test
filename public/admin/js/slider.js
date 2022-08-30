$(document).ready(function(){
    var base_url = window.location.origin;
    // total slider get data
    $(document).on('click','.total_slider',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/total-slider',
            success: function (data) {
            var table = $('.slider-table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                {
                    className: 'text-capitalize',
                    "data": "title","render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'admin/slider/'+row.id+'/edit">'+data+'</a>'
                }},
                {"data": "slug",},
                {"data": "url"},
                {
                    "data": "image",
                    "render":function(data){
                        return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/slider/'+data+'" data-image="'+base_url+'/upload/slider/'+data+'" class="imagelink" style="width:100px"></a></td>'
                    }
                },
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="slider-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'" ><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="slider-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="'+base_url+'admin/slider/'+data+'/edit"><i class="fas fa-pencil-alt text-secondary"></i></a> <a href="javascript:(0)" class="slider-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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

    // active slider get data
    $(document).on('click','.active_slider',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/active-slider',
            success: function (data) {
            var table = $('.slider-table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                {
                    className: 'text-capitalize',
                    "data": "title","render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'admin/slider/'+row.id+'/edit">'+data+'</a>'
                }},
                {"data": "slug",},
                {"data": "url"},
                {
                    "data": "image",
                    "render":function(data){
                        return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/slider/'+data+'" data-image="'+base_url+'/upload/slider/'+data+'" class="imagelink" style="width:100px"></a></td>'
                    }
                },
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="slider-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'" ><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="slider-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="'+base_url+'admin/slider/'+data+'/edit"><i class="fas fa-pencil-alt text-secondary"></i></a> <a href="javascript:(0)" class="slider-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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

    // inactive slider get data
    $(document).on('click','.inactive_slider',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/inactive-slider',
            success: function (data) {
            var table = $('.slider-table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                {
                    className: 'text-capitalize',
                    "data": "title","render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'admin/slider/'+row.id+'/edit">'+data+'</a>'
                }},
                {"data": "slug",},
                {"data": "url"},
                {
                    "data": "image",
                    "render":function(data){
                        return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/slider/'+data+'" data-image="'+base_url+'/upload/slider/'+data+'" class="imagelink" style="width:100px"></a></td>'
                    }
                },
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="slider-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'" ><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="slider-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="'+base_url+'admin/slider/'+data+'/edit"><i class="fas fa-pencil-alt text-secondary"></i></a> <a href="javascript:(0)" class="slider-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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
