$(document).ready(function(){
    var base_url = window.location.origin;
    // total lab test get data
    $(document).on('click','.total_labtest',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/total-labtest-manage',
            success: function (data) {
            var table = $('.labtest_manage_table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/lab-test-manage/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "title"
                },
                {
                    className: 'text-uppercase',
                    "data": "slug"
                },
                { "data": "image",'render':function(data){
                    return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/lab_test_manage/'+data+'" data-image="'+base_url+'/upload/lab_test_manage/'+data+'" class="imagelink" style="width:70px"></a>'
                }},
                { "data": "price"},
                { "data": "discount"},
                { "data": "offer_price"},
                { "data": "duration"},
                { "data": "sample_required"},
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="lab-test-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="lab-test-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="lab-test-manage-delete" data="'+data+'" name="delete"><i class="far fa-trash-alt text-danger"></i></a>'
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

    // active lab test get data
    $(document).on('click','.active_labtest',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/active-labtest-manage',
            success: function (data) {
            var table = $('.labtest_manage_table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/lab-test-manage/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "title"
                },
                {
                    className: 'text-uppercase',
                    "data": "slug"
                },
                { "data": "image",'render':function(data){
                    return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/lab_test_manage/'+data+'" data-image="'+base_url+'/upload/lab_test_manage/'+data+'" class="imagelink" style="width:70px"></a>'
                }},
                { "data": "price"},
                { "data": "discount"},
                { "data": "offer_price"},
                { "data": "duration"},
                { "data": "sample_required"},
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="lab-test-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="lab-test-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="lab-test-manage-delete" data="'+data+'" name="delete"><i class="far fa-trash-alt text-danger"></i></a>'
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

    // inactive lab test get data
    $(document).on('click','.inactive_labtest',function(){
        // console.log('abid');
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/inactive-labtest-manage',
            success: function (data) {
                // console.log(data)
            var table = $('.labtest_manage_table').DataTable({

                data: data,
                "bDestroy": true,
                columns: [
                { "data": "id","render":function(data){
                    return '<a class="font-weight-bold" href="'+base_url+'/admin/lab-test-manage/'+data+'/edit">'+data+'</a>'
                }},
                {
                    className: 'text-uppercase',
                    "data": "title"
                },
                {
                    className: 'text-uppercase',
                    "data": "slug"
                },
                { "data": "image",'render':function(data){
                    return '<a href="" data-toggle="modal" data-target="#modal-9"><img src="'+base_url+'/upload/lab_test_manage/'+data+'" data-image="'+base_url+'/upload/lab_test_manage/'+data+'" class="imagelink" style="width:70px"></a>'
                }},
                { "data": "price"},
                { "data": "discount"},
                { "data": "offer_price"},
                { "data": "duration"},
                { "data": "sample_required"},
                { "data": "is_active", "render":function(data,type,row){
                    // active
                    if(data == '1'){
                        return '<a class="lab-test-active-inactive" data="0" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-success">Active</span></a>'
                    }
                    // inactive
                    if(data == '0'){
                        return '<a class="lab-test-active-inactive" data="1" href="javascript:void(0)" item-id="'+row.id+'"><span class="badge badge-danger">Inactive</span></a>'
                    }
                }},
                { "data": "id","render": function (data) {
                    return '<a href="javascript:void(0)" class="lab-test-manage-delete" data="'+data+'" name="delete"><i class="far fa-trash-alt text-danger"></i></a>'
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
