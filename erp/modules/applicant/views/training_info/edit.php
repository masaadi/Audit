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
                  <?php echo form_open_multipart('', array('id' => 'personal_info_edit')); ?>
                  <input type="hidden" class="form-control" name="id" id="id" value="<?= $employee->id;?>">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Teletalk Number<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="employee_id" id="employee_id" value="<?= $employee->employee_id;?>" readonly>
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
                          <label class="col-sm-4 col-form-label">Designation<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" id="designation_name" class="form-control" value="" readonly>
                            <input type="hidden" id="designation_id" name="designation_id" value="" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Office Name</label>
                          <div class="col-sm-8">
                            <input type="text" id="office_name" class="form-control" value="" readonly>
                            <input type="hidden" id="office_id" name="office_id" value="" readonly>
                          </div>
                        </div>
                      </div>
                  </div>                  

                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Training Type<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <select class="form-control" name="training_type" id="training_type">
                              <option value="">--select--</option>
                              <option value="1" <?php if($employee->training_type == '1'){echo "selected";}?> >National</option>
                              <option value="2" <?php if($employee->training_type == '2'){echo "selected";}?> >International</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Training Topics</label>
                          <div class="col-sm-8">
                           <input type="text" name="topics" id="topics" class="form-control" value="<?= $employee->topics;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Training Title<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" name="title" id="title" class="form-control" value="<?= $employee->title;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Place of Training<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" name="place" id="place" class="form-control" value="<?= $employee->place;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Training Institute<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="institute" id="institute" value="<?= $employee->institute;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Address of Institute<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="Address" id="Address" value="<?= $employee->institute_address;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Training Start</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="start_date" id="start_date" value="<?= $employee->start_date;?>" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Training End</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="end_date" id="end_date" value="<?= $employee->end_date;?>" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Total Duration</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="duration" id="duration" value="<?= $employee->duration;?>">
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
    $(document).ready(function(){
      var emp_id = $('#employee_id').val();
      $.ajax({
        type:"Post",
        url:"<?php echo base_url() ?>service/service_registration/get_emp/"+emp_id,
        dataType: "JSON",
        success: function(result){
          $('#employee_name').val(result.employee_name);
          $('#designation_id').val(result.desig_id);
          $('#designation_name').val(result.designation_name);
          $('#office_id').val(result.office_id);
          $('#office_name').val(result.office_name);
        }
      });
    });
</script>

<script type="text/javascript">
  $(function () {
    $('#start_date').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap'
    });

    $('#end_date').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap'
    });
  })
</script>

