 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
                          <label class="col-sm-4 col-form-label">Service Type<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('service_type', getServiceType(), '', 'id="service_type" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Registration No.<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" name="reg_no" id="reg_no" class="form-control" value="<?php echo date('y').date('m').date('h').(rand(100,999));?>" readonly>
                          </div>
                        </div>
                      </div>
                  </div>

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

                    <div class="row">                      
					            
					            <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Designation</label>
                          <div class="col-sm-8">
                            <input type="text" id="designation_name" class="form-control" value="" readonly>
                            <input type="hidden" id="designation" name="designation" value=""readonly>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Salary Scale</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="salary_scale" id="salary_scale" value="" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Mobile<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="mobile" id="mobile" value="" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Email</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" id="email" value="" readonly>
                          </div>
                        </div>
                      </div>




                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Reference Type</label>
                          <div class="col-sm-12">
                            <input type="radio" id="dispatch" name="ref_type" value="1">
                            <label class="col-sm-3 col-form-label">Dispatch Reference</label>
                            <input type="radio" id="enothi" name="ref_type" value="2">
                            <label class="col-sm-3 col-form-label">E-nothi Reference</label>
							<input type="radio" id="erp" name="ref_type" value="3">
                            <label class="col-sm-3 col-form-label">Erp Reference</label>
                          </div>
                        </div>
                      </div>                    
                      
                    </div>


                    <div class="row" id="dispatch_sec" style="display:none">
                      <!-- dispatch -->
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Dispatch Entry No<sup class="error">*</sup></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="dispatch_no" id="dispatch_no" value="">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Dispatch Date<sup class="error">*</sup></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="dispatch_date" id="dispatch_date" value="" readonly>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row" id="enothi_sec" style="display:none">
                      <!-- enothi -->
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">E-nothi Reference<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="enothi_ref" id="enothi_ref" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">E-nothi Reference Date<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="enothi_ref_date" id="enothi_ref_date" value="" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
					<div class="row" id="erp_sec" style="display:none">
                      <!-- enothi -->
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Erp Reference<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="erp_ref" id="erp_ref" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Erp Reference Date<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="erp_ref_date" id="erp_ref_date" value="" readonly>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row" id="document_section">
                      <table class="table table-bordered" id="children_table">
                        <thead>
                            <tr>
                              <th>Document Type</th>
                              <th>Upload (image/pdf within 5Mb)</th>
                              <!-- <th><button class="btn-primary" id="add_row" type="button"><i class="fas fa-plus"></i></button></th> -->
                            </tr>
                        </thead>                        
                      </table>                    

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
        url:"<?php echo base_url() ?>service/service_registration/get_emp/"+emp_id,
        dataType: "JSON",
        success: function(result){
          $('#employee_name').val(result.employee_name);
          $('#designation').val(result.desig_id);
          $('#designation_name').val(result.designation_name);
          $('#salary_scale').val(result.current_scale);
          $('#mobile').val(result.phone);
          $('#email').val(result.email);
        }
      });
    }
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
	 $('#erp_ref_date').datepicker({ 
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
            url: "<?php echo base_url() ?>service/service_registration/get_document_list",
            type: 'POST',
            data: {service_type: service_type},
            dataType: 'json',
            success: function (response) {
              var tab = '';
              for (var i = 0; i < response.length; i++) {
                tab = '<tbody><tr><td>'+response[i].document_name+'</td><td><input type="file" class="form-control file-upload" name="document[]" id="document" value="" accept=".jpg,.jpeg,.png,.pdf" required></td></tr></tbody>';

                $("#children_table").append(tab);
              }

            }
        });
    });
</script>

<script type="text/javascript">
  $('#dispatch').click(function(){
    $('#dispatch_sec').show();
    $('#enothi_sec').hide();
	 $('#erp_sec').hide();
  });
  $('#enothi').click(function(){
    $('#dispatch_sec').hide();
    $('#enothi_sec').show();
	 $('#erp_sec').hide();
  });
  $('#erp').click(function(){
    $('#dispatch_sec').hide();
	$('#enothi_sec').hide();
    $('#erp_sec').show();
  });
</script>