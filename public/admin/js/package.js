$(document).ready(function(){
    var base_url = window.location.origin;
    // total package type get data
    $(document).on('click','.total_package_type',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/total-package-type',
            success: function (data) {
            var table = $('.package-type-table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/package-type/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "package_type",
                    "render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/package-type/'+row.id+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "slug"
                },
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="pack-type-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="pack-type-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="'+base_url+'/admin/package-type/'+data+'/edit"><i class="fas fa-pencil-alt text-secondary"></i></a> <a href="javascript:void(0)" class="package-type-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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
    // active package type get data
    $(document).on('click','.active_package_type',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/active-package-type',
            success: function (data) {
            var table = $('.package-type-table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/package-type/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "package_type",
                    "render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/package-type/'+row.id+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "slug"
                },
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="pack-type-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="pack-type-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="'+base_url+'/admin/package-type/'+data+'/edit"><i class="fas fa-pencil-alt text-secondary"></i></a> <a href="javascript:void(0)" class="package-type-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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
    // inactive package type get data
    $(document).on('click','.inactive_package_type',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/inactive-package-type',
            success: function (data) {
            var table = $('.package-type-table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/package-type/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "package_type",
                    "render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/package-type/'+row.id+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "slug"
                },
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="pack-type-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="pack-type-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="'+base_url+'/admin/package-type/'+data+'/edit"><i class="fas fa-pencil-alt text-secondary"></i></a> <a href="javascript:void(0)" class="package-type-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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

    // total package get data
    $(document).on('click','.total_package',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/total-package',
            success: function (data) {
            var table = $('.package-table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/packages/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "package_type",
                    "render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/package/'+row.id+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "title"
                },
                {
                    className: 'text-capitalize',
                    "data": "slug"
                },
                {
                    "data": "image",
                    "render":function(data){
                        return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/packages/'+data+'" data-image="'+base_url+'/upload/packages/'+data+'" class="imagelink" style="width:70px"></a>'
                    }
                },
                {"data":"description"},
                {"data":"total_amount"},
                {"data":"discount"},
                {"data":"offer_amount"},
                {
                    "data":"offer_valid_till",
                    "render":function(data){
                        var now = new Date(data);
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);
                        var today = now.getFullYear()+"-"+(month)+"-"+(day);
                        return today;
                    }
                },
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="package-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="package-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "top_booked", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="package_top_book" data="0" href="javascript:void(0)" book-id="'+row.id+'"><span class="badge badge-success">Show</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="package_top_book" data="1" href="javascript:void(0)" book-id="'+row.id+'"><span class="badge badge-danger">Hide</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="'+base_url+'/admin/packages/'+data+'/edit"><i class="fas fa-pencil-alt text-secondary"></i></a> <a href="javascript:void(0)" class="package-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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

    // active package get data
    $(document).on('click','.active_package',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/active-package',
            success: function (data) {
            var table = $('.package-table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/packages/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "package_type",
                    "render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/package/'+row.id+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "title"
                },
                {
                    className: 'text-capitalize',
                    "data": "slug"
                },
                {
                    "data": "image",
                    "render":function(data){
                        return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/packages/'+data+'" data-image="'+base_url+'/upload/packages/'+data+'" class="imagelink" style="width:70px"></a>'
                    }
                },
                {"data":"description"},
                {"data":"total_amount"},
                {"data":"discount"},
                {"data":"offer_amount"},
                {
                    "data":"offer_valid_till",
                    "render":function(data){
                        var now = new Date(data);
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);
                        var today = now.getFullYear()+"-"+(month)+"-"+(day);
                        return today;
                    }
                },
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="package-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="package-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "top_booked", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="package_top_book" data="0" href="javascript:void(0)" book-id="'+row.id+'"><span class="badge badge-success">Show</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="package_top_book" data="1" href="javascript:void(0)" book-id="'+row.id+'"><span class="badge badge-danger">Hide</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="'+base_url+'/admin/packages/'+data+'/edit"><i class="fas fa-pencil-alt text-secondary"></i></a> <a href="javascript:void(0)" class="package-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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

    // inactive package get data
    $(document).on('click','.inactive_package',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/inactive-package',
            success: function (data) {
            var table = $('.package-table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/packages/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "package_type",
                    "render":function(data,type,row){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/package/'+row.id+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-capitalize',
                    "data": "title"
                },
                {
                    className: 'text-capitalize',
                    "data": "slug"
                },
                {
                    "data": "image",
                    "render":function(data){
                        return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/packages/'+data+'" data-image="'+base_url+'/upload/packages/'+data+'" class="imagelink" style="width:70px"></a>'
                    }
                },
                {"data":"description"},
                {"data":"total_amount"},
                {"data":"discount"},
                {"data":"offer_amount"},
                {
                    "data":"offer_valid_till",
                    "render":function(data){
                        var now = new Date(data);
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);
                        var today = now.getFullYear()+"-"+(month)+"-"+(day);
                        return today;
                    }
                },
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="package-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="package-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "top_booked", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="package_top_book" data="0" href="javascript:void(0)" book-id="'+row.id+'"><span class="badge badge-success">Show</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="package_top_book" data="1" href="javascript:void(0)" book-id="'+row.id+'"><span class="badge badge-danger">Hide</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="'+base_url+'/admin/packages/'+data+'/edit"><i class="fas fa-pencil-alt text-secondary"></i></a> <a href="javascript:void(0)" class="package-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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
