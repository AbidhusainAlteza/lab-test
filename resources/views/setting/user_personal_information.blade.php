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
            <div class="row order-tab">
                <div class="col-md-4 col-sm-12 col-lg-4">
                    @include('setting.setting_tab')
                </div>
                <div class="col-md-8 col-sm-12 col-lg-8 update_profile">
                    <div class="ms-panel ">
                        <div class="ms-panel-body">

                            <form class="needs-validation validation-fill" action="{{url('user-personal-information-post')}}" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="error"></div>
                                @csrf
                                <input type="hidden" name="id" value="{{$user_id}}">
                                @include('flash_message')
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom1">Full name *</label>
                                        <div class="input-group">
                                            <input type="text" name="name" class="form-control" id="validationCustom1"
                                                placeholder="Name" value="{{isset($user_information->name)?$user_information->name:""}}" required>
                                            <div class="invalid-feedback">Please provide a User Name</div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 mb-3">
                                        <label for="validationCustom2">Contact Number *</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="validationCustom2"
                                                placeholder="Contact Number" name="contact_number" value="{{isset($user_information->contact_number)?$user_information->contact_number:""}}" required>
                                            <div class="invalid-feedback">Please provide a Contact Number</div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom3">Address *</label>
                                        <div class="input-group">
                                            <input type="text" name="address" class="form-control" id="validationCustom3"
                                                placeholder="Address" value="{{isset($user_information->address)?$user_information->address:""}}" required>
                                            <div class="invalid-feedback">Please provide a Address</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom5">City *</label>
                                        <div class="input-group">
                                            <input type="text" name="city" class="form-control" id="validationCustom5"
                                                placeholder="City" value="{{isset($user_information->city)?$user_information->city:""}}" required>
                                            <div class="invalid-feedback">Please provide a City</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom6">State *</label>
                                        <div class="input-group">
                                            <input type="text" name="state" class="form-control" id="validationCustom6"
                                                placeholder="State" value="{{isset($user_information->state)?$user_information->state:""}}" required>
                                            <div class="invalid-feedback">Please provide a State</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom7">Zip *</label>
                                        <div class="input-group">
                                            <input type="text" name="zip" class="form-control" id="validationCustom7"
                                                placeholder="Zip" value="{{isset($user_information->zip)?$user_information->zip:""}}" required>
                                            <div class="invalid-feedback">Please provide a Zip</div>
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
    </section>
</main>




<!-- main-area-end -->
@include ('partials.footer')
