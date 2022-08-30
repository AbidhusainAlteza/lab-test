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

    <!-- 404-area -->
    <section class="error-area pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="error-content text-center">
                        <div class="error_txt">404</div>
                        <h5>oops! The page you requested was not found!</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- 404-area-end -->
</main>



<!-- main-area-end -->
@include ('partials.footer')
