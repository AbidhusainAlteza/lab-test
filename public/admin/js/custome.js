var base_url = window.location.origin;
$(document).ready( function () {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".Number").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().delay(1000).fadeOut("slow");
                return false;
        }
    });
    // create slug
    $(".package_type").keyup(function() {
        var type = $(this).val();
        type = type.toLowerCase();
        type = type.replace(/[^a-zA-Z0-9]+/g,'-');
        $(".package_slug").val(type);
    });
});

(function($) {

    var tableFour = $('#data_table').DataTable( {
        // dom: 'B<"clear">lfrtip',
        "dom": '<"top"<"left-col "l><"center-col"B><"right-col"f>>rtip',
        buttons: [{
            extend: "excel",
            className: "btn-table-custome",
            titleAttr: 'Export in Excel',
            text: 'Download Excel',
            init: function(api, node, config) {
                $(node).removeClass('btn-default')
            }
        }
        ],
        lengthMenu: [
            [10, 25, 50, -1 ],
            [ '10', '25', '50', 'Show all' ]
        ],
        order: [[0, 'desc']],
        responsive: true,
      });

})(jQuery);


$(document).ready( function () {

    $(document).on('click','.vendor_delete',function(){
        var vendor_id = $(this).attr('vendor-id');
        var user_id = $(this).attr('user-id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then(function (result) {
              if (result.value) {
                console.log('asd');
                $.ajax({
                    type: "POST",
                    url:base_url+'/admin/vendor/delete',
                    data: {

                        "vendor_id": vendor_id,
                        "user_id": user_id
                    },
                    success: function (d) {
                        if (d == '1') {
                            Swal.fire('Deleted!', 'Vendor has been deleted.', 'success');
                            location.reload()

                        }else{
                            console.log(d);
                            swal('Error')
                        }
                    }
                });
            }
          });
    });

    // password and confirm password chek
    $('.administrator-form').submit(function(){
        $('.alert-danger').remove();
        var pass = $('.password').val();
        var conpass= $('.confirm_password').val();
        console.log(conpass);
        if(conpass !== ""){
            if (pass !== conpass) {
                $('.error').append('<div class="alert alert-danger">confirmation password and password not match</div>');
                return false;
            }
        }
    })
    // password and confirm password chek
    $('.user-form').submit(function(){
        $('.alert-danger').remove();
        var pass = $('.password').val();
        var conpass= $('.confirm_password').val();
        console.log(conpass);
        if(conpass !== ""){
            if (pass !== conpass) {
                $('.error').append('<div class="alert alert-danger">confirmation password and password not match</div>');
                return false;
            }
        }
    })
    $(document).on('click','.user_delete',function(){
        var user_id = $(this).attr('user-id');
        console.log(user_id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then(function (result) {
              if (result.value) {
                console.log('asd');
                $.ajax({
                    type: "POST",
                    url:base_url+'/admin/user/delete',
                    data: {
                        "user_id": user_id
                    },
                    success: function (d) {
                        if (d == '1') {
                            Swal.fire('Deleted!', 'Vendor has been deleted.', 'success');
                            location.reload()

                        }else{
                            console.log(d);
                        }
                    }
                });
            }
          });
    });
    $(document).on('click','.ban_user',function(){
        var user_id = $(this).attr('user-id');
        console.log(user_id);
        Swal.fire({
            title: 'Are you sure?',
            // text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, ban it!'
          }).then(function (result) {
              if (result.value) {
                console.log('asd');
                $.ajax({
                    type: "POST",
                    url:base_url+'/admin/user/ban',
                    data: {
                        "user_id": user_id
                    },
                    success: function (d) {
                        if (d == '1') {
                            Swal.fire('Ban!', 'User has been Ban.', 'success');
                            location.reload()

                        }else{
                            console.log(d);
                        }
                    }
                });
            }
          });
    });
    $(document).on('click','.remove_user_ban',function(){
        var user_id = $(this).attr('user-id');
        console.log(user_id);
        Swal.fire({
            title: 'Are you sure?',
            // text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove user banit !'
          }).then(function (result) {
              if (result.value) {
                console.log('asd');
                $.ajax({
                    type: "POST",
                    url:base_url+'/admin/user/remove-user-ban',
                    data: {
                        "user_id": user_id
                    },
                    success: function (d) {
                        if (d == '1') {
                            Swal.fire('remove user ban !', 'User has been remove user ban.', 'success');
                            location.reload()

                        }else{
                            console.log(d);
                        }
                    }
                });
            }
          });
    });

    $(document).on('click','.administrator_delete',function(){
        var user_id = $(this).attr('user-id');
        console.log(user_id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then(function (result) {
              if (result.value) {
                // console.log('asd');
                $.ajax({
                    type: "POST",
                    url:base_url+'/admin/administrator/delete',
                    data: {
                        "administrator_id": user_id
                    },
                    success: function (d) {
                        if (d == '1') {
                            Swal.fire('Deleted!', 'Vendor has been deleted.', 'success');
                            location.reload()

                        }else{
                            console.log(d);
                        }
                    }
                });
            }
          });
    });

    // Admin Slider Active OR Inactive //
    $(document).on('click','.slider-active-inactive',function() {
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
                    url: base_url + '/admin/slider-active-inactive',
                    data: {
                        "item_id": item_id,
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
                            // location.reload();
                        } else {
                            console.log(data);
                        }
                    }
                });
            }
        });
    });
    //====================================//

    // Admin Slider Active OR Inactive //
    $(document).on('click','.health-concern-active-inactive',function() {
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
                    url: base_url + '/admin/health-concern-inactive-inactive',
                    data: {
                        "item_id": item_id,
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
                            Swal('Error');
                            console.log(data);
                        }
                    }
                });
            }
        });
    });
    //====================================//
    // Admin Lab Test Active OR Inactive //
    $(document).on('click','.lab-test-active-inactive',function() {
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
                console.log('asd');
                $.ajax({
                    type: "POST",
                    url: base_url + '/admin/lab-test-active-inactive',
                    data: {
                        "item_id": item_id,
                        "actione":actione
                    },
                    success: function(data) {
                        if (data == '1') {
                            // location.reload();
                            if (actione == '1') {
                                a_tag.attr('data','0');
                                a_tag.html('<span class="badge badge-success">Active</span>');
                            }
                            if(actione == '0'){
                                a_tag.attr('data','1');
                                a_tag.html('<span class="badge badge-danger">Inactive</span>');
                            }
                        } else {
                            Swal('Error');
                        }
                    }
                });
            }
        });
    });
    //====================================//
    // Admin Package Type Active OR Inactive //
    $(document).on('click','.pack-type-active-inactive',function() {
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
                console.log('asd');
                $.ajax({
                    type: "POST",
                    url: base_url + '/admin/pack-type-active-inactive',
                    data: {
                        "item_id": item_id,
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
                            console.log(data);
                        }
                    }
                });
            }
        });
    });
    //====================================//
    // Admin Packages Top Booked Show OR Hide //
    $(document).on('click','.package_top_book',function(){
        var a_tag = $(this);
        action_data = a_tag.attr('data');
        var top_book_id = a_tag.attr('book-id');
        var span = $(this).children();
        Swal.fire({
            title: 'Are you sure?',
            // text: "Added the Top Booked Packages!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085D6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: base_url + '/admin/show-hide-pack-booked',
                    data: {
                        "top_book_id": top_book_id,
                        "action_data":action_data
                    },
                    success: function(data) {
                        if (data == '1') {
                            if(action_data == 1){
                                // Swal.fire('Show the Top Booked!', 'success');
                                $(a_tag).attr('data',0);
                                $(a_tag).html('<span class="badge badge-success">Show</span>')
                            }
                            if(action_data == 0){
                                // Swal.fire('Hide the Top Booked!', 'success');
                                $(a_tag).attr('data',1);
                                $(a_tag).html('<span class="badge badge-danger">Hide</span>')

                            }
                            // location.reload()
                        } else {
                            console.log(data);
                            Swal('Error');
                        }
                    }
                });
            }
        });
    });
    // =================================== //

// Admin Package Active OR Inactive //
    $(document).on('click','.package-active-inactive',function() {
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
                console.log('asd');
                $.ajax({
                    type: "POST",
                    url: base_url + '/admin/package-active-inactive',
                    data: {
                        "item_id": item_id,
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
    //====================================//
    // Admin Offers Type Active OR Inactive //
    $(document).on('click','.offer-type-active-inactive',function() {
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
                console.log('asd');
                $.ajax({
                    type: "POST",
                    url: base_url + '/admin/offer-type-active-inactive',
                    data: {
                        "item_id": item_id,
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
                            // location.reload();
                        } else {
                            swal('Error');
                        }
                    }
                });
            }
        });
    });
    //====================================//
    // Admin Offers Active OR Inactive //
    $(document).on('click','.offers-active-inactive', function() {
        var item_id = $(this).attr('item-id');
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
                console.log('asd');
                $.ajax({
                    type: "POST",
                    url: base_url + '/admin/offers-active-inactive',
                    data: {
                        "item_id": item_id,
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
                            // location.reload();
                        } else {
                            swal("Error");
                            // console.log(data);
                        }
                    }
                });
            }
        });
    });
    //====================================//
    // Admin Seo Active OR Inactive //
    $(document).on('click','.seo-active',function() {
        var item_id = $(this).attr('item-id');
        console.log(item_id);
        Swal.fire({
            title: 'Are you sure?',
            text: "This Item is Inactive!",
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
                    url: base_url + '/admin/seo-inactive',
                    data: {
                        "item_id": item_id
                    },
                    success: function(data) {
                        if (data == '1') {
                            location.reload();
                        } else {
                            console.log(data);
                        }
                    }
                });
            }
        });
    });
    $(document).on('click','.seo-inactive',function() {
        var item_id = $(this).attr('item-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "This Item is Active!",
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
                    url: base_url + '/admin/seo-active',
                    data: {
                        "item_id": item_id
                    },
                    success: function(data) {
                        if (data == '1') {
                            location.reload();
                        } else {
                            console.log(data);
                        }
                    }
                });
            }
        });
    });
    //====================================//
    // img show in model
    $(document).on('click','.img_show_class',function(){
        var img_src = $(this).attr('src');
        console.log(img_src)
        $('.imageset_show_model').attr('src',img_src);
    });


    // blood boy active in active
    $(document).on('click','.blood_boy_active_inactive',function(){
        var a_tag = $(this);
        var actione = a_tag.attr('data');
        var blood_boy_id = a_tag.attr('item-id');
        console.log(actione+'-'+blood_boy_id)
        Swal.fire({
            title: 'Are you sure?',
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
                    url: base_url + '/admin/blood-collection-boy-active-inactive',
                    data: {
                        "blood_boy_id": blood_boy_id,
                        "actione":actione
                    },
                    success: function(data) {
                        if (data == '1') {
                            if(actione == '1'){
                                console.log('abid'+data);
                                a_tag.attr('data','0');
                                a_tag.html('<span class="badge badge-success">Active</span>');
                            }
                            if (actione == '0') {
                                console.log('rahar'+data);
                                a_tag.attr('data','1');
                                a_tag.html('<span class="badge badge-danger">Inactive</span>');

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

    // admin change password
    $(document).on('submit','.admin-change-password',function(){
        console.log('abiddddddddddd');
        $('.alert-danger').remove();
        var pass = $(".password1").val();
        var conpass = $(".confirm_password").val();
        if(pass !== ""){
            if (pass !== conpass) {
                $(".error").append('<div class="alert alert-danger">confirmation password and password not match</div>');
                return false;
            }else{
                $('.alert-danger').remove();
                return true;
            }
        }
    })

});
// form img show
function formImageShow(show_id) {
    var img = document.createElement("IMG");
    img.src = URL.createObjectURL(event.target.files[0]);
    $('#'+show_id).html(img);
}

