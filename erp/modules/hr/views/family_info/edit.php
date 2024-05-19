<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

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
                  <?php echo form_open_multipart('', array('id' => 'family_info_edit')); ?>
                  <input type="hidden" name="spouse_id" value="<?= $spouse_info->id;?>">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Teletalk Number<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="employee_id" id="employee_id" value="<?= $spouse_info->employee_id;?>" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Employee Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="employee_name" id="employee_name" value="<?= $spouse_info->employee_name;?>" readonly>
                          </div>
                        </div>
                      </div>
                  </div>                


                  <div style="text-align:center;margin:10px;background:#f3f3f3;"><h4 style="margin-bottom: 25px;padding-bottom: 5px;padding-top: 5px;">Spouse Information</h4></div>
                  

                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Spouse Name<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="spouse_name" id="spouse_name" value="<?= $spouse_info->spouse_name;?>">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Occupation</label>
                          <div class="col-sm-8">
                           <input type="text" class="form-control" name="occupation" id="occupation" value="<?= $spouse_info->occupation;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Organization<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="organization" id="organization" value="<?= $spouse_info->organization;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Designation<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="designation" id="designation" value="<?= $spouse_info->designation;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Educational Qualification<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="qualification" id="qualification" value="<?= $spouse_info->qualification;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Address of Working Place<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="working_place" id="working_place" value="<?= $spouse_info->work_address;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Gender<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <select class="form-control" id="spouse_gender" name="spouse_gender">
                              <option value="">--select--</option>
                              <option value="Male" <?php if($spouse_info->gender == 'Male'){echo "selected";};?> >Male</option>
                              <option value="Female" <?php if($spouse_info->gender == 'Female'){echo "selected";};?> >Female</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">District</label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('district', districtOption(), $spouse_info->district, 'id="district" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Contact No</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="contact" id="contact" value="<?= $spouse_info->contact;?>">
                          </div>
                        </div>
                      </div>
                      
                      </div>

                      <div style="text-align:center;margin:10px;background:#f3f3f3;"><h4 style="margin-bottom: 25px;padding-bottom: 5px;padding-top: 5px;">Children Information</h4></div>

                    <div class="row">
                      <table class="table table-bordered" id="children_table">
                        <tr>
                            <td>Serial</td>
                            <td>Name of Children</td>
                            <td>Gender</td>
                            <td>Date of Birth</td>
                        </tr>
                        <?php $s = 1; foreach($child_info as $c_info):?>
                        <tr>
                          <td><?php echo $s;?></td>
                          <input type="hidden" name="child_id[]" value="<?php echo $c_info->id;?>">
                          <td><input class="form-control" type="text" name="child_name[]" value="<?php echo $c_info->child_name;?>"></td>
                          <td>
                            <select class="form-control" name="child_gender[]">
                              <option value="">--select--</option>
                              <option value="Male" <?php if($c_info->gender == 'Male'){echo "selected";};?> >Male</option>
                              <option value="Female" <?php if($c_info->gender == 'Female'){echo "selected";};?> >Female</option>
                            </select>
                          </td>
                          <td><input class="form-control" type="text" name="dob[]" id="dob_<?php echo $s;?>" value="<?php echo $c_info->date_of_birth;?>" readonly></td>
                          
                        </tr>
                      <?php $s++; endforeach;?>
                      </table>

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
  $(function () {
    $('#dob_1').datepicker({ 
      format: 'yyyy-mm-dd',
      uiLibrary: 'bootstrap'
    });
    $('#dob_2').datepicker({ 
      format: 'yyyy-mm-dd',
      uiLibrary: 'bootstrap'
    }); 
    $('#dob_3').datepicker({ 
      format: 'yyyy-mm-dd',
      uiLibrary: 'bootstrap'
    });  
  })
</script>


    
    