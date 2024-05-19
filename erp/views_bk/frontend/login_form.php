<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BSCIC | Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/dashboard/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/dashboard/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/dashboard/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url();?>public/dashboard/images/bsic.png" />
  <style>
    .content-wrapper{
		background-image: url("../public/dashboard/images/industry.jpg")!important;
      
      background-position: center;
      background-size: cover;
    }
  </style>
</head>
<body>
<?php echo form_open($this->uri->uri_string()); ?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo" style="text-align: center;">
                <img src="<?php echo base_url();?>public/dashboard/images/bsic.png" alt="logo">
              </div>
              <div id='forge_pass_form'>
                <h6 class="font-weight-light" style="text-align: center;"><?= $this->lang->line('sign_in_to_continue')?></h6>
                <form class="pt-3">
                  <div class="form-group">
                    <input type="text" name="username" required autofocus class="form-control form-control-sm" id="exampleInputEmail1" placeholder="<?= $this->lang->line('username')?>">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" required  class="form-control form-control-sm" id="exampleInputPassword1" placeholder="<?= $this->lang->line('password')?>">
                  </div>
                  <div class="mt-3">
                      <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="<?= $this->lang->line('signin')?>"/>
                  
                    
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <!-- <label class=" text-muted">
                          <a href="#" class="auth-link text-black"><i class="mdi mdi-account-circle"></i><?= $this->lang->line('user_manual')?> </a>
                      </label> -->
                    </div>
                    <a href="#" onclick='forum_master()' class="auth-link text-black"><?= $this->lang->line('forget_password')?> ?</a>
                  </div>
                </form>
              </div>
              <div class="row">
                <div class="col-md-6">
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url();?>public/dashboard/vendors/base/vendor.bundle.base.js"></script>
  
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>public/dashboard/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>public/dashboard/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url();?>public/dashboard/js/template.js"></script>
  <!-- endinject -->
  <script>
      function forum_master(){
          $.ajax({
              url: "<?php echo base_url() ?>siteadmin/forge_password_view",
              type: 'POST',
              data: {},
              success: function (response) {
                  $('#forge_pass_form').html(response)
              }
          });
              
          
      }
      function send_otp(){
          var mobile= $('#mobile').val();
          if(mobile==''){
            $('#not_send_msg').removeClass('d-none')
            $('#not_send_msg').html('Please! Enter mobile number.')
          }else{
            $.ajax({
              url: "<?php echo base_url() ?>siteadmin/send_otp",
              type: 'POST',
              data: {mobile:mobile},
              success: function (response) {
                if(response == false){
                  $('#not_send_msg').removeClass('d-none')
                  $('#not_send_msg').html('Error! User not found.')

                }else{
                  $('#forge_pass_form').html(response)
                }
              }
            });
          }
      }
      function change_pass(){
          var otp= $('#otp').val();
          var new_password= $('#new_password').val();
          var confirm_password= $('#confirm_password').val();
          if(otp=='' || new_password=='' || confirm_password=='' ){
            $('#not_send_msg').removeClass('d-none')
            $('#not_send_msg').html('Please! Fill up required field.')
          }else{
            $.ajax({
              url: "<?php echo base_url() ?>siteadmin/change_forget_password",
              type: 'POST',
              dataType: 'json',
              data: {otp:otp,new_password:new_password,confirm_password:confirm_password},
              success: function (response) {
                if(response.status == true){
                  $('#not_send_msg').addClass('d-none')
                  $('#success_msg').removeClass('d-none')
                  $('#success_msg').html(response.message)
                  otp= $('#otp').val('');
                  new_password= $('#new_password').val('');
                  confirm_password= $('#confirm_password').val('');

                 // setTimeout(function(){ window.location='<?php base_url() ?>siteadmin/login' }, 5000);

                }else{
                  $('#not_send_msg').removeClass('d-none')
                  $('#success_msg').addClass('d-none')
                  $('#not_send_msg').html(response.message)
                }
              }
            });
          }
      }

  </script>
</body>

</html>
