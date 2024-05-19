
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
                  <?php echo form_open_multipart('', array('id' => 'personal_info_edit')); ?>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Teletalk Number<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="employee_id" id="employee_id" value="<?= $qualification_info[0]->employee_id;?>" readonly>
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
                      <div style="float:right; margin-bottom:5px">
                        <button class="btn-primary" id="add_row" type="button"><i class="fas fa-plus"></i></button>
                      </div>
                      <table class="table table-bordered" id="children_table">
                        <tr>
                            <td>Qualification</td>
                            <td>Qualification Details</td>
                            <td></td>
                        </tr>
                      <?php foreach($qualification_info as $value):?>
                        <input type="hidden" name="id[]" value="<?= $value->id;?>">
                        <tr>
                          <td>
                            <input class="form-control" type="text" name="qualification[]" value="<?= $value->qualification;?>" required>
                          </td>
                          <td>
                            <textarea name="details[]" rows="4" class="form-control"><?= $value->detail;?></textarea>
                          </td>
                          <td></td>                          
                        </tr>
                      <?php endforeach;?>
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
    $(document).ready(function(){
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
    });
</script>

<script type="text/javascript">
  $(document).on("click", "#add_row", function() {
    var $new_row = $('<tr><td><input class="form-control" type="text" name="qualification[]" value="" required></td><td><textarea name="details[]" rows="4" class="form-control"></textarea></td><td><button class="btn-danger" id="remove"><i class="fas fa-backspace"></i></button></td></tr>');
    
    $("#children_table").append($new_row);

    $("#children_table").on('click', '#remove', function() {
      $(this).closest('tr').remove();
    });
  });
</script>
    