 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
<div class="container main-sec py-3 mt-5">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-md-8 mx-auto">
            <div id="pay-invoice" class="card" style="background-color:#f3f3f3">
                <div class="card-body">
                    
                    <hr>
                    <?php echo form_open_multipart("siteadmin/registered", array('id' => 'personal_info_add')); ?>
                    <?php 
                        if(empty($this->session->flashdata('message'))){
                    ?>
                    <input type="hidden" name="otp_no" value="<?= $otp_no;?>" >
                    <input type="hidden" name="user_type" value="<?= $user_type;?>" >
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Service Type <span class="text-danger">*</span></label>
                                    <?php echo form_dropdown('service_type', getServiceType(), '', 'id="service_type" class="form-control form-control-sm"'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Registration Number <span class="text-danger">*</span></label>
                                    <input type="text" name="reg_no" id="reg_no" class="form-control form-control-sm" value="<?php echo date('y').date('m').date('h').(rand(100,999));?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Company ID </label>
                                    <input type="text" class="form-control form-control-sm" name="employee_id" id="employee_id" value="<?= $employee_id;?>" onblur="get_emp()" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Company Name </label>
                                    <input type="text" class="form-control form-control-sm" name="employee_name" id="employee_name" value="" readonly>
                                </div>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Mobile <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="mobile" id="mobile" value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="email" id="email" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                  <label class="col-sm-2 col-form-label">Reference Type</label>
                                  <div class="col-sm-10">
                                    <input type="radio" id="dispatch" name="ref_type" value="1">
                                    <label class="col-sm-4 col-form-label">Dispatch Reference</label>
                                    <input type="radio" id="enothi" name="ref_type" value="2">
                                    <label class="col-sm-4 col-form-label">E-nothi Reference</label>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="enothi_sec" style="display:none">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>E-nothi Reference No <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="enothi_ref" id="enothi_ref" value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>E-nothi Reference Date <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="enothi_ref_date" id="enothi_ref_date" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="dispatch_sec" style="display:none">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Dispatch No. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="dispatch_no" id="dispatch_no" value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Dispatch Date <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="dispatch_date" id="dispatch_date" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="document_section">
                      <table class="table table-bordered" id="children_table">
                        <thead>
                            <tr>
                              <th>Document Type</th>
                              <th>Upload</th>
                              <!-- <th><button class="btn-primary" id="add_row" type="button"><i class="fas fa-plus"></i></button></th> -->
                            </tr>
                        </thead>                        
                      </table>

                      

                    </div>
                        
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <button id="submit" type="submit" class="form-submit btn btn-secondary">
                                    Register
                                </button>
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


<script type="text/javascript">
    $(function() {
        $('body').on('click', '#submit', function() {
            $('#personal_info_add').validate({
                rules: {
                    service_type: {
                        required: true,

                    },
                    reg_no: {
                        required: true,
                    },
                    employee_id: {
                        required: true,
                    },
                    employee_name: {
                        required: true,
                    },

                    mobile: {
                        required: true,

                    },
                    email: {
                        required: true,
                    },

                    dispatch_no: {
                        required: true,

                    },
                    dispatch_date: {
                        required: true,

                    },
                    reg_date: {
                        required: true,
                    },
                    document: {
                        required: true,
                    }, 
                    enothi_ref: {
                        required: true,
                    },                                            

                },
                messages: {
                    service_type: {
                        required: 'This field id required',

                    },
                    reg_no: {
                        required: 'This field id required',
                    },
                    employee_id: {
                        required: 'This field id required',
                    },
                    employee_name: {
                        required: 'This field id required',
                    },

                    mobile: {
                        required: 'This field id required',

                    },
                    email: {
                        required: 'This field id required',
                    },

                    dispatch_no: {
                        required: 'This field id required',

                    },
                    dispatch_date: {
                        required: 'This field id required',

                    },
                    reg_date: {
                        required: 'This field id required',
                    },
                    document: {
                        required: 'This field id required',
                    },
                    enothi_ref: {
                        required: 'This field id required',
                    }, 
                },
            });

        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function(){
        var emp_id = $('#employee_id').val();
          $.ajax({
            type:"Post",
            url:"<?php echo base_url() ?>siteadmin/get_company/"+emp_id,
            dataType: "JSON",
            success: function(result){
              $('#employee_name').val(result.company_name);
              $('#mobile').val(result.phone);
              $('#email').val(result.email);
            }
          });
    });
</script>

<script type="text/javascript">
  $(function () {
    
    $('#dispatch_date').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap'
    });
    $('#enothi_ref_date').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap'
    });
  })
</script>

<script type="text/javascript">
  $(document).on('change', '#service_type', function () {
        var service_type = $(this).val();
        $("#children_table > tbody").empty();
        $.ajax({
            url: "<?php echo base_url() ?>siteadmin/get_document_list",
            type: 'POST',
            data: {service_type: service_type},
            dataType: 'json',
            success: function (response) {
              if(response != ''){
                var tab = '';
                  for (var i = 0; i < response.length; i++) {
                    tab = '<tbody><tr><td>'+response[i].document_name+'</td><td><input type="file" class="form-control file-upload" name="document[]" id="document" value="" required></td></tr></tbody>';

                    $("#children_table").append(tab);
                  }
              }

            }
        });
    });
</script>

<script type="text/javascript">
  $('#dispatch').click(function(){
    $('#dispatch_sec').show();
    $('#enothi_sec').hide();
  });
  $('#enothi').click(function(){
    $('#dispatch_sec').hide();
    $('#enothi_sec').show();
  });
</script>