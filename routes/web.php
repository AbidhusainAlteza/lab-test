<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\health_concern_Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Cart_Controller;
// admin
use App\Http\Controllers\Admin_slider_controller;
use App\Http\Controllers\Admin_login_controller;
use App\Http\Controllers\Admin_health_concern_Controller;
use App\Http\Controllers\Admin_home_controller;
use App\Http\Controllers\Admin_lab_test_manage_controller;
use App\Http\Controllers\Admin_packages_controller;
use App\Http\Controllers\Admin_package_type_controller;
use App\Http\Controllers\Order_controller;
use App\Http\Controllers\Admin_order_controller;
use App\Http\Controllers\Serche_controller;
use App\Http\Controllers\Upload_prescription_controller;
use App\Http\Controllers\Location_controller;
use App\Http\Controllers\Admin_offers_controller;
use App\Http\Controllers\Admin_offer_type_controller;
use App\http\Controllers\Admin_seo_controller;
use App\http\Controllers\Admin_top_booked_controller;
use App\http\Controllers\Admin_lab_partner_controller;
use App\http\Controllers\Admin_blood_collection_boy_controller;
use App\Http\Controllers\Admin_manag_area_controller;
use App\Http\Controllers\Admin_pages_controller;
use App\Http\Controllers\Collection_boy_Controller;
use App\Http\Controllers\Lab_partner_controller;
use App\Models\Admin_health_concern;
use App\Models\Admin_manag_area;
use App\Models\Admin_offers_type;
use App\Models\Admin_pages;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[health_concern_Controller::class,'Index']);
Route::get('tests-details',[health_concern_Controller::class,'Tests_Details']);
Route::get('lab-tests/{slug}',[health_concern_Controller::class,'lab_test_details']);
Route::get('health-concern/{name}',[health_concern_Controller::class,'Health_Concern']);
Route::get('health-checkup-packages/{slug}',[health_concern_Controller::class,'Health_Checkup_Packages']);
Route::get('health-checkup-packages-book/{id}',[Cart_Controller::class,'Health_Checkup_Packages_Book']);
Route::get('packages',[health_concern_Controller::class,'packages_show']);
Route::get('offers',[health_concern_Controller::class,'offers']);
Route::get('offers/{slug}',[health_concern_Controller::class,'offers_page']);
Route::get('lab-tests',[health_concern_Controller::class,'lab_tests_index']);
Route::get('404',[health_concern_Controller::class,'error']);
// add-to-cart
Route::post('add-to-cart',[Cart_Controller::class,'Add_To_Cart']);
Route::post('remove-to-cart',[Cart_Controller::class,'Remove_To_Cart']);
Route::post('get-cart-data',[Cart_Controller::class,'get_cart_data']);

// Footer links
Route::get('footer/{slug}',[health_concern_Controller::class,'footer_link']);
// slider

// user middleware
Route::group(['middleware' =>["userauthechek"]],function(){
    // user-details
    Route::get('user-details-add-cart/{id}',[Cart_Controller::class,'User_Details_Add_Cart']);
    Route::get('user-details',[Cart_Controller::class,'User_Details']);
    Route::post('user_details_add',[Cart_Controller::class,'User_Details_Add']);
    Route::get('payment',[Cart_Controller::class,'Payment']);
    Route::get('time-slot',[Cart_Controller::class,'time_slot']);
    Route::post('time-slot-post',[Cart_Controller::class,'time_slot_post']);
    Route::post('order-add',[Cart_Controller::class,'order_add']);
    Route::post('razorpay-payment',[Cart_Controller::class,'razorpay_payment']);
    Route::post('coupon-apply',[Cart_Controller::class,'coupon_apply']);
    Route::post('remove-coupon',[Cart_Controller::class,'remove_coupon']);
    // orders
    Route::get('orders',[Order_controller::class,'orders']);
    Route::get('completed-orders',[Order_controller::class,'completed_orders']);
    Route::get('order-details/{id}',[Order_controller::class,'order_details']);
    Route::get('prescription-order-details/{id}',[Order_controller::class,'prescription_order_details']);
    Route::get('invoice/{id}',[Order_controller::class,'invoice']);
    Route::get('prescription-invoice/{id}',[Order_controller::class,'prescription_invoice']);
    //setting
    Route::get('account',[Order_controller::class,'account']);
    Route::post('update-profile-post',[Order_controller::class,'update_profile_post']);
    Route::get('user-personal-information',[Order_controller::class,'user_personal_information']);
    Route::post('user-personal-information-post',[Order_controller::class,'user_personal_information_post']);
    Route::get('change-password',[Order_controller::class,'change_password']);
    Route::post('change-password-post',[Order_controller::class,'change_password_post']);

    // upload-prescription
    Route::get('upload-prescription',[Upload_prescription_controller::class,'upload_prescription']);
    Route::post('upload-prescription-post',[Upload_prescription_controller::class,'upload_prescription_post']);
    // user-patient-add
    Route::post('user-patient-add',[AdminController::class,'user_patient_add']);
    Route::post('user-patient-edit-get',[AdminController::class,'user_patient_edit_get']);
    Route::post('user-patient-edit',[AdminController::class,'user_patient_edit']);
    Route::post('user-patient-delete',[AdminController::class,'user_patient_delete']);
    // user-address
    Route::post('user-address-edit-get',[AdminController::class,'user_address_edit_get']);
    Route::post('user-address-edit',[AdminController::class,'user_address_edit']);
    Route::post('user-address-delete',[AdminController::class,'user_address_delete']);
    Route::post('state-get-city',[Location_controller::class,'state_get_city']);

});
// serche
Route::get('index-serche',[Serche_controller::class,'index_serche_get']);
Route::post('serche-form',[Serche_controller::class,'serche_form']);
// location
Route::post('location-chek',[Location_controller::class,'location_chek']);
// user register
Route::get('register',[AdminController::class,'Register']);
Route::post('register-post',[AdminController::class,'RegisterPost']);
Route::post('user-login',[AdminController::class,'LoginPost']);
Route::get('user-logout',[AdminController::class,'User_Logout']);



// blood_collection_boy
Route::get('collection-boy',[Collection_boy_Controller::class,'index']);
Route::post('collection-boy-login',[Collection_boy_Controller::class,'collection_boy_login']);

Route::group(['middleware' =>["collectionboychek"]],function(){
    Route::get('collection-boy-dashboard',[Collection_boy_Controller::class,'collection_boy_dashboard']);
    Route::get('collection-boy-logout',[Collection_boy_Controller::class,'collection_boy_logout']);
    // Order
    Route::get('collection-boy/order',[Collection_boy_Controller::class,'order_get']);
    Route::get('collection-boy/order/order-details/{id}',[Collection_boy_Controller::class,'order_details']);
    Route::get('collection-boy/order/order-prescription-details/{id}',[Collection_boy_Controller::class,'order_prescription_details']);
    // collection-boy-status chage
    Route::post('collection-boy-status',[Collection_boy_Controller::class,'change_status']);

});

// Lab-partner
Route::get('lab-partner',[Lab_partner_controller::class,'index']);
Route::post('lab-partner-login',[Lab_partner_controller::class,'lab_partner_login']);

Route::group(['middleware'=>['Lab_partnerchek']],function(){
    Route::get('lab-partner-dashboard',[Lab_partner_controller::class,'lab_partner_dashboard']);
    Route::get('lab-partner-logout',[Lab_partner_controller::class,'lab_partner_logout']);
    // order
    Route::get('lab-partner/order',[Lab_partner_controller::class,'order_get']);
    Route::get('lab-partner/order/order-details/{id}',[Lab_partner_controller::class,'order_details']);
    Route::get('lab-partner/order/order-prescription-details/{id}',[Lab_partner_controller::class,'order_prescription_details']);
    Route::post('lab-partner-status',[Lab_partner_controller::class,'lab_partner_status']);
    Route::post('lab-partner-report-upload',[Lab_partner_controller::class,'lab_partner_report_upload']);
});

// admin
Route::get('auth',[Admin_login_controller::class,'index']);
Route::post('admin-login',[Admin_login_controller::class,'checkuser']);
// admin middleware
Route::group(['middleware' =>["authechek"]],function(){
    Route::get('dashboard',[Admin_home_controller::class,'index']);
    // logout
    Route::get('logout',[Admin_login_controller::class,'logout']);
    // health-concern
    Route::resource('admin/health-concern', Admin_health_concern_controller::class);
    // csv upload
    Route::post('admin/health-concern-csv-uplod',[Admin_health_concern_controller::class,'health_concern_csv_uplod']);
    // demo health-concern-csv-download
    Route::get('admin/health-concern-csv-download',[Admin_health_concern_controller::class,'health_concern_csv_download']);
    Route::post('admin/health-concern-delete', [Admin_health_concern_controller::class,'health_concern_delete']);
    Route::post('admin/health-concern-inactive-inactive', [Admin_health_concern_controller::class,'hc_active_inactive']);
    // active-health-concern get data
    Route::post('admin/active-health-concern',[Admin_health_concern_controller::class,'active_health_concern']);
    // total-health-concern get data
    Route::post('admin/total-health-concern',[Admin_health_concern_Controller::class,'total_health_concern']);
    // inactive-health-concern get data
    Route::post('admin/inactive-health-concern',[Admin_health_concern_Controller::class,'inactive_health_concern']);

    // packages
    Route::resource('admin/packages', Admin_packages_controller::class);
    // Route::get('admin/packages-destroy/{id}', [Admin_packages_controller::class,'destroy']);
    Route::post('admin/package-delete',[Admin_packages_controller::class,'destroy']);
    Route::post('admin/package-active-inactive', [Admin_packages_controller::class,'package_active_inactive']);
    Route::post('admin/show-hide-pack-booked', [Admin_packages_controller::class,'show_hide_package_booked']);
    // total package get data
    Route::post('admin/total-package',[Admin_packages_controller::class,'total_package']);
    // active package get data
    Route::post('admin/active-package',[Admin_packages_controller::class,'active_package']);
    // inactive package get data
    Route::post('admin/inactive-package',[Admin_packages_controller::class,'inactive_package']);

    // offer
    Route::resource('admin/offers', Admin_offers_controller::class);
    Route::post('admin/offers-delete',[Admin_offers_controller::class,'destroy']);
    Route::post('admin/offers-active-inactive', [Admin_offers_controller::class,'offers_active_inactive']);
    // total offer get data
    Route::post('admin/total-offer',[Admin_offers_controller::class,'total_offer']);
    // active offer get data
    Route::post('admin/active-offer',[Admin_offers_controller::class,'active_offer']);
    // active offer get data
    Route::post('admin/inactive-offer',[Admin_offers_controller::class,'inactive_offer']);
    // offer-type
    Route::resource('admin/offer-type', Admin_offer_type_controller::class);
    // Route::get('admin/offer-type-delete/{id}', [Admin_offer_type_controller::class,'destroy']);
    Route::post('admin/offer-type-delete', [Admin_offer_type_controller::class,'destroy']);
    Route::post('admin/offer-type-active-inactive', [Admin_offer_type_controller::class,'offer_type_active_inactive']);
    // total offer type get data
    Route::post('admin/total-offer-type',[Admin_offer_type_controller::class,'total_offer_type']);
    // active offer type get data
    Route::post('admin/active-offer-type',[Admin_offer_type_controller::class,'active_offer_type']);
    // inactive offer type get data
    Route::post('admin/inactive-offer-type',[Admin_offer_type_controller::class,'inactive_offer_type']);


    // lab-test-manage
    Route::resource('admin/lab-test-manage', Admin_lab_test_manage_controller::class);
    // lab-test-manage-resul-table-update
    Route::post('admin/lab-test-manage-resul-table-update',[Admin_lab_test_manage_controller::class,'lab_test_manage_resul_table_update']);
    // lab-test-manage csv file upload
    Route::post('admin/lab-test-manage-csv-uplod',[Admin_lab_test_manage_controller::class,'lab_test_manage_csv_uplod']);
    // lab-test-managecsv file download
    Route::get('admin/lab-test-manage-csv-download',[Admin_lab_test_manage_controller::class,'lab_test_manage_csv_download']);

    // lab-test result table delete
    Route::post('admin/lab-test-manage-resul-table-delete',[Admin_lab_test_manage_controller::class,'lab_test_manage_resul_table_delete']);

    // lab-test-result-table-csv-uplod
    Route::post('admin/lab-test-result-table-csv-uplod',[Admin_lab_test_manage_controller::class,'lab_test_result_table_csv_uplod']);
    // lab-test-result-table-csv-download
    Route::get('admin/lab-test-result-table-csv-download',[Admin_lab_test_manage_controller::class,'lab_test_result_table_csv_download']);
    Route::post('admin/lab-test-manage-delete', [Admin_lab_test_manage_controller::class,'destroy']);
    Route::post('admin/lab-test-active-inactive', [Admin_lab_test_manage_controller::class,'lab_test_active_inactive']);
    // total labtest manage get data
    Route::post('admin/total-labtest-manage',[Admin_lab_test_manage_controller::class,'total_labtest_manage']);
    // active labtest get data
    Route::post('admin/active-labtest-manage',[Admin_lab_test_manage_controller::class,'active_labtest_manage']);
    // inactive labtest manage get data
    Route::post('admin/inactive-labtest-manage',[Admin_lab_test_manage_controller::class,'inactive_labtest_manage']);

    // task
    Route::post('/task-add',[Admin_packages_controller:: class, 'task_details']);
    Route::post('/task-delete',[Admin_packages_controller:: class, 'task_delete']);
    Route::post('/admin/package-task-add',[Admin_packages_controller::class,'package_task_add']);

    // admin slider new
    Route::resource('admin/slider', Admin_slider_controller::class);
    // Route::get('admin/slider/delete/{id}',[Admin_slider_controller::class,'destroy']);
    Route::post('admin/slider-delete',[Admin_slider_controller::class,'destroy']);
    Route::post('admin/slider-active-inactive', [Admin_slider_controller::class,'slider_active_inactive']);
    // total slider get data
    Route::post('admin/total-slider',[Admin_slider_controller::class,'total_slider']);
    // active slider get data
    Route::post('admin/active-slider',[Admin_slider_controller::class,'active_slider']);
    // inactive slider get data
    Route::post('admin/inactive-slider',[Admin_slider_controller::class,'inactive_slider']);

    // admin package type
    Route::resource('admin/package-type', Admin_package_type_controller::class);
    Route::post('admin/package-type-delete', [Admin_package_type_controller::class, 'destroy']);
    Route::post('admin/pack-type-active-inactive', [Admin_package_type_controller::class,'pack_type_active_inactive']);
    // total package type get data
    Route::post('admin/total-package-type',[Admin_package_type_controller::class,'total_package_type']);
    // active package type get data
    Route::post('admin/active-package-type',[Admin_package_type_controller::class,'active_package_type']);
    // inactive package type get data
    Route::post('admin/inactive-package-type',[Admin_package_type_controller::class,'inactive_package_type']);
    //  Administrator
    Route::get('admin/administrator',[Admin_login_controller::class,'administrator'])->middleware('administrator');
    Route::get('admin/administrator/add',[Admin_login_controller::class,'administrator_add']);
    Route::post('admin/administrator/add-post',[Admin_login_controller::class,'administrator_add_post']);
    Route::get('admin/administrator/edit/{id}',[Admin_login_controller::class,'administrator_edit']);
    Route::post('admin/administrator/edit-post',[Admin_login_controller::class,'administrator_edit_post']);
    Route::get('admin/administrator/change-password/{id}',[Admin_login_controller::class,'administrator_change_password']);
    Route::post('admin/administrator/change-password-post',[Admin_login_controller::class,'administrator_change_password_post']);
    Route::post('admin/administrator/delete',[Admin_login_controller::class,'administrator_delete']);

    // users
    Route::get('admin/customer',[Admin_login_controller::class,'user']);
    Route::get('admin/user/add',[Admin_login_controller::class,'user_add']);
    Route::post('admin/user/add-post',[Admin_login_controller::class,'user_add_post']);
    Route::post('admin/user/delete',[Admin_login_controller::class,'user_delete']);
    Route::post('admin/user/ban',[Admin_login_controller::class,'user_ban']);
    Route::post('admin/user/remove-user-ban',[Admin_login_controller::class,'remove_user_ban']);
    // toral user get data
    Route::post('admin/total-user-getdata',[Admin_login_controller::class,'total_user_getdata']);
    // active user get data
    Route::post('admin/active-user-getdata',[Admin_login_controller::class,'active_user_getdata']);
    // banned user get data
    Route::post('admin/banned-user-getdata',[Admin_login_controller::class,'banned_user_getdata']);

    // vendors
    Route::get('admin/vendor',[Admin_login_controller::class,'vendor']);
    Route::get('admin/vendor/add',[Admin_login_controller::class,'vendor_add']);
    Route::post('admin/vendor/add-post',[Admin_login_controller::class,'vendor_add_post']);
    Route::get('admin/vendor/edit/{id}',[Admin_login_controller::class,'vendor_edit']);
    Route::post('admin/vendor/edit-post',[Admin_login_controller::class,'vendor_edit_post']);
    Route::post('admin/vendor/delete',[Admin_login_controller::class,'vendor_delete']);
    // vendor active in active
    Route::post('admin/vendor-active-inactive',[Admin_login_controller::class,'vendor_active_inactive']);
    // total vendor get data
    Route::post('admin/total-vendor-getdata',[Admin_login_controller::class,'total_vendor_getdata']);
    // active vendor get data
    Route::post('admin/active-vendor-getdata',[Admin_login_controller::class,'active_vendor_getdata']);
    // deactive vendor get data
    Route::post('admin/deactive-vendor-getdata',[Admin_login_controller::class,'deactive_vendor_getdata']);

    //Admin Orders
    Route::get('admin/order',[Admin_order_controller::class,'index']);
    Route::post('admin/order-delete', [Admin_order_controller::class, 'delete']);
    Route::get('admin/order/order-details/{id}',[Admin_order_controller::class,'order_details']);
    Route::get('admin/order/invoice/{id}',[Admin_order_controller::class,'invoice']);
    // all order get data
    Route::post('admin/all-order-get-data',[Admin_order_controller::class,'all_order_get_data']);
    // pending order get data
    Route::post('admin/pending-order-get-data',[Admin_order_controller::class,'pending_order_get_data']);
    // completed order get data
    Route::post('admin/completed-order-get-data',[Admin_order_controller::class,'completed_order_get_data']);
    // prescription
    Route::post('admin/prescription-order-get-data',[Admin_order_controller::class,'prescription_order_get_data']);
    // pending order
    Route::get('admin/pending-order',[Admin_order_controller::class,'pending_order']);
    // completed-order
    Route::get('admin/completed-order',[Admin_order_controller::class,'completed_order']);
    // prescription-order
    Route::get('admin/prescription-order',[Admin_order_controller::class,'prescription_order']);
    //Admin Orders prescription
    Route::get('admin/order/order-prescription-details/{id}',[Admin_order_controller::class,'order_prescription_details']);
    Route::post('admin/prescription-order-add',[Admin_order_controller::class,'prescription_order_add']);
    Route::post('admin/prescription-order-remove',[Admin_order_controller::class,'prescription_order_remove']);
    Route::post('admin/prescription-order-package-add',[Admin_order_controller::class,'prescription_order_package_add']);
    Route::post('/admin/prescription-order-package-remove',[Admin_order_controller::class,'prescription_order_package_remove']);

    // order-doctor-name-add
    Route::post('admin/order-doctor-name-add',[Admin_order_controller::class,'order_doctor_name_add']);
    // order-current-status-add
    Route::post('admin/order-current-status-add',[Admin_order_controller::class,'order_current_status_add']);
    // order-blood-collection-boy-add
    Route::post('admin/order-blood-collection-boy-add',[Admin_order_controller::class,'order_blood_collection_boy_add']);
    // order-lab-partner-add
    Route::post('admin/order-lab-partner-add',[Admin_order_controller::class,'order_lab_partner_add']);
    // order-payment-status-add
    Route::post('admin/order-payment-status-add',[Admin_order_controller::class,'order_payment_status_add']);
    // order lab-partner-status
    Route::post('admin/lab-partner-status',[Lab_partner_controller::class,'lab_partner_status']);
    // order lab partner report upload
    Route::post('admin/lab-partner-report-upload',[Lab_partner_controller::class,'lab_partner_report_upload']);
    // collection-boy-status chage
    Route::post('admin/collection-boy-status',[Collection_boy_Controller::class,'change_status']);

    //Blood Collection Boy
    Route::resource('admin/blood-collection-boy', Admin_blood_collection_boy_controller::class);
    Route::post('admin/blood-collection-boy-delete', [Admin_blood_collection_boy_controller::class, 'destroy']);
    Route::post('admin/blood-collection-boy-active-inactive', [Admin_blood_collection_boy_controller::class,'blood_boy_active_inactive']);
    // Lab Partner
    Route::resource('admin/lab-partner', Admin_lab_partner_controller::class);
    Route::post('admin/lab-partner-delete', [Admin_lab_partner_controller::class, 'destroy']);
    Route::post('admin/lab-partner-active', [Admin_lab_partner_controller::class,'lab_partner_active']);
    Route::post('admin/lab-partner-inactive', [Admin_lab_partner_controller::class,'lab_partner_inactive']);

    // admin profile
    Route::get('admin/update-profile',[Admin_login_controller::class,'update_profile']);

    // Admin SEO work
    Route::resource('admin/seo', Admin_seo_controller::class);
    Route::get('admin/seo/delete/{id}',[Admin_seo_controller::class,'destroy']);
    Route::post('admin/seo-active', [Admin_seo_controller::class,'seo_active']);
    Route::post('admin/seo-inactive', [Admin_seo_controller::class,'seo_inactive']);

    // Admin Top Booked
    Route::resource('admin/top-booked', Admin_top_booked_controller::class);
    Route::get('admin/top-booked/delete/{id}',[Admin_top_booked_controller::class,'destroy']);
    Route::post('/top-booked-add',[Admin_top_booked_controller:: class,'booked_details']);

    // pages
    Route::get('admin/pages',[Admin_pages_controller::class,'index']);
    Route::get('admin/page/add',[Admin_pages_controller::class,'page_add']);
    Route::post('admin/page/add-post',[Admin_pages_controller::class,'page_add_post']);
    Route::get('admin/page/edit/{id}',[Admin_pages_controller::class,'page_edit']);
    Route::post('admin/page/edit-post',[Admin_pages_controller::class,'edit_post']);
    // pages show and hide
    Route::post('admin/page-show-hide',[Admin_pages_controller::class,'page_show_hide']);
    // pages delete
    Route::post('admin/page-delete',[Admin_pages_controller::class,'page_delete']);
    // total pages get data
    Route::post('admin/total-pages',[Admin_pages_controller::class,'total_pages']);
    // visibility show pages get data
    Route::post('admin/visibility-show-pages',[Admin_pages_controller::class,'visibility_show_pages']);
    // visibility hide pages get data
    Route::post('admin/visibility-hide-pages',[Admin_pages_controller::class,'visibility_hide_pages']);

    // manag-area
    Route::get('admin/manag-area',[Admin_manag_area_controller::class,'index']);
    Route::post('admin/manag-area-get-data',[Admin_manag_area_controller::class,'get_table_data']);
    Route::get('admin/manag-area-add',[Admin_manag_area_controller::class,'manag_area_add']);
    Route::post('admin/manag-area-add-post',[Admin_manag_area_controller::class,'manag_area_add_post']);
    Route::get('admin/manag-area-edit/{id}',[Admin_manag_area_controller::class,'manag_area_edit']);
    Route::post('admin/manag-area-edit-post',[Admin_manag_area_controller::class,'manag_area_edit_post']);
    Route::post('admin/manag-area-active-inactive',[Admin_manag_area_controller::class,'manag_area_active_inactive']);
    Route::post('admin/manag-area-delete',[Admin_manag_area_controller::class,'manag_area_delete']);

    // download
    Route::get('admin/manag-area-download',[Admin_manag_area_controller::class,'manag_area_demo_download']);
    // upload csv file
    Route::post('admin/manag-area-csv-uplod',[Admin_manag_area_controller::class,'manag_area_csv_uplod']);

    // Total number of pincode
    Route::post('admin/manag-area-total-number-pincodes',[Admin_manag_area_controller::class,'manag_area_total_number_pincodes']);
    // active number pincodes
    Route::post('admin/manag-area-active-number-pincodes',[Admin_manag_area_controller::class,'active_number_pincodes']);
    // deactive number pincode
    Route::post('admin/manag-area-deactive-number-pincodes',[Admin_manag_area_controller::class,'deactive_number_pincodes']);


    // assign-area
    Route::get('admin/assign-area',[Admin_manag_area_controller::class,'assign_area_index']);
    Route::get('admin/assign-area-add',[Admin_manag_area_controller::class,'assign_area_add']);
    Route::post('admin/assign-area-add-post',[Admin_manag_area_controller::class,'assign_area_add_post']);
    Route::get('admin/assign-area-edit/{id}',[Admin_manag_area_controller::class,'assign_area_edit']);
    Route::post('admin/assign-area-edit-post',[Admin_manag_area_controller::class,'assign_area_edit_post']);
    Route::post('admin/assign-area-delete',[Admin_manag_area_controller::class,'assign_area_delete']);
    Route::post('admin/assign-area-active-inactive',[Admin_manag_area_controller::class,'assign_area_active_inactive']);
    // aasign area active get data
    Route::post('admin/assign-area-active-data',[Admin_manag_area_controller::class,'assign_area_active_data']);
    // assign area total get data
    Route::post('admin/assign-area-total-data',[Admin_manag_area_controller::class,'assign_area_total_data']);
    // aasign area active get data
    Route::post('admin/assign-area-inactive-data',[Admin_manag_area_controller::class,'assign_area_inactive_data']);
});
