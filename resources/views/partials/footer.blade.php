        <!-- footer-area -->
        <footer>
            <div class="footer-area alteza-bg pt-20 pb-20">
                <div class="container custom-container">
                    <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                            <div class="footer-widget">
                                <div class="footer-logo ">
                                    <a href="{{url('')}}"><img src="{{ url('')}}/img/logo/alteza_pharmacy2.png" alt="Alteza Pharmacy" ></a>
                                </div>
                                <div class="footer-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6">
                            <div class="footer-widget mb-50">
                                <div class="fw-title">
                                    <h5 class="title">Services</h5>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                        <li><a href="{{url('packages')}}">Packages</a></li>
                                        <li><a href="{{url('lab-tests')}}">Lab Tests</a></li>
                                        <li><a href="{{url('offers')}}">Offers</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                            <div class="footer-widget mb-50">
                                <div class="fw-title">
                                    <h5 class="title">Policies </h5>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                        @if (count(footer_link()) > 0)
                                            @foreach (footer_link() as  $footer_link)
                                                @if ($footer_link->location == "policies")
                                                <li><a href="{{url('footer/'.$footer_link->slug)}}">{{ucwords($footer_link->title)}}</a></li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6">
                            <div class="footer-widget mb-50">
                                <div class="fw-title">
                                    <h5 class="title">Need Help</h5>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                        @if (count(footer_link()) > 0)
                                            @foreach (footer_link() as  $footer_link)
                                                @if ($footer_link->location == "need_help")
                                                <li><a href="{{url('footer/'.$footer_link->slug)}}">{{ucwords($footer_link->title)}}</a></li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6">
                            <div class="footer-widget mb-50">
                                <div class="fw-title">
                                    <h5 class="title">Company</h5>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                        @if (count(footer_link()) > 0)
                                            @foreach (footer_link() as  $footer_link)
                                                @if ($footer_link->location == "company")
                                                <li><a href="{{url('footer/'.$footer_link->slug)}}">{{ucwords($footer_link->title)}}</a></li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="copyright-wrap">
                <div class="container custom-container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright-text">
                                <p>Copyright &copy; 2022 Alteza All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="payment-accepted text-center text-md-right">
                                <img src="{{ url('')}}/img/payment/visa.svg" alt="">
                                <img src="{{ url('')}}/img/payment/mastercard.svg" alt="">
                                <img src="{{ url('')}}/img/payment/maestro.svg" alt="">
                                <img src="{{ url('')}}/img/payment/american.svg" alt="">
                                <img src="{{ url('')}}/img/payment/discover.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area-end -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <img src="" class="">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
        </div>




		<!-- JS here -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
        <script src="{{asset('admin/js/sweetalert2.min.js')}}"></script>
        <script src="{{ asset('js/isotope.pkgd.min.js')}}"></script>
        <script src="{{ asset('js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('js/jquery.countdown.min.js')}}"></script>
        <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{ asset('js/slick.min.js')}}"></script>
        <script src="{{ asset('js/ajax-form.js')}}"></script>
        <script src="{{ asset('js/wow.min.js')}}"></script>
        <script src="{{ asset('js/aos.js')}}"></script>
        <script src="{{ asset('js/plugins.js')}}"></script>
        <script src="{{ asset('fancy-file-uploader/jquery.ui.widget.js')}}"></script>
        <script src="{{ asset('fancy-file-uploader/jquery.fileupload.js')}}"></script>
        <script src="{{ asset('fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
        <script src="{{ asset('fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
        <script src="{{ asset('dist/imageuploadify.min.js')}}"></script>
        <script src="{{ asset('admin/js/datatables.min.js') }}"></script>
        <script src="{{ asset('js/main.js')}}"></script>
        <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('js/main1.js')}}"></script>
        <script src="{{ asset('bootstrap-material-datetimepicker/js/moment.min.js')}}"></script>
        <script src="{{ asset('bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{ asset('js/custome.js')}}"></script>
        <script src="{{ asset('js/cart.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        {{-- <script src="https://checkout.razorpay.com/v1/checkout.js"></script> --}}
        <script src="{{ asset('js/payment.js')}}"></script>
        <script>
            $(function () {
            $('[data-toggle="tooltip"]').tooltip()
            })
            // img show in modal
            $(document).ready(function(){
                $('.imageclick').click(function(){
                    var img = $('.img-data').attr('src');
                    console.log(img)
                    $('.imag_show').prop("src",img);
                });
            });
            $( document ).ready(function() {
                $(".test_a_calick").click(function () {
                    // var parent = $(this).parent().attr('class');
                    var parent = $(this).parent().get();
                    var children = $(parent).children().get(1);
                    var a = $(children).attr('id');
                    var icone = $(this).children().attr('id');
                    if ($(this).hasClass("active")) {
                        $(this).removeClass("active");
                        $('#'+a).addClass("test_disebal");
                        $('#'+icone).css("transform","rotate(358deg)")
                    }
                    else {
                        $('#'+a).removeClass("test_disebal");
                        $(this).addClass("active");
                        $('#'+icone).css("transform","rotate(179deg)")
                    }
                });
            });

        </script>
        <script>
            // Self-executing function
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');

                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </body>
</html>
