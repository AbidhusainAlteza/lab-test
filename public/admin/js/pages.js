$(document).ready(function(){
    // admin-page-delete
    $(document).on('click','.admin-page-delete',function(){
        var id = $(this).attr('data');
        Swal.fire({
            title: 'Are you sure?',
            text: "To Delete Page",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085D6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type:'POST',
                    url:base_url+'/admin/page-delete',
                    data:{
                        "id":id
                    },
                    success:function(data) {
                        if(data == 1){
                            location.reload()
                        }else{
                            swal('Samthing Worng');
                        }
                    }
                });
            }
        });
    });
    // pages show and hide
    $(document).on('click','.page-show-hide',function(){
        var a_tag = $(this);
        var item_id = a_tag.attr('item-id');
        var actione = a_tag.attr('data');
        console.log(actione+'-'+item_id);
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
                    url: base_url + '/admin/page-show-hide',
                    data: {
                        "item_id": item_id,
                        "actione":actione
                    },
                    success: function(data) {
                        if (data == '1') {
                            if (actione == 'hide') {
                                a_tag.attr('data','show');
                                a_tag.html('<span class="badge badge-danger"><i class="fa fa-eye m-0"></i></span>');
                            }
                            if(actione == 'show'){
                                a_tag.attr('data','hide');
                                a_tag.html('<span class="badge badge-success"><i class="fa fa-eye m-0"></i></span>');
                            }
                            // location.reload();
                        } else {
                            Swal('Error');
                        }
                    }
                });
            }
        });
    });

    // total pages get data
    $(document).on('click','.total_pages',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/total-pages',
            success: function (data) {
            var table = $('.admin-pages-table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                {
                    "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/page/edit/'+data+'">'+data+'</a>'
                }},
                {
                    className:'text-capitalize',
                    "data": "title",
                    "render":function(data,type,row){
                        return '<a class="font-weight-bold" href="'+base_url+'/admin/page/edit/'+row.id+'">'+data+'</a>'
                    }
                },
                {
                    className:'text-capitalize',
                    "data": "location",
                    "render":function(data){
                        if(data == 'policies'){
                            return 'Policies';
                        }else if(data == 'need_help'){
                            return 'need help';
                        }else if(data == 'company'){
                            return 'company';
                        }
                    }
                },
                {
                    "data": "visibility",
                    "render":function(data,type,row){
                        if(data == 'show'){
                            return '<a href="javascript:void(0)" class="page-show-hide" data="hide" item-id="'+row.id+'"><span class="badge badge-success"><i class="fa fa-eye m-0"></i></span></a>';
                        }else{
                            return '<a href="javascript:void(0)" class="page-show-hide" data="show" item-id="'+row.id+'"><span class="badge badge-danger"><i class="fa fa-eye m-0"></i></span></a>';
                        }
                    }
                },
                {
                    "data": "added_date",
                    "render":function(data){
                        var now = new Date(data);
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);
                        var time = ("0" + now.getHours())+':'+now.getMinutes();
                        console.log(time)
                        var today = now.getFullYear()+"-"+(month)+"-"+(day)+" / "+time;
                        return today;
                    }
                },
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="admin-page-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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

    // visibility show pages get data
    $(document).on('click','.visibility_show_pages',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/visibility-show-pages',
            success: function (data) {
            var table = $('.admin-pages-table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                {
                    "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/page/edit/'+data+'">'+data+'</a>'
                }},
                {
                    className:'text-capitalize',
                    "data": "title",
                    "render":function(data,type,row){
                        return '<a class="font-weight-bold" href="'+base_url+'/admin/page/edit/'+row.id+'">'+data+'</a>'
                    }
                },
                {
                    className:'text-capitalize',
                    "data": "location",
                    "render":function(data){
                        if(data == 'policies'){
                            return 'Policies';
                        }else if(data == 'need_help'){
                            return 'need help';
                        }else if(data == 'company'){
                            return 'company';
                        }
                    }
                },
                {
                    "data": "visibility",
                    "render":function(data,type,row){
                        if(data == 'show'){
                            return '<a href="javascript:void(0)" class="page-show-hide" data="hide" item-id="'+row.id+'"><span class="badge badge-success"><i class="fa fa-eye m-0"></i></span></a>';
                        }else{
                            return '<a href="javascript:void(0)" class="page-show-hide" data="show" item-id="'+row.id+'"><span class="badge badge-danger"><i class="fa fa-eye m-0"></i></span></a>';
                        }
                    }
                },
                {
                    "data": "added_date",
                    "render":function(data){
                        var now = new Date(data);
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);
                        var time = ("0" + now.getHours())+':'+now.getMinutes();
                        console.log(time)
                        var today = now.getFullYear()+"-"+(month)+"-"+(day)+" / "+time;
                        return today;
                    }
                },
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="admin-page-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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

    // visibility hide get data
    $(document).on('click','.visibility_hide_pages',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/visibility-hide-pages',
            success: function (data) {
            var table = $('.admin-pages-table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                {
                    "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/page/edit/'+data+'">'+data+'</a>'
                }},
                {
                    className:'text-capitalize',
                    "data": "title",
                    "render":function(data,type,row){
                        return '<a class="font-weight-bold" href="'+base_url+'/admin/page/edit/'+row.id+'">'+data+'</a>'
                    }
                },
                {
                    className:'text-capitalize',
                    "data": "location",
                    "render":function(data){
                        if(data == 'policies'){
                            return 'Policies';
                        }else if(data == 'need_help'){
                            return 'need help';
                        }else if(data == 'company'){
                            return 'company';
                        }
                    }
                },
                {
                    "data": "visibility",
                    "render":function(data,type,row){
                        if(data == 'show'){
                            return '<a href="javascript:void(0)" class="page-show-hide" data="hide" item-id="'+row.id+'"><span class="badge badge-success"><i class="fa fa-eye m-0"></i></span></a>';
                        }else{
                            return '<a href="javascript:void(0)" class="page-show-hide" data="show" item-id="'+row.id+'"><span class="badge badge-danger"><i class="fa fa-eye m-0"></i></span></a>';
                        }
                    }
                },
                {
                    "data": "added_date",
                    "render":function(data){
                        var now = new Date(data);
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);
                        var time = ("0" + now.getHours())+':'+now.getMinutes();
                        console.log(time)
                        var today = now.getFullYear()+"-"+(month)+"-"+(day)+" / "+time;
                        return today;
                    }
                },
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="admin-page-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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



