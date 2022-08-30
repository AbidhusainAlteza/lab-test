</main>
 <!-- SCRIPTS -->
 <script src="{{ URL::asset('admin/js/jquery-3.5.0.min.js') }}"></script>
 <script src="{{ URL::asset('admin/js/popper.min.js') }}"></script>
 <script src="{{ URL::asset('admin/js/bootstrap.min.js') }}"></script>
 <script src="{{ URL::asset('admin/js/perfect-scrollbar.js') }}"></script>
 <script src="{{ URL::asset('admin/js/jquery-ui.min.js') }}"></script>
 <script src="{{ URL::asset('admin/js/Chart.bundle.min.js') }}"></script>
 <script src="{{ URL::asset('admin/js/sweetalert2.min.js') }}"></script>
 <script src="{{ URL::asset('admin/js/widgets.js') }}"></script>
 <script src="{{ URL::asset('admin/js/clients.js') }}"></script>
 <script src="{{ URL::asset('admin/js/Chart.Financial.js') }}"></script>
 <script src="{{ URL::asset('admin/js/d3.v3.min.js') }}"></script>
 <script src="{{ URL::asset('admin/js/topojson.v1.min.js') }}"></script>
 <script src="{{ URL::asset('admin/js/datatables.min.js') }}"></script>
 <script src="{{ URL::asset('admin/js/data-tables.js') }}"></script>
 <script src="{{ URL::asset('admin/js/framework.js') }}"></script>
 <script src="{{ URL::asset('admin/js/settings.js') }}"></script>
 <script src="{{ URL::asset('admin/js/custome.js') }}"></script>


 <script type="text/javascript">
     $(document).ready(function() {
         $('.ckeditor').ckeditor();
     });

     $(".package_type").keyup(function() {
         var type = $(this).val();
         type = type.toLowerCase();
         type = type.replace(/[^a-zA-Z0-9]+/g,'-');
         $(".package_slug").val(type);
     });

     function preview() {
         frame.src=URL.createObjectURL(event.target.files[0]);
     }

     $(document).ready(function($){
         var url = window.location.href;
         $('.page li a[href="'+url+'"]').addClass('active');
     });
 </script>

</body>


</html>
