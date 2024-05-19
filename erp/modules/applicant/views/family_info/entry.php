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
                  <?php echo form_open_multipart('', array('id' => 'family_info_add')); ?>
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


                  <div style="text-align:center;margin:10px;background:#f3f3f3;"><h4 style="margin-bottom: 25px;padding-bottom: 5px;padding-top: 5px;">Spouse Information</h4></div>
                  

                    <div class="row">
                      
					            <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Spouse Name<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="spouse_name" id="spouse_name" value="">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Occupation</label>
                          <div class="col-sm-8">
                           <input type="text" class="form-control" name="occupation" id="occupation" value="">
                          </div>
                        </div>
                      </div>
					            <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Organization<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="organization" id="organization" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Designation<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="designation" id="designation" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Educational Qualification<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="qualification" id="qualification" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Address of Working Place<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="working_place" id="working_place" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Gender<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <select class="form-control" id="spouse_gender" name="spouse_gender">
                              <option value="">--select--</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">District</label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('district', districtOption(), '', 'id="district" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Contact No</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="contact" id="contact" value="">
                          </div>
                        </div>
                      </div>
                      
                      </div>

                      <div style="text-align:center;margin:10px;background:#f3f3f3;"><h4 style="margin-bottom: 25px;padding-bottom: 5px;padding-top: 5px;">Children Information</h4></div>

                    <div class="row">
                      <table class="table table-bordered" id="children_table">
                        <tr>
                            <td>Name of Children</td>
                            <td>Gender</td>
                            <td>Date of Birth</td>
                            <th></th>
                        </tr>
                        <tr>
                          <td><input class="form-control" type="text" name="child_name[]"></td>
                          <td>
                            <select class="form-control" name="child_gender[]">
                              <option value="">--select--</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </td>
                          <td><input class="form-control Ecd" type="text" name="dob[]" readonly></td>
                          <td>
                            <button class="btn-primary" id="add_row" type="button"><i class="fas fa-plus"></i></button>
                          </td>
                        </tr>
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
        url:"<?php echo base_url() ?>hr/job_info/get_emp/"+emp_id,
        dataType: "JSON",
        success: function(result){
          $('#employee_name').val(result.employee_name);
        }
      });
    }
</script>

<script type="text/javascript">
  $(function () {
    $('.Ecd').datepicker({ 
      format: 'yyyy-mm-dd',
      uiLibrary: 'bootstrap'
    });   
  })
</script>

<script type="text/javascript">
  $(document).on("click", "#add_row", function() {
  var $new_row = $("<tr><td><input class='form-control' type='text' name='child_name[]'><td><select class='form-control' id='gender' name='child_gender[]'><option value=''>--select--</option><option value='Male'>Male</option><option value='Female'>Female</option></select></td></td><td><input type='text' class='form-control Ecd' name='dob[]' readonly /></td><td><button class='btn-danger' id='remove'><i class='fas fa-backspace'></i></button></td></tr>");

    $new_row.find('.Ecd').datepicker({
      format: 'yyyy-mm-dd',
      uiLibrary: 'bootstrap'
    });
    $("#children_table").append($new_row);

    $("#children_table").on('click', '#remove', function() {
        $(this).closest('tr').remove();
    });
});
</script>


		
		