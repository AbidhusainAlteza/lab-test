// satate to get city
$(document).ready(function() {
    $('.state').select2();
    $('.city').select2();
    $(".state").change(function(){
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
                    $('.city').append($("<option></option>").attr("value", element.id).text(element.name));
                    console.log(element.name)
                });
            },
        });
    });

});

$(document).ready(function () {
    $('.edit_colose').hide();
    $('.user_address_edit_colose').hide();
    $('.user_patient_edit').click(function(){
        var user_patient_id = $(this).attr('user_patient_id');
        $.ajax({
            type: "POST",
            url: base_url + "/user-patient-edit-get",
            data: {
                user_patient_id: user_patient_id,
            },
            success: function (data) {
                if (data !== "0") {
                    data = JSON.parse( data );
                    var now = new Date(data.date_of_birth);
                    var day = ("0" + now.getDate()).slice(-2);
                    var month = ("0" + (now.getMonth() + 1)).slice(-2);
                    var today = now.getFullYear()+"-"+(month)+"-"+(day);
                    $('.edit_colose').show();
                    $('#user_patient_title').html('Edit Patients');
                    $('#user_patient_form').attr('action',base_url +'/user-patient-edit');
                    $('#user_patient_edit_id').val(data.id);
                    $('.patient_name').val(data.patient_name);
                    $('.mobile_no').val(data.mobile_no);
                    $('.date_of_birth').val(today);
                    $('.relationship').val(data.relationship);
                    $('.blood_group').val(data.blood_group);
                    $('.weight').val(data.weight);
                    $('.height').val(data.height);
                    $('.medicine_condition').val(data.medicine_condition);
                    $('.allegies_reactions').val(data.allegies_reactions);
                    $('.medications').val(data.medications);
                    $('.contact_name').val(data.contact_name);
                    $('.contact_phone').val(data.contact_phone);

                } else {
                    swal("something was wrong");
                }
            },
        });
    })
    // colose Edit Patients
    $('.edit_colose').click(function(){
        $('.edit_colose').hide();
        $('#user_patient_title').html('Add Patients');
        $('#user_patient_form').attr('action',base_url +'/user-patient-add');
        $('#user_patient_edit_id').val('');
        $('.patient_name').val('');
        $('.mobile_no').val('');
        $('.date_of_birth').val('');
        $('.relationship').val('');
        $('.blood_group').val('');
        $('.weight').val('');
        $('.height').val('');
        $('.medicine_condition').val('');
        $('.allegies_reactions').val('');
        $('.medications').val('');
        $('.contact_name').val('');
        $('.contact_phone').val('');
    });
    // user patient delete
    $('.user_patient_delete').click(function(){
        var user_patient_id = $(this).attr('user_patient_id');
        console.log(user_patient_id);
        swal({
        title: "Are you sure?",
        text: "To Delete Patient",
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonColor: '#4eb92d',
        confirmButtonColor: '#d33',
        }).then((result) => {
            if(result.value){
                console.log('abid')
                $.ajax({
                    type: "POST",
                    url: base_url + "/user-patient-delete",
                    data: {
                        user_patient_id: user_patient_id,
                    },
                    success: function (d) {
                        console.log(d);
                        if(d == 1){
                        $('#user_patient_delete_'+user_patient_id).remove();

                        }else{
                            swal("something was wrong");
                        }
                    },
                });
            }
        });
    });
    // user address edit get
    $('.user-address-edit-get').click(function(){
        var user_addres_id = $(this).attr('data');
        console.log(user_addres_id)
        $.ajax({
            type: "POST",
            url: base_url + "/user-address-edit-get",
            data: {
                user_addres_id: user_addres_id,
            },
            success: function (data) {
                if (data !== "0") {
                    data = JSON.parse(data);
                    console.log(data.user_address.id)
                    $('.user_address_edit_colose').show();
                    $('#user_address_title').html('Edit address');
                    $('#user_address_form').attr('action',base_url +'/user-address-edit');
                    $('#user_address_id').val(data.user_address.id);
                    $('.name').val(data.user_address.name);
                    $('.address').val(data.user_address.address);
                    $('.city').append($("<option></option>").attr("value", data.get_city.id).text(data.user_address.city).attr("selected","selected"));
                    $('.state').append($("<option></option>").attr("value", data.get_state.id).text(data.user_address.state).attr("selected","selected"));
                    // $('.city').val(data.city);
                    // $('.state').val(data.state);
                    $('.zip').val(data.user_address.zip);
                    $('.contact_number').val(data.user_address.contact_number);
                    $('.message').val(data.user_address.message);
                } else {
                    swal("something was wrong");
                }
            },
        });
    });
    $('.user_address_edit_colose').click(function(){
        $('.user_address_edit_colose').hide();
        $('#user_address_title').html('Add address');
        $('#user_address_form').attr('action',base_url +'/user-personal-information-post');
        $('#user_address_id').val('');
        $('.name').val('');
        $('.address').val('');
        $('.city').append($("<option></option>").attr("value", '').text('').attr("selected",""));
        $('.state').append($("<option></option>").attr("value", '').text('').attr("selected",""));
        $('.city').val('');
        $('.state').val('');
        $('.zip').val('');
        $('.contact_number').val('');
        $('.message').val('');
    });
    $('.user-address-delete').click(function(){
        var user_address_delete_id = $(this).attr('data');
        console.log(user_address_delete_id,'user_address_delete_id_'+user_address_delete_id)
        swal({
        title: "Are you sure?",
        text: "To Delete Address",
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonColor: '#4eb92d',
        confirmButtonColor: '#d33',
        }).then((result) => {
            if(result.value){
                console.log('abid')
                $.ajax({
                    type: "POST",
                    url: base_url + "/user-address-delete",
                    data: {
                        user_address_delete_id: user_address_delete_id,
                    },
                    success: function (d) {
                        console.log(d);
                        if(d == 1){
                        $('.user_address_delete_id_'+user_address_delete_id).remove();
                        }else{
                            swal("something was wrong");
                        }
                    },
                });
            }
        });
    });

});
