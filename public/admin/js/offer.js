$(document).ready(function(){
    var base_url = window.location.origin;
    // total offer type get data
    $(document).on('click','.total_offer_type',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/total-offer-type',
            success: function (data) {
            var table = $('.offer-type-table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                {
                    className: 'text-capitalize',
                    "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'admin/offer-type/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className:'text-capitalize',
                    "data": "title"
                },
                {"data": "slug"},

                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="offer-type-active-inactive" href="javascript:void(0)" data="0" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="offer-type-active-inactive" href="javascript:void(0)" data="1" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="offer-type-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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
    // active_offer_type get data
    $(document).on('click','.active_offer_type',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/active-offer-type',
            success: function (data) {
            var table = $('.offer-type-table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                {
                    className: 'text-capitalize',
                    "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'admin/offer-type/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className:'text-capitalize',
                    "data": "title"
                },
                {"data": "slug"},

                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="offer-type-active-inactive" href="javascript:void(0)" data="0" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="offer-type-active-inactive" href="javascript:void(0)" data="1" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="offer-type-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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
    // inactive_offer_type get data
    $(document).on('click','.inactive_offer_type',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/inactive-offer-type',
            success: function (data) {
            var table = $('.offer-type-table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                {
                    className: 'text-capitalize',
                    "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'admin/offer-type/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className:'text-capitalize',
                    "data": "title"
                },
                {"data": "slug"},

                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="offer-type-active-inactive" href="javascript:void(0)" data="0" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="offer-type-active-inactive" href="javascript:void(0)" data="1" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="offer-type-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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

    // total_offer get data
    $(document).on('click','.total_offer',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/total-offer',
            success: function (data) {
            var table = $('.offer-table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                {
                    "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/offers/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className:'text-capitalize',
                    "data": "title",
                    "render":function(data,type,row){
                        return '<a class="font-weight-bold" href="'+base_url+'/admin/offers/'+row.id+'/edit">'+data+'</a>'
                    }
                },
                {"data": "slug"},
                {
                    "data": "image",
                    "render":function(data){
                        return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/offers/'+data+'" data-image="'+base_url+'/upload/offers/'+data+'" class="imagelink" style="width:50px"></a>'
                    }
                },
                {"data": "description"},
                {"data": "coupon_code"},
                {"data": "discount_amount"},
                {"data": "offers_type_title"},
                {"data": "min_order_amount"},
                {"data": "max_order_amount"},
                {"data": "valid_for"},
                {"data": "exp_date"},

                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="offers-active-inactive" href="javascript:void(0)" data="0" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="offers-active-inactive" href="javascript:void(0)" data="1" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="offers-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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
    // active offer get data
    $(document).on('click','.active_offer',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/active-offer',
            success: function (data) {
            var table = $('.offer-table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                {
                    "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/offers/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className:'text-capitalize',
                    "data": "title",
                    "render":function(data,type,row){
                        return '<a class="font-weight-bold" href="'+base_url+'/admin/offers/'+row.id+'/edit">'+data+'</a>'
                    }
                },
                {"data": "slug"},
                {
                    "data": "image",
                    "render":function(data){
                        return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/offers/'+data+'" data-image="'+base_url+'/upload/offers/'+data+'" class="imagelink" style="width:50px"></a>'
                    }
                },
                {"data": "description"},
                {"data": "coupon_code"},
                {"data": "discount_amount"},
                {"data": "offers_type_title"},
                {"data": "min_order_amount"},
                {"data": "max_order_amount"},
                {"data": "valid_for"},
                {"data": "exp_date"},

                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="offers-active-inactive" href="javascript:void(0)" data="0" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="offers-active-inactive" href="javascript:void(0)" data="1" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="offers-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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
    // inactive offer get data
    $(document).on('click','.inactive_offer',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/inactive-offer',
            success: function (data) {
            var table = $('.offer-table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                {
                    "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/offers/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className:'text-capitalize',
                    "data": "title",
                    "render":function(data,type,row){
                        return '<a class="font-weight-bold" href="'+base_url+'/admin/offers/'+row.id+'/edit">'+data+'</a>'
                    }
                },
                {"data": "slug"},
                {
                    "data": "image",
                    "render":function(data){
                        return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/offers/'+data+'" data-image="'+base_url+'/upload/offers/'+data+'" class="imagelink" style="width:50px"></a>'
                    }
                },
                {"data": "description"},
                {"data": "coupon_code"},
                {"data": "discount_amount"},
                {"data": "offers_type_title"},
                {"data": "min_order_amount"},
                {"data": "max_order_amount"},
                {"data": "valid_for"},
                {"data": "exp_date"},

                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="offers-active-inactive" href="javascript:void(0)" data="0" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="offers-active-inactive" href="javascript:void(0)" data="1" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="offers-delete" data="'+data+'"><i class="far fa-trash-alt text-danger"></i></a>'
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
