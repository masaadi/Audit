<style>
    .form-submit {
        width: 100%;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
        padding: 11px 0px;
        box-sizing: border-box;
        font-size: 13px;
        font-weight: 600;
        color: #686161;
        text-transform: uppercase;
        border: none;
        background-image: -moz-linear-gradient(to left, #74ebd5, #9face6);
        background-image: -ms-linear-gradient(to left, #74ebd5, #9face6);
        background-image: -o-linear-gradient(to left, #74ebd5, #9face6);
        background-image: -webkit-linear-gradient(to left, #74ebd5, #9face6);
        background-image: linear-gradient(to left, #74ebd5, #9face6);
        cursor: pointer;
    }
    .message_error_input p{
        color:red;
        font-size: 14px;
    }
    .error {
      color: red;
      font-size: 14px;
    }
    #agreeterm-error{   
        position: absolute;
        margin-top: 22px;
        margin-left: -15px;
    }

    .demo_wrap {
    position: relative;
    overflow: hidden;
    border: 1px dashed green;
    }
    .demo_wrap .main-sec {
        position: relative;
        z-index: 2;
    }
    .demo_wrap .back-img {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: auto;
        opacity: 0.6;
    }

</style>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #ffffff;">
    <div class="container">
      <img src="<?php echo base_url();?>public/dashboard/images/bsic.png" alt="" style="width: 50px;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
         
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>" style="color:#ec2e3d"><?= $this->lang->line('back_to_home') ?></a>
          </li>
        </ul>
      </div>
    </div>
</nav>

<br>
<section class="bg-secondary demo_wrap" >
<div class="container main-sec py-3 mt-5" style="height:470px">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-md-8 mx-auto">
            <div id="pay-invoice" class="card" style="background-color:#f3f3f3">
                <div class="card-body">
                    
                    <hr>
                    <?php echo form_open("siteadmin/registration_form", array('id' => 'form_register')); ?>
                    <?php 
                        if(empty($this->session->flashdata('message'))){
                    ?>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Select User Type <span class="text-danger">*</span></label>
                                  <div class="col-sm-10">
                                    <input type="radio" id="employee" name="user_type" value="1">
                                    <label for="employee" class="col-sm-4 col-form-label">Teletalk Employee</label>
                                    <input type="radio" id="company" name="user_type" value="2">
                                    <label for="company" class="col-sm-4 col-form-label">Company</label>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div style="display:none" id="otp_sec">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label id="user_label">Teletalk Employee Number <span class="text-danger">*</span></label>
                                        <input type="text" name="employee_id" id="employee_id" class="form-control form-control-sm" value="">
                                        <span id="message1" style="font-size:12px; display:none"></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success" onclick="get_otp()" style="margin-top:28px">Get Password</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Password  <span class="text-danger">*</span></label>
                                        <input type="text" name="otp_no" id="otp_no" class="form-control form-control-sm" value="" onkeyup="verify_otp()">
                                        <span id="message" style="font-size:12px; display:none"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <button id="submit" type="submit" class="form-submit btn btn-secondary" disabled>Submit</button>
                            </div>
                        </div>
                        <?php 
                }else{
                    ?>
                    <div class="signup-content">
                        <?php  echo $this->session->flashdata('message');
                        ?>
                    </div>

                    <?php 
                }
                ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script>
    $(function () {
        $('body').on('click', '#submit', function () {
            
                $('#form_register').validate({
                    rules: {
                        employee_id: {
                            required: true,
                        },
                        otp_no: {
                            required: true,
                        },                        
                    },
                    messages: {
                        full_name: {
                            required: 'Teletalk Number is requied.',
                        },
                        otp_no: {
                            required: 'OTP is requied.',
                        },
                    }
                });
            
        });
    });
    </script>

    <script type="text/javascript">
        function get_otp(){
            var employee_id = $('#employee_id').val();
            var user_type  = $("input[type='radio'][name='user_type']:checked").val();

            $.ajax({
                type:"Post",
                url:"<?php echo base_url() ?>siteadmin/get_otp/"+employee_id+'/'+user_type,
                //dataType: "JSON",
                success: function(result){
                    
                  if (result == '0') {
                    $('#message1').show().text("Invalid Teletalk Number").css("color","red");
                    $('#employee_id').attr('readonly', false);
                  }else{
                    $('#message1').hide();
                    $('#employee_id').attr('readonly', true);
                  }
                }
            });
        }


        function verify_otp(){
            var employee_id = $('#employee_id').val();
            var otp_no = $('#otp_no').val();          

            if(otp_no.length == '6'){
                $.ajax({
                    type:"Post",
                    url:"<?php echo base_url() ?>siteadmin/otp_verify/"+employee_id+'/'+otp_no,
                    //dataType: "JSON",
                    success: function(result){
                      if(result == '1'){
                        $('#message').show().text("Password is matched").css("color","green");
                        $('#submit').attr("disabled", false);
                      }else if((result == '0')){
                        $('#message').show().text("Password is not matched").css("color","red");
                        $('#submit').attr("disabled", true);
                      }else{
                        $('#submit').attr("disabled", true);
                      }
                    }
                });
            }            
        }
    </script>

<script type="text/javascript">
  $('#company').click(function(){
    $('#user_label').text('Company ID/Mobile No.');
    $('#otp_sec').show();
  });
  $('#employee').click(function(){
    $('#user_label').text('Teletalk Employee Number');
    $('#otp_sec').show();
  });
</script>