<?php
$address = array(
  'name'  => 'address',
  'id'    => 'address',
  'class' => 'form-control',
  'placeholder'=> "",
  'rows'=> "4",
  'value' =>  "",
);
  $language = $this->session->userdata('lang_file');
?>

 <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
              <h2 class="add_button">
                      <button onclick="javascript:location.reload(true)" type="button"
                      class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
                      data-backdrop="static"
                      data-keyboard="false"><i class="fa fa-chevron-left" style='font-size:15px;color:green' aria-hidden="true"></i> <?= $this->lang->line('back')?></button>
                    </h2> 
                <div class="card-body p-12">
                  
                  <?php echo form_open_multipart('', array('id' => 'profile_add')); ?>
                    <p class="card-description">
                      
                    </p>
                    <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="">Full Name<sup class="error">*</sup></label>
                              <input type="text" class="form-control" name="full_name" id="full_name" value="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="">Teletalk Number<sup class="error">*</sup></label>
                              <input type="text" class="form-control" name="employee_id" id="employee_id" value="">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="">Office<sup class="error">*</sup></label>
                              <?php echo form_dropdown("office_id",office(),'',"id='office_id' class='form-control'"); ?>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class=""><?php echo $this->lang->line('designation'); ?><sup class="error">*</sup></label>
                              <?php echo form_dropdown("designation_id",getOptionDesignation(),'',"id='designation_id' class='form-control'"); ?>
                            </div>
                          </div>
                         
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="">Phone<sup class="error">*</sup></label>
                              <input type="text" class="form-control" name="phone" id="phone" value="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="">E-mail<sup class="error">*</sup></label>
                              <input type="email" class="form-control" name="email" id="email" value="">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="">Status<sup class="error">*</sup></label>
                              <select class="form-control" id="status" name="status">
                                <option value="1">Acitve</option>
                                <option value="0">Inactive</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="">Photo</label>
                              <input type="file" class="form-control" name="pro_image" id="pro_image" value="" style="padding-top: 5px; padding-left: 5px;">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="">Username<sup class="error">*</sup></label>
                              <input type="text" class="form-control" name="username" id="username" value="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="">Password<sup class="error">*</sup></label>
                              <input type="password" class="form-control" name="password" id="password" value="">
                            </div>
                          </div>
                          
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="">Address</label>
                              <?php echo form_textarea($address); ?>
                            </div>
                          </div>

                          <div class="col-md-12" style="text-align:center"> 
                            <button type="submit" class="btn btn-primary" id="submit"><?php echo $this->lang->line('save'); ?></button>
                          </div>
                          

                        </div>
                      </div><!-- end col-md-6-->
                    </div> <!-- end row -->
                   
                  </form>

                  

                </div>
              </div>
            </div>
          </div>          
        </div>		
<script>

      var s2 = $(".business_type").select2({
        placeholder: "--- Select ---",
        tags: true
    });
    
    $(document).on('change', '#office_category_id', function () {

      var id = $(this).val();

      $.ajax({
          url: "<?php echo base_url() ?>common/getOfficeByCat",
          type: 'POST',
          data: {id: id},
          success: function (response) {
              $('#office_id').html(response);
          }
      });
    });

    $('#birth_date').datepicker({ 
        format: 'yyyy-mm-dd' ,
        uiLibrary: 'bootstrap4'
        });
    
    </script>