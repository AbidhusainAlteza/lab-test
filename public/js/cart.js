// satate to get city
$(document).ready(function() {
    $('.cart-state').select2();
    $('.cart-city').select2();
    $(".cart-state").change(function(){
        var state_id = $(this).val();
        console.log(state_id);
        $.ajax({
            type: "POST",
            url: base_url + "/state-get-city",
            data: {
                state_id:state_id,
            },
            success: function (data) {
                data = JSON.parse(data)
                data.forEach(element => {
                    $('.cart-city').append($("<option></option>").attr("value", element.id).text(element.name));
                    console.log(element.name)
                });
            },
        });
    });

});
$(document).ready(function () {
    $('.cart_user_addres_datails').hide();
    $('.cart_select_btn').click(function(){
        $(".cart_user_addres_wrap .active").removeClass();
        $('.cart_select_btn').html('<i class="fa-regular fa-circle-check"></i> Select').css('background-color','');
        var selected_id = $(this).attr('data');
        $(this).html('<i class="fa-regular fa-circle-check"></i> Selected').css('background-color','#c7a049');
        $('#cart_user_addres_select_id_'+selected_id).addClass('active');
        $(".cart_user_addres_id").val(selected_id);
    });
    $('.cart_show_user_address').click(function(){
        var data = $(this).attr('data');
        console.log(data);
        if(data == 0){
            $('.cart_show_user_address').html('<i class="fa-solid fa-minus"></i> Colose');
            $('.cart_user_addres_datails').show();
            $('.cart-user-address-showe').hide();
            $('.cart_user_address_continue').hide();
            $(this).attr('data','1');
        }else{
            $(this).attr('data','0');
            $('.cart_show_user_address').html('<i class="fa-solid fa-plus"></i> Add New Address');
            $('.cart_user_addres_datails').hide();
            $('.cart-user-address-showe').show();
            $('.cart_user_address_continue').show();
        }
    });
    $('.cart_user_address_continue').click(function(){
        var user_addres_id = $('.cart_user_addres_id').val();
        if(user_addres_id == ''){
            console.log('asd')
            swal(" Please Select Address")
        }else{
            console.log(user_addres_id)
            $.ajax({
                type: "POST",
                url: base_url + "/user_details_add",
                data: {
                    user_addres_id: user_addres_id,
                },
                success: function (d) {
                    if(d == 1){
                        console.log(d);
                        window.location.href = base_url+'/time-slot';
                    }else{
                        swal("something was wrong");
                    }
                },
            });
        }
    })
});


// time sloat js
$(function () {
    // $('#date-time').bootstrapMaterialDatePicker({
    //     format: 'YYYY-MM-DD HH:mm'
    // });
    $('#cart_timeslot_date').bootstrapMaterialDatePicker({
        time: false
    });
    $('#cart_timeslot_time').bootstrapMaterialDatePicker({
        date: false,
        format: 'HH:mm'
    });
});
