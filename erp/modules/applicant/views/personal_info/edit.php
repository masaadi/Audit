 <?php
$pre_address = array(
  'name'  => 'pre_address',
  'id'    => 'pre_address',
  'class' => 'form-control',
  'placeholder'=> "",
  'rows'=> "4",
  'value' =>  $employee->pre_address,
);

$per_address = array(
  'name'  => 'per_address',
  'id'    => 'per_address',
  'class' => 'form-control',
  'placeholder'=> "",
  'rows'=> "4",
  'value' =>  $employee->per_address,
);
$remarks = array(
  'name'  => 'remarks',
  'id'    => 'remarks',
  'class' => 'form-control',
  'placeholder'=> "",
  'rows'=> "4",
  'value' =>  $employee->remarks,
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
                  <div style="text-align:center;margin:10px;background:#f3f3f3;"><h4 style="margin-bottom: 25px;padding-bottom: 5px;padding-top: 5px;">Employee Information</h4></div>
                  <?php echo form_open_multipart('', array('id' => 'personal_info_edit')); ?>
                  <input type="hidden" name="id" value="<?= $employee->id;?>">
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Teletalk Number<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="employee_id" id="employee_id" value="<?= $employee->employee_id;?>">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">CPF No</label>
                          <div class="col-sm-8">
                           <input type="text" class="form-control" name="cpf_no" id="cpf_no" value="<?= $employee->cpf_no;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Employee Name<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="employee_name" id="employee_name" value="<?= $employee->employee_name;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Attach Photo<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="file" class="form-control file-upload" name="emp_photo" id="emp_photo" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Father’s Name<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="f_name" id="f_name" value="<?= $employee->f_name;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Mother's Name<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="m_name" id="m_name" value="<?= $employee->m_name;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Date Of Birth<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="dob" id="dob" value="<?= $employee->dob;?>" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Blood Group</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="blood_group" id="blood_group">
                              <option value="">---select---</option>
                              <option value="A+" <?php if($employee->blood_group == 'A+'){echo "selected";}?> >A+</option>
                              <option value="A-" <?php if($employee->blood_group == 'A-'){echo "selected";}?> >A-</option>
                              <option value="B+" <?php if($employee->blood_group == 'B+'){echo "selected";}?> >B+</option>
                              <option value="B-" <?php if($employee->blood_group == 'B-'){echo "selected";}?> >B-</option>
                              <option value="O+" <?php if($employee->blood_group == 'O+'){echo "selected";}?> >O+</option>
                              <option value="O-" <?php if($employee->blood_group == 'O-'){echo "selected";}?> >O-</option>
                              <option value="AB+" <?php if($employee->blood_group == 'AB+'){echo "selected";}?> >AB+</option>
                              <option value="AB-" <?php if($employee->blood_group == 'AB-'){echo "selected";}?> >AB-</option>                          
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">National ID<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="nid" id="nid" value="<?= $employee->nid;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Attach National ID<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="file" class="form-control file-upload" name="nid_photo" id="nid_photo" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Gender<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <select class="form-control" name="gender" id="gender">
                              <option value="">---select---</option>
                              <option value="male" <?php if($employee->gender == 'male'){echo "selected";}?> >Male</option>
                              <option value="female" <?php if($employee->gender == 'female'){echo "selected";}?> >Female</option>
                              <option value="others" <?php if($employee->gender == 'others'){echo "selected";}?> >Others</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Marital Status<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <select class="form-control" name="marital_status" id="marital_status">
                              <option value="">---select---</option>
                              <option value="single" <?php if($employee->marital_status == 'single'){echo "selected";}?>>Single</option>
                              <option value="married" <?php if($employee->marital_status == 'married'){echo "selected";}?>>Married</option>
                              <option value="unmarried" <?php if($employee->marital_status == 'unmarried'){echo "selected";}?>>Unmarried</option>
                              <option value="devorced" <?php if($employee->marital_status == 'devorced'){echo "selected";}?>>Devorced</option>
                              <option value="widow" <?php if($employee->marital_status == 'widow'){echo "selected";}?>>Widow</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Passport No</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="passport" id="passport" value="<?= $employee->passport;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Driving Licence</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="driving" id="driving" value="<?= $employee->driving;?>">
                          </div>
                        </div>
                      </div>
                      </div>

                      <div style="text-align:center;margin:10px;background:#f3f3f3;"><h4 style="margin-bottom: 25px;padding-bottom: 5px;padding-top: 5px;">Present Address</h4></div>

                      <div class="row">

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Division</label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('pre_division', divisionOption(), $employee->pre_division, 'id="pre_division" class="form-control pre_division"'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">District</label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('pre_district', districtOption(), $employee->pre_district, 'id="pre_district" class="form-control pre_district"'); ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Upazila</label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('pre_upazila', upazilaOption(), $employee->pre_upazila, 'id="pre_upazila" class="form-control pre_upazila"'); ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Detail Address</label>
                          <div class="col-sm-8">
                            <?php echo form_textarea($pre_address); ?>
                          </div>
                        </div>
                      </div>                     

                      </div>

                      <div style="text-align:center;margin:10px;background:#f3f3f3;"><h4 style="margin-bottom: 25px;padding-bottom: 5px;padding-top: 5px;">Permanent Address</h4></div>

                      <div class="row">

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Division</label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('per_division', divisionOption(), $employee->per_division, 'id="per_division" class="form-control per_division"'); ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">District</label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('per_district', districtOption(), $employee->per_district, 'id="per_district" class="form-control per_district"'); ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Upazila</label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('per_upazila', upazilaOption(), $employee->per_upazila, 'id="per_upazila" class="form-control per_upazila"'); ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Detail Address</label>
                          <div class="col-sm-8">
                            <?php echo form_textarea($per_address); ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">E-Mail</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" id="email" value="<?= $employee->email;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Phone</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="phone" id="phone" value="<?= $employee->phone;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Emergency Contact Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="emergency_name" id="emergency_name" value="<?= $employee->emergency_name;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Relation</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="relation" id="relation" value="<?= $employee->relation;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Emergency Contact Phone</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="emergency_phone" id="emergency_phone" value="<?= $employee->emergency_phone;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Remarks</label>
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
                              <button type="submit" class="btn btn-primary" id="edit_submit">Update</button>
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
    $(document).on('change', '.pre_division', function () {
        var id = $(this).val();
        $.ajax({
            url: "<?php echo base_url() ?>common/getDistrict",
            type: 'POST',
            data: {id: id},
            success: function (response) {
                $('.pre_district').html(response);
            }
        });
    });

    $(document).on('change', '.pre_district', function () {
        var id = $(this).val();
        $.ajax({
            url: "<?php echo base_url() ?>common/getThana",
            type: 'POST',
            data: {id: id},
            success: function (response) {
                $('.pre_upazila').html(response);
            }
        });
    }); 
</script>

<script type="text/javascript">
    $(document).on('change', '.per_division', function () {
        var id = $(this).val();
        $.ajax({
            url: "<?php echo base_url() ?>common/getDistrict",
            type: 'POST',
            data: {id: id},
            success: function (response) {
                $('.per_district').html(response);
            }
        });
    });

    $(document).on('change', '.per_district', function () {
        var id = $(this).val();
        $.ajax({
            url: "<?php echo base_url() ?>common/getThana",
            type: 'POST',
            data: {id: id},
            success: function (response) {
                $('.per_upazila').html(response);
            }
        });
    }); 
</script>

<script type="text/javascript">
  $(function () {
    $('#dob').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap4'
    });
  })
</script>
    
    