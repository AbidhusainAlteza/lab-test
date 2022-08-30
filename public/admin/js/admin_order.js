$(document).ready(function(){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var base_url = window.location.origin;
    // all order get data
    $(document).on('click','.admin_allorder_get_data',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/all-order-get-data',
            success: function (data) {
                // console.log(data);
            var table = $('.admin-order-table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                {
                    className:'font-weight-bold',
                    "data": "id",
                    "render":function(data,type,row){
                    console.log(row)
                    if(row.prescription == 1){
                        return '<a href="'+base_url+'/admin/order/order-prescription-details/'+row.id+'">'+row.order_number+'</a>';
                    }else{
                        return '<a href="'+base_url+'/admin/order/order-details/'+row.id+'">'+row.order_number+'</a>';
                    }
                }},
                {
                    className: 'text-capitalize',
                    "data": "fullname"
                },
                {
                    className: 'text-capitalize',
                    "data": "address",
                },
                { "data": "prescription","render":function(data){
                    if(data == 1){
                        return 'Yes';
                    }else{
                        return "No";
                    }
                } },
                {"data":"price_total"},
                { "data": "payment_method","render":function(data){
                    if(data == 'cash_on_delivery'){
                        return 'Cash On Delivery';
                    }else{
                        return 'Online Payment';
                    }
                }},
                {"data":"added_date"},
                { "data": "current_status","render":function(data){
                    if(data == 'pending'){
                        return 'Pending';
                    }else if(data == 'valid'){
                        return 'Valid';
                    }else if(data == 'under_review'){
                        return 'Under Review';
                    }else if(data == 'in_proccess'){
                        return 'In Proccess';
                    }else if(data == 'wait_for_confirmation'){
                        return 'Wait For Confirmation';
                    }else if(data == 'assigned'){
                        return 'Assigned';
                    }else if(data == 'accepted'){
                        return 'Accepted';
                    }else if(data == 'ready'){
                        return 'Ready';
                    }else if(data == 'dispatched'){
                        return 'Dispatched';
                    }else if(data == 'completed'){
                        return 'Completed';
                    }else if(data == 'rejected'){
                        return 'Rejected';
                    }else if(data == 'cancelled'){
                        return 'Cancelled';
                    }
                }},
                { "data": "id","render":function(data,type,row){
                    return '<a href="'+base_url+'/admin/order-delete/'+row.id+'" onclick="return confirm("are you sure you want to delete this?")"><i class="fas fa-trash-alt"></i></a>'
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

    // pending order get data
    $(document).on('click','.admin_pending_order_get_data',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/pending-order-get-data',
            success: function (data) {
                // console.log(data);
            var table = $('.admin-order-table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                {
                    className:'font-weight-bold',
                    "data": "id",
                    "render":function(data,type,row){
                    console.log(row)
                    if(row.prescription == 1){
                        return '<a href="'+base_url+'/admin/order/order-prescription-details/'+row.id+'">'+row.order_number+'</a>';
                    }else{
                        return '<a href="'+base_url+'/admin/order/order-details/'+row.id+'">'+row.order_number+'</a>';
                    }
                }},
                {
                    className: 'text-capitalize',
                    "data": "fullname"
                },
                {
                    className: 'text-capitalize',
                    "data": "address",
                },
                { "data": "prescription","render":function(data){
                    if(data == 1){
                        return 'Yes';
                    }else{
                        return "No";
                    }
                } },
                {"data":"price_total"},
                { "data": "payment_method","render":function(data){
                    if(data == 'cash_on_delivery'){
                        return 'Cash On Delivery';
                    }else{
                        return 'Online Payment';
                    }
                }},
                {"data":"added_date"},
                { "data": "current_status","render":function(data){
                    if(data == 'pending'){
                        return 'Pending';
                    }else if(data == 'valid'){
                        return 'Valid';
                    }else if(data == 'under_review'){
                        return 'Under Review';
                    }else if(data == 'in_proccess'){
                        return 'In Proccess';
                    }else if(data == 'wait_for_confirmation'){
                        return 'Wait For Confirmation';
                    }else if(data == 'assigned'){
                        return 'Assigned';
                    }else if(data == 'accepted'){
                        return 'Accepted';
                    }else if(data == 'ready'){
                        return 'Ready';
                    }else if(data == 'dispatched'){
                        return 'Dispatched';
                    }else if(data == 'completed'){
                        return 'Completed';
                    }else if(data == 'rejected'){
                        return 'Rejected';
                    }else if(data == 'cancelled'){
                        return 'Cancelled';
                    }
                }},
                { "data": "id","render":function(data,type,row){
                    return '<a href="'+base_url+'/admin/order-delete/'+row.id+'" onclick="return confirm("are you sure you want to delete this?")"><i class="fas fa-trash-alt"></i></a>'
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

    // completed order get data
    $(document).on('click','.admin_completed_order_get_data',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/completed-order-get-data',
            success: function (data) {
                // console.log(data);
            var table = $('.admin-order-table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                {
                    className:'font-weight-bold',
                    "data": "id",
                    "render":function(data,type,row){
                    console.log(row)
                    if(row.prescription == 1){
                        return '<a href="'+base_url+'/admin/order/order-prescription-details/'+row.id+'">'+row.order_number+'</a>';
                    }else{
                        return '<a href="'+base_url+'/admin/order/order-details/'+row.id+'">'+row.order_number+'</a>';
                    }
                }},
                {
                    className: 'text-capitalize',
                    "data": "fullname"
                },
                {
                    className: 'text-capitalize',
                    "data": "address",
                },
                { "data": "prescription","render":function(data){
                    if(data == 1){
                        return 'Yes';
                    }else{
                        return "No";
                    }
                } },
                {"data":"price_total"},
                { "data": "payment_method","render":function(data){
                    if(data == 'cash_on_delivery'){
                        return 'Cash On Delivery';
                    }else{
                        return 'Online Payment';
                    }
                }},
                {"data":"added_date"},
                { "data": "current_status","render":function(data){
                    if(data == 'pending'){
                        return 'Pending';
                    }else if(data == 'valid'){
                        return 'Valid';
                    }else if(data == 'under_review'){
                        return 'Under Review';
                    }else if(data == 'in_proccess'){
                        return 'In Proccess';
                    }else if(data == 'wait_for_confirmation'){
                        return 'Wait For Confirmation';
                    }else if(data == 'assigned'){
                        return 'Assigned';
                    }else if(data == 'accepted'){
                        return 'Accepted';
                    }else if(data == 'ready'){
                        return 'Ready';
                    }else if(data == 'dispatched'){
                        return 'Dispatched';
                    }else if(data == 'completed'){
                        return 'Completed';
                    }else if(data == 'rejected'){
                        return 'Rejected';
                    }else if(data == 'cancelled'){
                        return 'Cancelled';
                    }
                }},
                { "data": "id","render":function(data,type,row){
                    return '<a href="'+base_url+'/admin/order-delete/'+row.id+'" onclick="return confirm("are you sure you want to delete this?")"><i class="fas fa-trash-alt"></i></a>'
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

    // prescription order get data
    $(document).on('click','.admin_prescription_order_get_data',function(){
        $.ajax({
            type: 'POST',
            url: base_url+'/admin/prescription-order-get-data',
            success: function (data) {
                // console.log(data);
            var table = $('.admin-order-table').DataTable({
                data: data,
                "bDestroy": true,
                columns: [
                {
                    className:'font-weight-bold',
                    "data": "id",
                    "render":function(data,type,row){
                    console.log(row)
                    if(row.prescription == 1){
                        return '<a href="'+base_url+'/admin/order/order-prescription-details/'+row.id+'">'+row.order_number+'</a>';
                    }else{
                        return '<a href="'+base_url+'/admin/order/order-details/'+row.id+'">'+row.order_number+'</a>';
                    }
                }},
                {
                    className: 'text-capitalize',
                    "data": "fullname"
                },
                {
                    className: 'text-capitalize',
                    "data": "address",
                },
                { "data": "prescription","render":function(data){
                    if(data == 1){
                        return 'Yes';
                    }else{
                        return "No";
                    }
                } },
                {"data":"price_total"},
                { "data": "payment_method","render":function(data){
                    if(data == 'cash_on_delivery'){
                        return 'Cash On Delivery';
                    }else{
                        return 'Online Payment';
                    }
                }},
                {"data":"added_date"},
                { "data": "current_status","render":function(data){
                    if(data == 'pending'){
                        return 'Pending';
                    }else if(data == 'valid'){
                        return 'Valid';
                    }else if(data == 'under_review'){
                        return 'Under Review';
                    }else if(data == 'in_proccess'){
                        return 'In Proccess';
                    }else if(data == 'wait_for_confirmation'){
                        return 'Wait For Confirmation';
                    }else if(data == 'assigned'){
                        return 'Assigned';
                    }else if(data == 'accepted'){
                        return 'Accepted';
                    }else if(data == 'ready'){
                        return 'Ready';
                    }else if(data == 'dispatched'){
                        return 'Dispatched';
                    }else if(data == 'completed'){
                        return 'Completed';
                    }else if(data == 'rejected'){
                        return 'Rejected';
                    }else if(data == 'cancelled'){
                        return 'Cancelled';
                    }
                }},
                { "data": "id","render":function(data,type,row){
                    return '<a href="'+base_url+'/admin/order-delete/'+row.id+'" onclick="return confirm("are you sure you want to delete this?")"><i class="fas fa-trash-alt"></i></a>'
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

    // order delete
    $(document).on('click','.admin-order-delete',function(){
        var order_id = $(this).attr('data-id');
        // console.log(order_id);
        Swal.fire({
            title: 'Are you sure?',
            // text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete!'
          }).then(function (result) {
              if (result.value) {
                console.log('asd');
                $.ajax({
                    type: "POST",
                    url:base_url+'/admin/order-delete',
                    data: {
                        "id": order_id
                    },
                    success: function (d) {
                        if (d == '1') {
                            Swal('Order deleted successfully.')
                            location.reload()
                        }else{
                            Swal('Error')
                        }
                    }
                });
            }
          });
    });
});
