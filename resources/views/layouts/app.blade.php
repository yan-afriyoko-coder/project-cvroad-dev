<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams"> 
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams"> 
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    
</head>
<body>

  @auth
    @yield('auth')
  @endauth
  @guest
    @yield('guest')
  @endguest 




<!--confirm modal-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirm-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">          
        <h4 class="modal-title" id="myModalLabel">Confirm ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-main" id="btn-confirm-yes">Yes</button>
        <button type="button" class="btn btn-danger" id="btn-confirm-no">No</button>
      </div>
    </div>
  </div>
</div>  
<!--/confirm-modal-->
    <div class="fb2022-copy">Fbee 2022 copyright</div>
    {{-- <script src="{{asset('assets/js/nav-bg.js"></script>
     --}}
    <style>
      .btn-main
      {
        color: #ffffff !important;
        border: none !important;        
        background-color: #02ce65 !important;
        border-radius: 12px !important;
        font-weight: 600 !important;
      } 
      
      .btn-danger
      {
        color: #ffffff !important;
        border-color:  #02ce65  !important;
        background-color: #02ce65 !important;
        border-radius: 12px !important;
        font-weight: 600 !important;
      }
      
      .btn-danger:hover {
          background-color: #28a745 !important;
          border-color: #28a745 !important;
      }

      .btn-google
      {
        color: #ffffff !important;
        border-color:  #DB4437 !important;
        background-color: #DB4437 !important;
        border-radius: 12px !important;
        font-weight: 600 !important;
      }
      .btn-linkedin
      {
        color: #ffffff !important;
        border-color:  #0072b1 !important;
        background-color: #0072b1 !important;
        border-radius: 12px !important;
        font-weight: 600 !important;
      }

      /* Add a dark overlay to the header image */
      .header-overlay {
          background: rgba(0, 0, 0, 0.8); /* Adjust the alpha (4th value) for opacity */
          padding: 50px 0; /* Adjust the padding as needed */
          color: white; /* Text color on the overlay */
      }

      .header-logo{
        max-width: 10% !important;
      }

      .job-badge
      {
        border-radius: 50% !important;
      }

      .job-container {
        width: 100%; /* Set the width of the container */
        white-space: nowrap; /* Prevent text from wrapping to the next line */
        overflow: hidden; /* Hide any content that overflows the container */
}

.ellipsis-text {
    text-overflow: ellipsis; /* Display an ellipsis (...) when text overflows the container */
    overflow: hidden; /* Hide any content that overflows the container */
}

.update-news
{
  padding: 20px !important;
  background-color: #d9fcea !important;
}
      

    </style> 
    <script src="{{asset('assets/js/nav-bg.js')}}"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>    
    
    <!--confirm modal script-->
    <script>
      var confirm_form;
      var formConfirm = function(callback){  
        $(".btn-confirm").on("click", function(){
          confirm_form = $(this).closest("li").find("form");          
          $("#confirm-modal").modal('show');
        });

        $(".btn-confirm-div-form").on("click", function(){
          confirm_form = $(this).closest("div").find("form");          
          $("#confirm-modal").modal('show');
        });

        $("#btn-confirm-yes").on("click", function(){
          callback(true);

          $("#confirm-modal").modal('hide');
        });
        
        $("#btn-confirm-no").on("click", function(){
          callback(false);
          $("#confirm-modal").modal('hide');
        });
      };

    formConfirm(function(confirm){
      if(confirm){   
        console.log(confirm_form.attr("action"))     ;
        confirm_form.submit();
        
      }else{
        
      }
    });
</script>  

</body>
</html>