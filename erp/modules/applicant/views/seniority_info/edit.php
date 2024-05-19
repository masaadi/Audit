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
                  <?php echo form_open_multipart('', array('id' => 'personal_info_edit')); ?>
                  <input type="hidden" name="id" value="<?php echo $employee->id;?>">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Teletalk Number<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="employee_id" id="employee_id" value="<?php echo $employee->employee_id;?>" readonly>
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
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Office Name</label>
                          <div class="col-sm-8">
                           <input type="text" class="form-control" name="office" id="office" value="" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Designation<sup class="error">*</sup></label>
                          <div class="col-sm-8 designation">
                            <input type="text" class="form-control" name="designation" id="designation" value="" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Position<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="number" name="position" id="position" value="<?php echo $employee->position;?>" class="form-control">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label"></label>
                          <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" id="edit_submit">
                            Save</button>
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
    $(document).ready(function(){
      var emp_id = $('#employee_id').val();
      $.ajax({
        type:"Post",
        url:"<?php echo base_url() ?>hr/seniority_info/get_emp/"+emp_id,
        dataType: "JSON",
        success: function(result){
          if(result.status == "empty"){
            $('#employee_name').val('');
            $('#office').val('');
            $('#designation').val('');
            $('#employee_name').attr("placeholder", "not found any employee");
          }else{
            $('#employee_name').val(result.employee_name);
            $('#office').val(result.office_name);
            $('#designation').val(result.designation_name);
          }

        }
      });
    });
</script>
    
    