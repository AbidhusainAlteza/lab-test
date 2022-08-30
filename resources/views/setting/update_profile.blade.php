@include('partials.header')

<main>
    <div class="breadcrumb-area breadcrumb-bg-two">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- shop-details-area -->
    <section class="shop-details-area pt-20 pb-20">
        <div class="container custom-container">
            <div class="row ">
                <div class="col-md-4 col-sm-12 col-lg-4 order-tab">
                    @include('setting.setting_tab')
                </div>
                {{-- <div class="col-md-8 col-sm-12 col-lg-8 update_profile">
                    <div class="ms-panel ">
                        <div class="ms-panel-body">

                            <form class="needs-validation validation-fill" action="{{url('update-profile-post')}}" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="error"></div>
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                @include('flash_message')
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="user_avatar">
                                            <img src="{{url('Image/avatar')}}/{{$user->avatar}}" alt="user image" class="account-img">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom1">User Name</label>
                                        <div class="input-group">
                                            <input type="text" name="user_name" class="form-control" id="validationCustom1"
                                                placeholder="Name" value="{{$user->user_name}}" required>
                                            <div class="invalid-feedback">Please provide a valid User Name</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom2">Email</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" id="validationCustom2"
                                                placeholder="Email" name="email" value="{{$user->email}}" required>
                                            <div class="invalid-feedback">Please provide a valid Email</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom5">Contact Number</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control number"  name="contact_number" value="{{$user->contact_number}}" minlength="10" id="validationCustom5" placeholder="Contact Number"
                                             required>
                                            <div class="invalid-feedback">Please provide a valid Contact Number.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Select Image <span class="error">Max Size 5MB</span></label>
                                        <input type="file" name="avatar" class="form-control p-1" >
                                    </div>
                                </div>
                                <button class="btn" type="submit">Submit form</button>
                            </form>
                        </div>
                    </div>
                </div> --}}
                {{-- tabs --}}
                <div class="col-md-8 col-sm-12 col-lg-8 account-profile">
                    <div class="product-desc-wrap pt-0">
                        @include('flash_message')
                        <ul class="nav nav-tabs" id="myTabTwo" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="edit-profile-tab" data-toggle="tab" href="#edit-profile" role="tab"
                                    aria-controls="edit-profile" aria-selected="true">Edit Profile </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="manage-patients-tab" data-toggle="tab" href="#manage-patients" role="tab" aria-controls="manage-patients"
                                    aria-selected="false">Manage Patients</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="manage-address-tab" data-toggle="tab" href="#manage-address" role="tab"
                                    aria-controls="manage-address" aria-selected="false">Manage Address</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContentTwo">
                            {{-- profile --}}
                            <div class="tab-pane fade show active " id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                                <div class="col-md-8 col-sm-12 col-lg-8 update_profile p-0">
                                    <div class="ms-panel ">
                                        <div class="ms-panel-body">
                                            <form class="needs-validation validation-fill" action="{{url('update-profile-post')}}" method="POST" enctype="multipart/form-data" novalidate>
                                                <div class="error"></div>
                                                @csrf
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="user_avatar">
                                                            <img src="{{url('Image/avatar')}}/{{$user->avatar}}" alt="user image" class="img_show">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="validationCustom1">User Name</label>
                                                        <div class="input-group">
                                                            <input type="text" name="user_name" class="form-control" id="validationCustom1"
                                                                placeholder="Name" value="{{$user->user_name}}" required>
                                                            <div class="invalid-feedback">Please provide a valid User Name</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="validationCustom2">Email</label>
                                                        <div class="input-group">
                                                            <input type="email" class="form-control" id="validationCustom2"
                                                                placeholder="Email" name="email" value="{{$user->email}}" required>
                                                            <div class="invalid-feedback">Please provide a valid Email</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="validationCustom5">Contact Number</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control number Number"  name="contact_number" maxlength="12" value="{{$user->contact_number}}" minlength="10" id="validationCustom5" placeholder="Contact Number"
                                                             required>
                                                            <div class="invalid-feedback">Please provide a valid Contact Number.</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">Select Image <span class="error">Max Size 5MB</span></label>
                                                        <input type="file" name="avatar" class="form-control p-1" >
                                                    </div>
                                                </div>
                                                <button class="btn" type="submit">Submit form</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- User Patient --}}
                            <div class="tab-pane fade " id="manage-patients" role="tabpanel" aria-labelledby="manage-patients-tab">
                                <div class="row">
                                    @if(count($user_patients) > 0)
                                    <div class="col-md-4 col-sm-12 col-lg-4  p-0 user_patient">
                                        @foreach ($user_patients as $user_patient)
                                        <div class="ms-panel" id="user_patient_delete_{{$user_patient->id}}">
                                            <div class="ms-panel-body">
                                                <div class="display_flex_ju_s_b">
                                                    <h6 class="text-capitalize">{{$user_patient->patient_name}} - {{$user_patient->mobile_no}}</h6>
                                                    <div>
                                                        <i class="fa-solid fa-pen-to-square user_patient_edit" user_patient_id="{{$user_patient->id}}"></i>
                                                        <i class="fa-regular fa-calendar-xmark user_patient_delete" user_patient_id="{{$user_patient->id}}"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                    <div class="col-md-8 col-sm-12 col-lg-8 update_profile">
                                        <div class="ms-panel ">
                                            <div class="ms-panel-body user_patient_body">
                                                <div class="col-12 p-0 mb-1">
                                                    <div class="display_flex_ju_s_b">
                                                        <h6 class="text-capitalize" id='user_patient_title'>Add Patients</h6>
                                                        <i class="fa-solid fa-xmark edit_colose"></i>
                                                    </div>
                                                </div>
                                                <form class="needs-validation validation-fill" action="{{url('user-patient-add')}}" id="user_patient_form" method="POST" enctype="multipart/form-data" novalidate>
                                                    <div class="error"></div>
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                    <input type="hidden" name="user_patient_edit_id" id="user_patient_edit_id" value="">
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationCustom1">Patient Name</label>
                                                            <div class="input-group">
                                                                <input type="text" name="patient_name" class="form-control patient_name" value="" id="validationCustom1"
                                                                    placeholder="Patient Name"  required>
                                                                <div class="invalid-feedback">Please provide a valid Patient Name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationCustom2">Mobile No</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control mobile_no Number" maxlength="12" id="validationCustom2"
                                                                    placeholder="Mobile No" name="mobile_no" value="" required>
                                                                <div class="invalid-feedback">Please provide a valid Mobile No</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationCustom3">Date of Birth</label>
                                                            <div class="input-group">
                                                                <input type="date" class="form-control date_of_birth" id="validationCustom3"
                                                                    placeholder="Date of Birth" name="date_of_birth" required>
                                                                <div class="invalid-feedback">Please provide a valid Date of Birth</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationCustom4">Relationship</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control relationship" id="validationCustom4"
                                                                    placeholder="Relationship" name="relationship" value="" required>
                                                                <div class="invalid-feedback">Please provide a valid Relationship</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationCustom5">Blood Group</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control blood_group" id="validationCustom5"
                                                                    placeholder="Blood Group" name="blood_group" value="" required>
                                                                <div class="invalid-feedback">Please provide a valid Blood Group</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationCustom6">Weight (In kg)</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control weight" id="validationCustom6"
                                                                    placeholder="Weight (In kg)" name="weight" value="" required>
                                                                <div class="invalid-feedback">Please provide a valid Weight (In kg)</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationCustom7">Height (In cm)</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control height" id="validationCustom7"
                                                                    placeholder="Height (In cm)" name="height"  value="" required>
                                                                <div class="invalid-feedback">Please provide a valid Height (In cm)</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="validationCustom8">Medicine Condition</label>
                                                            <div class="input-group">
                                                                <textarea  class="form-control medicine_condition" id="validationCustom8" name="medicine_condition"  rows="2" cols="50" placeholder="Enter Medicine Condition" required></textarea>
                                                                <div class="invalid-feedback">Please provide a valid Medicine Condition</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="validationCustom9">Allegies Reactions</label>
                                                            <div class="input-group">
                                                                <textarea  class="form-control allegies_reactions" id="validationCustom9" name="allegies_reactions" rows="2" cols="50" placeholder="Enter Allegies Reactions" required></textarea>
                                                                <div class="invalid-feedback">Please provide a valid Allegies Reactions</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="validationCustom10">Medications</label>
                                                            <div class="input-group">
                                                                <textarea  class="form-control medications" id="validationCustom10" name="medications" rows="2" cols="50" placeholder="Enter Medications" required></textarea>
                                                                <div class="invalid-feedback">Please provide a valid Medications</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12 mb-3">
                                                            <h5>Emergency Contact Information</h5>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationCustom11">Contact Name</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control contact_name"  id="validationCustom11"
                                                                    placeholder="Contact Name" name="contact_name" value="" required>
                                                                <div class="invalid-feedback">Please provide a valid Contact Name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationCustom12">Contact Phone</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control contact_phone Number" maxlength="12"  id="validationCustom12"
                                                                    placeholder="Contact Phone" name="contact_phone" value="" required>
                                                                <div class="invalid-feedback">Please provide a valid Contact Phone</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class="btn" type="submit">Submit form</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- address --}}
                            <div class="tab-pane fade " id="manage-address" role="tabpanel" aria-labelledby="manage-address-tab">
                                <div class="row">
                                    @if(count($user_address)>0)
                                    <div class="col-md-4 col-sm-12 col-lg-4 user_patient">
                                        @foreach($user_address as $user_addres)
                                        {{-- {{var_dump()}} --}}
                                        <div class="ms-panel user_address_delete_id_{{$user_addres->id}}">
                                            <div class="ms-panel-body">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="user-address-dtailes">
                                                            <h6 class="text-capitalize">{{$user_addres->name}}</h6>
                                                            <span>{{$user_addres->address}},{{$user_addres->city}}</span>
                                                            <span>{{$user_addres->state}},{{$user_addres->zip}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="float-right">
                                                            <i class="fa-solid fa-pen-to-square user-address-edit-get" data="{{$user_addres->id}}"></i>
                                                            <i class="fa-regular fa-calendar-xmark user-address-delete" data="{{$user_addres->id}}"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                    <div class="col-md-8 col-sm-12 col-lg-8 update_profile">
                                        <div class="ms-panel ">
                                            <div class="ms-panel-body user_patient_body">
                                                <div class="col-12 p-0 mb-1">
                                                    <div class="display_flex_ju_s_b">
                                                        <h6 class="text-capitalize" id='user_address_title'>Add Address</h6>
                                                        <i class="fa-solid fa-xmark user_address_edit_colose"></i>
                                                    </div>
                                                </div>
                                                <form class="needs-validation validation-fill" action="{{url('user-personal-information-post')}}" id="user_address_form" method="POST" enctype="multipart/form-data" novalidate>
                                                    <div class="error"></div>
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                    <input type="hidden" name="user_address_id" id ="user_address_id"  value="">
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationCustom1">Full name *</label>
                                                            <div class="input-group">
                                                                <input type="text" name="name" class="form-control name" id="validationCustom1"
                                                                    placeholder="Name" value="" required>
                                                                <div class="invalid-feedback">Please provide a User Name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationCustom3">Address *</label>
                                                            <div class="input-group">
                                                                <input type="text" name="address" class="form-control address" id="validationCustom3"
                                                                    placeholder="Address" value="" required>
                                                                <div class="invalid-feedback">Please provide a Address</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationCustom10">Contact Number *</label>
                                                            <div class="input-group">
                                                                <input type="text" name="contact_number" class="form-control contact_number Number" maxlength="12" id="validationCustom10"
                                                                    placeholder="Contact Number" value="" required>
                                                                <div class="invalid-feedback">Please provide a Contact Number</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3 ">
                                                            <label for="validationCustom6">State *</label>
                                                            <div class="input-group">
                                                                <select type="text" name="state" class="form-control state" id="validationCustom6" required>
                                                                    <option>select a state</option>
                                                                    @foreach($get_states as $states)
                                                                    <option value="{{$states->id}}">{{$states->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                {{-- <input type="text" name="state" class="form-control state" id="validationCustom6"
                                                                placeholder="State" value="" required> --}}
                                                                <div class="invalid-feedback">Please provide a State</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationCustom5">City *</label>
                                                            <div class="input-group">
                                                                <select type="text" name="city" class="form-control city" id="validationCustom5" required>
                                                                    <option>select a city</option>
                                                                </select>
                                                                {{-- <input type="text" name="city" class="form-control city" id="validationCustom5"
                                                                    placeholder="City" value="" required> --}}
                                                                <div class="invalid-feedback">Please provide a City</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationCustom7">Zip *</label>
                                                            <div class="input-group">
                                                                <input type="text" name="zip" class="form-control zip" id="validationCustom7"
                                                                    placeholder="Zip" value="" required>
                                                                <div class="invalid-feedback">Please provide a Zip</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="validationCustom13">Message</label>
                                                            <div class="input-group">
                                                                <textarea  class="form-control message" id="validationCustom13" name="message"  rows="2" cols="50" placeholder="Enter Medicine Condition" ></textarea>
                                                                <div class="invalid-feedback">Please provide a valid Medicine Condition</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn" type="submit">Submit form</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>


{{-- js --}}
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src="{{ asset('js/setting_updateprofile.js')}}"></script>
<!-- main-area-end -->
@include ('partials.footer')
{{-- <script>
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
</script> --}}
