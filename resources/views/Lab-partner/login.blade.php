
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{isset($title)?$title:"Lab Test admin"}}</title>

    <!-- Favicon -->
    {{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('admin/img/favicon.ico') }}"> --}}

    <!-- Iconic Fonts -->
    {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{ URL::asset('admin/vendors/iconic-fonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/vendors/iconic-fonts/flat-icons/flaticon.css') }}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/style.css') }}">

</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">

    <!-- Main Content -->
    <main class="body-content ms-lock-screen p-0">
        <!-- Body Content Wrapper -->
        <div class="ms-content-wrapper">
            <img class="ms-user-img ms-img-round ms-lock-screen-user" src="{{ URL::asset('admin/img/loginimg/admin_img3.png') }}" alt="Admin Login">
            <h3>Lab Partner Login</h3>
            @include('flash_message')
            <form method="post" action="{{url('lab-partner-login')}}">
                @csrf
                <div class="ms-form-group my-0 mb-3 has-icon fs-14">
                    <!-- <input id="email" type="email" class="ms-form-input" name="email" placeholder="Enter Email" required> -->
                    <input id="email" type="email" class="ms-form-input " name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter Your Email" required>
                    <i class="fas fa-user"></i>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="ms-form-group my-0 mb-0 has-icon fs-14">
                    <input id="password" type="password" class="ms-form-input" name="password" autocomplete="current-password" placeholder="Enter Your Password" required>
                    <i class="fas fa-lock"></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <button  type="submit" class="btn bg-info w-100 mt-30 text-white">Sign in</button>
            </form>

        </div>

    </main>



    <!-- SCRIPTS -->
    <!-- Global Required Scripts Start -->
    <script src="{{ URL::asset('admin/js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/framework.js') }}"></script>
    <script src="{{ URL::asset('admin/js/settings.js') }}"></script>

</body>


</html>
