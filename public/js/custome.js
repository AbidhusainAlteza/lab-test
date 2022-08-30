var base_url = window.location.origin;
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    //called when key is pressed in textbox
    $(".Number").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().delay(1000).fadeOut("slow");
                return false;
        }
    });
    // prescription image
    $('#prescription_image_uploadify').imageuploadify();
});
// datatable

$(document).ready(function () {
    var tableFour = $("#order-table").DataTable({
        lengthMenu: [
            [10, 25, 50, -1],
            ["10", "25", "50", "Show all"],
        ],
        order: [[0, 'desc']],

    });
    let n = 0;
    $(".prescription_row_number").each(function () {
            $(this).html(++n);
        })
    // $(window).click(function() {
    //     var opacity = $('.minicart').css('opacity');
    //     if (opacity == 1) {
    //         $('.minicart').css({'opacity':'0','visibility': 'hidden'});
    //     }
    // });
    $("#cart_wrap").click(function () {
        var opacity = $(".minicart").css("opacity");
        if (opacity == 1) {
            $(".minicart").css({ opacity: "0", visibility: "hidden" });
        } else {
            $.ajax({
                type: "POST",
                url: base_url + "/get-cart-data",
                success: function(data) {
                    if(data['status'] !== '0'){
                        console.log(data['status'])
                        var get_cart = data['get_cart'];
                        get_cart = JSON.parse(get_cart)
                        $('.ajax_cart').remove();
                        $.each(get_cart, function(index, value){
                            $(".minicart").append(
                                '<div class="ajax_cart">'+
                                '<li class="d-flex align-items-start space-between border-bottom">'+
                                '<div class="cart-content">'+
                                '<h4><a href="javascript:void(0)">'+`${value.title }`+'</a></h4>'+
                                '<div class="cart-price">'+
                                    '<span class="new">₹'+`${value.offer_price }`+'</span>'+
                                    '<span><del>₹'+`${value.price }`+'</del></span>'+
                                    '<span class="discount">'+`${value.discount }`+'%</span>'+
                                '</div>'+
                                '</div>'+
                                '<div class="del-icon m-0">'+
                                '<a href="javascript:void(0)" class="remove-to-cart-tests" data-id="'+`${value.id }`+'"><i class="far fa-trash-alt"></i></a>'+
                                '</div>'+
                                '</li>'+
                                '</div>');
                          });
                          $('.minicart').append(
                            '<div class="ajax_cart">'+
                              '<li>'+
                              '<div class="total-price mb-1">'+
                                  '<span class="f-left">Total:</span>'+
                                  '<span class="f-right">₹'+data['cart_totalprice']+'</span>'+
                              '</div>'+
                          '</li>'+
                          '</div>')
                          if(data['chek_user']){
                            $('.minicart').append(
                                '<div class="ajax_cart">'+
                                '<li>'+
                                    '<div class="checkout-link">'+
                                        '<a class="black-color" href="'+base_url+'/user-details">Proceed to Checkout</a>'+
                                    '</div>'+
                                '</li>'+
                                '</div>');
                          }else{
                            $('.minicart').append(
                                '<div class="ajax_cart">'+
                                '<li>'+
                                    '<div class="checkout-link">'+
                                        '<a class="black-color" href="javascript:void(0)" data-toggle="modal" data-target="#LoginModalCenter">Prassaoceed to Checkout</a>'+
                                    '</div>'+
                                '</li>'+
                                '</div>');
                         }
                            // remove to cart
                            $(".remove-to-cart-tests").on('click',function () {
                                var id = $(this).attr("data-id");
                                var csrf = $('input[name="_token"]').attr("value");
                                $.ajax({
                                    type: "POST",
                                    url: base_url + "/remove-to-cart",
                                    data: {
                                        _token: csrf,
                                        id: id,
                                    },
                                    success: function (data) {
                                        if (data['status'] == "1") {
                                            console.log("abid");
                                            location.reload();
                                        } else {
                                            // location.reload()
                                            console.log("BHO");
                                        }
                                    },
                                });
                            });
                    }else{
                        $('.ajax_cart').remove();
                        $('.minicart').append(
                            '<div class="ajax_cart">'+
                            '<div class="cart_empty">'+
                                '<span>Cart Is Empty</span>'+
                            '</div>'+
                            '</div>')
                    }
                },
            });
            $(".minicart").css({
                opacity: "1",
                visibility: "visible",
                transform: "translateY(0px)",
            });
        }
    });

    // add-to-cart
    $(".add-to-cart-tests").click(function () {
        var id = $(this).attr("data-id");
        var data_reload = $(this).attr('data-re');
        var csrf = $('input[name="_token"]').attr("value");
        var p_value = $(this).children();
            value = p_value.attr("value");
        console.log(data_reload);
        if (value == 1) {
            $.ajax({
                type: "POST",
                url: base_url + "/remove-to-cart",
                data: {
                    _token: csrf,
                    id: id,
                },
                success: function (data) {
                    if (data['status'] == "1") {
                        // location.reload()
                        $('#item_counts').html(data['cart_item_total']);
                        p_value = p_value.html('Add').attr('value','0').css('color','#0c7c72');

                    } else {
                        alert("item is all redy add");
                    }
                },
            });
        } else {
            $.ajax({
                type: "POST",
                url: base_url + "/add-to-cart",
                data: {
                    _token: csrf,
                    id: id,
                },
                success: function (data) {
                    if (data['status'] == "1") {
                        if(data_reload == 'yes'){
                            location.reload();
                        }
                        // location.reload();
                        console.log('abid'+data_reload);

                        $('#item_counts').html(data['cart_item_total']);
                        p_value = p_value.html('Remove').attr('value','1').css('color','#696969');
                        console.log(data['cart_item_total']);
                    } else {
                        alert(data);
                    }
                },
            });
        }
    });

    // remove to cart
    $(".remove-to-cart-tests").on('click',function () {
        var id = $(this).attr("data-id");
        var csrf = $('input[name="_token"]').attr("value");
        $.ajax({
            type: "POST",
            url: base_url + "/remove-to-cart",
            data: {
                _token: csrf,
                id: id,
            },
            success: function (data) {
                if (data['status'] == "1") {
                    location.reload();
                } else {
                    // location.reload()
                    console.log("BHO");
                }
            },
        });
    });

    // user-details
    if ($("#use_same_address").prop("checked")) {
        $(".billing_details").css("display", "none");
    }
    $("#use_same_address").change(function () {
        if ($(this).prop("checked")) {
            $(".billing_details").css("display", "none");
        } else {
            $(".billing_details").css("display", "inline");
        }
    });
    // $("#firstname" ).keypress(function() {
    //     console.log( "Handler for .keypress() called." );
    //     validateForm();
    // });

    $("#form_validate").submit(function () {
        var fullname = $("#fullname").val();
        var contact_number = $("#contact_number").val();
        var address = $("#address").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var zip = $("#zip").val();
        console.log(fullname)
        if (
            fullname == "" ||
            contact_number == "" ||
            address == "" ||
            city == "" ||
            state == ""
        ) {
            if (fullname == "") {
                $("#fullname").css("border-color", "red");
            } else {
                $("#fullname").css("border-color", "#ebebeb");
            }
            if (contact_number == "") {
                $("#contact_number").css("border-color", "red");
            } else {
                $("#lastname").css("border-color", "#ebebeb");
            }
            if (address == "") {
                $("#address").css("border-color", "red");
            } else {
                $("#address").css("border-color", "#ebebeb");
            }
            if (city == "") {
                $("#city").css("border-color", "red");
            } else {
                $("#city").css("border-color", "#ebebeb");
            }
            if (state == "") {
                $("#state").css("border-color", "red");
            } else {
                $("#state").css("border-color", "#ebebeb");
            }
            return false;
        }
    });

    // register
    $(".user_login").click(function () {
        $(".login_error").css("display", "none");
        $(".login_error2").remove();
        $('.invalidEmail').remove();
        $(".error").remove();
        var email = $("#email").val();
        var password = $("#password").val();
        var minlength = $("#password").attr("minlength");
        //  var csrf = $('input[name="_token"]').attr('value');
        // console.log(minlength);
        if (isValidEmailAddress(email)) {
            if (email == "") {
                $("#email").css("border-color", "red");
            } else if (password == "") {
                $("#password").css("border-color", "red");
            } else if (password.length < minlength) {
                $("#password").css("border-color", "red");
                $(".password").append(
                    "<p class='error'>Minimum 4 Characters </p>"
                );
            } else {
                $("#email").css("border-color", "#ced4da");
                $("#password").css("border-color", "#ced4da");
                $(".error").css("display", "none");

                $.ajax({
                    type: "POST",
                    url: base_url + "/user-login",
                    data: {
                        email: email,
                        password: password,
                    },
                    success: function (d) {
                        // alert(d);
                        if (d == "0") {
                            $(".login_error").css("display", "inline");
                            $(".login_error").append(
                                "<div class='alert alert-info login_error2'>User not found</div>"
                            );
                            // location.reload()
                        } else if (d == "1") {
                            location.reload();
                        }else if(d == "2") {
                            $(".login_error").css("display", "inline");
                            $(".login_error").append(
                                "<div class='alert alert-info login_error2'>User is bane</div>"
                            );
                        } else {
                            $(".login_error").append(
                                "<div class='alert alert-info login_error2'>worng</div>"
                            );
                        }
                    },
                });
            }
        } else {
            $(".email").append("<p class='invalidEmail'>EX:-xxxxxxxx@xxxx.xxx</p>");
            $("#email").css("border-color", "red");
            console.log(email, "2");
        }
    });
    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(
            /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i
        );
        return pattern.test(emailAddress);
    }
    // show password
    $("#password_show_hide").on("click", function () {
        if ($(this).attr("data") == "hide") {
            $("#password").attr("type", "text");
            $(this).attr("data", "show");
            $(this).removeClass("password-hide");
            $(this).addClass("password-show");
        } else {
            $("#password").attr("type", "password");
            $(this).removeClass("password-show");
            $(this).addClass("password-hide");
            $(this).attr("data", "hide");
        }
    });
    // password and confirm password chek
    $(".needs-validation").submit(function () {
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
    });
    // apply copon
    $(".coupon_apply_btn").click(function () {
        var coupon_code = $("#coupon_code").val();
        if (coupon_code == "") {
            $("#coupon_code").css("border-color", "red");
        } else {
            $.ajax({
                type: "POST",
                url: base_url + "/coupon-apply",
                data: {
                    coupon_code: coupon_code,
                },
                success: function (d) {
                    console.log(d);
                    if (d == "0") {
                        $(".login_error").css("display", "inline");
                        // $(".coupon_aplay").append("<div class='alert alert-info'>coupon expayer</div>");
                        // location.reload()
                        Swal("Coupon Does Not Exist");
                    } else if (d == "1") {
                        location.reload();
                    } else {
                        $(".login_error").append(
                            "<div class='alert alert-info'>worng</div>"
                        );
                    }
                },
            });
        }
    });
    //remove apply copon
    $('.coupons_discount_remove').click(function(){
        console.log('coupons_discount_remove');
          swal({
            title: "Are you sure?",
            text: "To remove coupons",
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonColor: '#4eb92d',
            confirmButtonColor: '#d33',
          }).then((result) => {
              if(result.value){
                  console.log('abid')
                  $.ajax({
                      type: "POST",
                      url: base_url + "/remove-coupon",
                      success: function (d) {
                          console.log(d);
                          if(d == 0){
                            location.reload();
                        }
                    },
                });
            }
            });
    })
    // $('#testBtn').click(function(){
    //     alert('ababa');
    // });
    // $('#testInput').on('keyup', function(){
    //     alert('input');
    // })
    $(window).on('resize',function(){
        if (577 >= screen.width) {
            $('.serche_input_class').attr('id', '');
            $('.serche_ajax_class').attr('id', '');
            $('.serche_type').attr('id', '');
            // mobile
            $('.mobile_serche_input').attr('id', 'serche_input');
            $('.mobile_serche_ajax').attr('id', 'serche_ajax');
            $('.serche_type_mobile').attr('id', 'serche_ajax');

        }else{
            $('.serche_input_class').attr('id', 'serche_input');
            $('.serche_ajax_class').attr('id', 'serche_ajax');
            $('.serche_type').attr('id', 'serche_type');
            // mobile
            $('.mobile_serche_input').attr('id', '');
            $('.mobile_serche_ajax').attr('id', '');
            $('.serche_type_mobile').attr('id', '');
        }
    })
    if (577 >= screen.width) {
        $('.serche_input_class').attr('id', '');
        $('.serche_ajax_class').attr('id', '');
        $('.serche_type').attr('id', '');

        // mobile
        $('.mobile_serche_input').attr('id', 'serche_input');
        $('.mobile_serche_ajax').attr('id', 'serche_ajax');
        $('.serche_type_mobile').attr('id', 'serche_type');

    }else{
        $('.serche_input_class').attr('id', 'serche_input');
        $('.serche_ajax_class').attr('id', 'serche_ajax');
        $('.serche_type').attr('id', 'serche_type');
        // mobile
        $('.mobile_serche_input').attr('id', '');
        $('.mobile_serche_ajax').attr('id', '');
        $('.serche_type_mobile').attr('id', '');
    }
    //serche
    $("#serche_input").on('keyup',function () {
        $("#serche_ajax > a").remove();
        var serche_type = $("#serche_type").val();
        var serche_input = $("#serche_input").val();
        $.ajax({
            type: "GET",
            url: base_url + "/index-serche",
            data: {
                serche_type: serche_type,
                serche_input: serche_input,
            },
            success: function (data) {
                if (data["status"] == "success") {
                    $("#serche_ajax > li").remove();
                    if (data["data"].length !== 0) {
                        $.each(data["data"], function (key, value) {
                            $(".serche-result").css("display", "flex");
                            if (data["type"] == "lab_test") {
                                $("#serche_ajax").append(
                                    "<a href=" +
                                        base_url +
                                        "/lab-tests/" +
                                        value.slug +
                                        "><li>" +
                                        value.title +
                                        "</li></a>"
                                );
                            }
                            if (data["type"] == "packages") {
                                $("#serche_ajax").append(
                                    "<a href=" +
                                        base_url +
                                        "/health-checkup-packages/" +
                                        value.slug +
                                        "><li>" +
                                        value.title +
                                        "</li></a>"
                                );
                            }
                            if (data["type"] == "offers") {
                                $("#serche_ajax").append(
                                    "<a href=" +
                                        base_url +
                                        "/offers/" +
                                        value.slug +
                                        "><li>" +
                                        value.title +
                                        "</li></a>"
                                );
                            }
                        });
                        console.log(data["data"]["0"]["id"]);
                    } else {
                        $("#serche_ajax > li").remove();
                        $("#serche_ajax > a").remove();
                        $(".serche-result").css("display", "none");
                        console.log("52");
                    }
                }
            },
        });
    });

    // location chek
    $(".location_btn").click(function () {
        var inputLocation = $("#locationinput").val();
        if (inputLocation == "") {
            $("#locationinput").addClass("error");
        } else {
            $("#locationinput").removeClass("error");
            $.ajax({
                type: "POST",
                url: base_url + "/location-chek",
                data: {
                    inputLocation: inputLocation,
                },
                success: function (data) {
                    if (data["status"] == "success") {
                        // Swal(data["status"]);
                        // swal(data["data"].pincode);
                        swal({
                            title: "Available Lab Test",
                            text: data["data"].pincode+','+data["data"].taluka,
                            confirmButtonColor: '#4eb92d',
                          }).then((value) => {
                            location.reload();
                            });
                    } else {
                        Swal(data["status"]);
                    }
                },
            });
        }
    });
    // image show model
    $('.img_show').click(function(){
        var img =  $(this).attr('src')
        console.log(img)
        $('.img_show_modal').html("<div class='ff_fileupload_dialog_background'><div class='ff_fileupload_dialog_main'><img src='"+ img +"'><button  class='img_modal_close'><span aria-hidden='true'>&times;</span></button></div></div>")
    });
    // clos img show modal
    $(document).on('click', '.img_modal_close', function () {
        $('.ff_fileupload_dialog_background').remove();
    });
});
