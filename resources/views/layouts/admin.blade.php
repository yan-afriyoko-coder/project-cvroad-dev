<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <!-- Favicons -->
  <link href="{{asset('assets/img/logo.png')}}" rel="icon">
  <link href="{{asset('assets/img/logo.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css')}} " rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/boxicons/css/boxicons.min.css')}} " rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">

    <!--jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
@yield('auth')

<!--confirm modal-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirm-modal">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
      <div class="modal-header">          
          <h4 class="modal-title" id="myModalLabel">Confirm ?</h4>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" id="btn-confirm-yes">Yes</button>
          <button type="button" class="btn btn-primary" id="btn-confirm-no">No</button>
      </div>
      </div>
  </div>
</div>


 

  



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!--axios-->


  <!-- Vendor JS Files -->
  <script src="{{asset('assets/admin/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/php-email-form/validate.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('assets/admin/js/main.js')}}"></script>
  

  <!--confirm modal script-->
  <script type="text/javascript">
    var formCofirm = function(callback){  
        //btn-confirm  
        $(".btn-confirm").on("click", function(){
          confirm_form = $(this).closest("div").find("form"); 
          $("#confirm-modal").modal('show');
        }); 

        $("#btn-confirm-yes").on("click", function(){            
          callback(true);

          console.log("old one");
          $("#confirm-modal").modal('hide');
        });
        
        $("#btn-confirm-no").on("click", function(){
          callback(false);
          $("#confirm-modal").modal('hide');
        });
      };

    formCofirm(function(confirm){
      if(confirm){   
        console.log(confirm_form);
        confirm_form.submit();
        
      }else{
        
      }
    });    
  </script>

  

</body>

</html>