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

                            <form class="needs-validation validation-fill" action="{{url('change-password-post')}}" method="POST" novalidate>
                                <div class="error"></div>
                                @csrf
                                <input type="hidden" name="id" value="{{$user_id}}">
                                @include('flash_message')
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom2">Old Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control"  name="old_Password" minlength="4" id="validationCustom2" placeholder="Contact Number"
                                             required>
                                            <div class="invalid-feedback ">Please provide a Minimum 4 Characters password.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom2">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control password1"  name="password" minlength="4" id="validationCustom2" placeholder="Contact Number"
                                             required>
                                            <div class="invalid-feedback ">Please provide a Minimum 4 Characters password.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom3">Confirm password</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control confirm_password" name="confirm_password" minlength="4" id="validationCustom3" placeholder="Contact Number"
                                             required>
                                            <div class="invalid-feedback ">Please provide a valid Contact Number.</div>
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
