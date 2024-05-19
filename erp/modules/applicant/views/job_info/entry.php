 <?php
$remarks = array(
  'name'  => 'responsibility',
  'id'    => 'responsibility',
  'class' => 'form-control',
  'placeholder'=> "",
  'rows'=> "4",
  'value' =>  "",
);
?>
 <style type="text/css">
  .file-upload{
    padding: 4px 0px 0px 4px;
   }
 </style>
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
                <div class="card-body p-5">
                  <?php echo form_open_multipart('', array('id' => 'personal_info_add')); ?>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Teletalk Number<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="employee_id" id="employee_id" value="" onblur="get_emp()">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Employee Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="employee_name" id="employee_name" value="" readonly>
                          </div>
                        </div>
                      </div>
                  </div>
                  


                  <div style="text-align:center;margin:10px;background:#f3f3f3;"><h4 style="margin-bottom: 25px;padding-bottom: 5px;padding-top: 5px;">Joining Job Information</h4></div>
                  

                    <div class="row">
                      
					            <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Joining Date<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="joining_date" id="joining_date" value="" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Office Name</label>
                          <div class="col-sm-8">
                           <?php echo form_dropdown('joining_office', office(), '', 'id="joining_office" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>
					            <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Designation<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('joining_desig', getOptionDesignation(), '', 'id="joining_desig" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Salary Grade<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="joining_grade" id="joining_grade" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Salary Scale<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="joining_scale" id="joining_scale" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Basic Salary<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="joining_basic" id="joining_basic" value="">
                          </div>
                        </div>
                      </div>
                      
                      </div>

                      <div style="text-align:center;margin:10px;background:#f3f3f3;"><h4 style="margin-bottom: 25px;padding-bottom: 5px;padding-top: 5px;">Current Job Information</h4></div>

                      <div class="row">

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Joining Date</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="current_joining" id="current_joining" value="" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Office Name</label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('current_office', office(), '', 'id="current_office" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Section Name</label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('section', section(), '', 'id="section" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Designation<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('cuurent_desig', getOptionDesignation(), '', 'id="cuurent_desig" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Posting Status</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="posting_status" id="posting_status">
                              <option value="">---select---</option>
                              <option value="Direct">Direct</option>
                              <option value="Promotional">Promotional</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Salary Grade</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="current_grade" id="current_grade" value="">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Salary Scale</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="current_scale" id="current_scale" value="">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Basic Salary</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="current_basic" id="current_basic" value="">
                          </div>
                        </div>
                      </div>                 

                      </div>

                      <div style="text-align:center;margin:10px;background:#f3f3f3;"><h4 style="margin-bottom: 25px;padding-bottom: 5px;padding-top: 5px;">Others Information</h4></div>

                      <div class="row">

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Employee Type</label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('emp_type', emp_type(), '', 'id="emp_type" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Employee Class</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="emp_class" id="emp_class">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Quota</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="quota" id="quota">
                              <option value="">---select---</option>
                              <option value="1">Yes</option>
                              <option value="2">No</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6" style="display:none" id="quota_info_sec">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Quota Information</label>
                          <div class="col-sm-8">
                            <select class="form-control" id="qouta_info" name="qouta_info">
                              <option value="">---select---</option>
                              <option value="1">Freedom Fighter</option>
                              <option value="2">Physically challenged</option>
                              <option value="3">Ethnic</option>
                              <option value="4">Women</option>
                              <option value="5">Others</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6" style="display:none" id="quota_type_sec">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Quota Type</label>
                          <div class="col-sm-8">
                            <select class="form-control" id="qouta_type" name="qouta_type">
                              <option value="">---select---</option>
                              <option value="1">Freedom Fighter</option>
                              <option value="2">Freedom Fighter Son/Daughter </option>
                              <option value="3">Freedom Fighter Grandson/Granddaughter </option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6" style="display:none" id="district_sec">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">District</label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('district', districtOption(), '', 'id="district" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">PRL Date</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="prl_date" id="prl_date" value="" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Login ID</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="login_id" id="login_id" value="" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Password</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" id="password" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Signature</label>
                          <div class="col-sm-8">
                            <input type="file" class="form-control file-upload" name="signature" id="signature" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Responsibility Details</label>
                          <div class="col-sm-8">
                            <?php echo form_textarea($remarks); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-12">
								              <button type="submit" class="btn btn-primary" id="submit">
                              <?= $this->lang->line('save')?></button>
                            </div>
                          </div>
                        </div>
                    </div>                   
                  </form>                

                </div>
              </div>
            </div>
          </div>          
        </div>

<script type="text/javascript">
    function get_emp(){
      var emp_id = $('#employee_id').val();
      $.ajax({
        type:"Post",
        url:"<?php echo base_url() ?>hr/job_info/get_emp/"+emp_id,
        dataType: "JSON",
        success: function(result){
          $('#employee_name').val(result.employee_name);
          $('#login_id').val(emp_id);
        }
      });
    }
</script>

<script type="text/javascript">
  $(function () {
    $('#joining_date').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap'
    });

    $('#current_joining').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap'
    });

    $('#prl_date').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap'
    });
  })
</script>

<script type="text/javascript">
  $('#quota').change(function(){
    var quota = $('#quota').val();
    if(quota == '1'){
      $('#quota_info_sec').show();
    }else{
      $('#quota_info_sec').hide();
    }
  });

  $('#qouta_info').change(function(){
    var qouta_info = $('#qouta_info').val();
    if(qouta_info == '1'){
      $('#quota_type_sec').show();
      $('#district_sec').hide();
    }else{
      $('#quota_type_sec').hide();
      $('#district_sec').show();
    }
  });
</script>
		
		