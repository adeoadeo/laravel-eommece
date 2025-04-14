
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
   
    <script src="{{ asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{ asset('admincss/js/front.js')}}"></script>
    <script>
      $(function(){
        'use strict';
  
        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
  
        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });
  
        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
  
      });
    </script>  
      