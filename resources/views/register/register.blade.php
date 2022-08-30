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
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
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
            <div class="row">
                <div class="col-md-6 col-sm-12 _register_form">
                    <div class="register-div">
                        <h5 class="pb-10">Register</h5>
                        @include('flash_message')
                        <form class="needs-validation validation-fill" id="form_register"
                            action="{{ url('register-post') }}" method="POST" autocomplete="on" novalidate>
                            @csrf
                            <input type="hidden" name="role" value="user">
                            <div class="error"></div>
                            <!-- include message block -->
                            <div id="result-login" class="font-size-13"></div>
                            <div class="form-group register-div">
                                <label for="username">User Name</label>
                                <input type="text" name="username" id="username" class="form-control "
                                    placeholder="Enter User Name" required autocomplete="off">
                            </div>
                            <div class="form-group register-div">
                                <label for="email">Enter Email</label>
                                <input type="email" name="email" id="email" class="form-control "
                                    placeholder="Email Address" required>
                            </div>
                            <div class="form-group register-div">
                                <label for="password">Enter Password</label>
                                <input type="password" name="password" id="password" class="form-control  password1"
                                    placeholder="password" minlength="4" required>
                            </div>
                            <div class="form-group register-div">
                                <label for="conformpassword">Enter Conform Password</label>
                                <input type="password" name="conformpassword" id="conformpassword"
                                    class="form-control confirm_password" placeholder="Conform Password" required>
                            </div>
                            <div class="form-group register-div">
                                <button id="form_register" class="btn btn-md btn-custom btn-block">Register</button>
                            </div>

                            <p class="p-social-media m-0 m-t-5">Have Account&nbsp;<a href="javascript:void(0)"
                                    class="a_tag" data-toggle="modal" data-target="#LoginModalCenter">Login</a></p>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 register-img-sm-none">
                    <div class="register-img ">
                        <img src="{{ url('') }}/upload/registered.png " alt="">
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-12">
                <div id="googleMap" style="width:100%;height:400px;"></div>
            </div>
        </div> --}}
    </section>
</main>


<!-- main-area-end -->
@include ('partials.footer')

{{-- <script>
    function myMap() {
        var mapProp = {
            center: new google.maps.LatLng(51.508742, 50.120850),
            zoom: 5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script> --}}
