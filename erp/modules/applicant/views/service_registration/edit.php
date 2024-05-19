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
                  <?php echo form_open_multipart('', array('id' => 'personal_info_edit')); ?>
                  <input type="hidden" name="id" value="<?= $service_register->id?>">

                  <div class="row">                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Service Type<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('service_type', getServiceType(), $service_register->type_id, 'id="service_type" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Registration Number<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" name="reg_no" id="reg_no" class="form-control" value="<?= $service_register->registration_id;?>" readonly>
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Teletalk ID<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="employee_id" id="employee_id" value="<?= $service_register->employee_id;?>" readonly>
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
                            <input type="text" class="form-control" name="mobile" id="mobile" value="<?= $service_register->mobile;?>">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Email<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" id="email" value="<?= $service_register->email;?>">
                          </div>
                        </div>
                      </div>
 
                      
                    </div>
                    <?php if($service_register->dispatch_no != ''):?>
                    <div class="row" id="dispatch_sec">
                      <!-- dispatch -->
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Dispatch Entry No<sup class="error">*</sup></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="dispatch_no" id="dispatch_no" value="<?php if(isset($service_register->dispatch_no)){echo $service_register->dispatch_no;}?>">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Dispatch Date<sup class="error">*</sup></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="dispatch_date" id="dispatch_date" value="<?php if(isset($service_register->dispatch_date)){echo $service_register->dispatch_date;}?>" readonly>
                            </div>
                          </div>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php if($service_register->enothi_ref != ''):?>
                    <div class="row" id="enothi_sec">
                      <!-- enothi -->
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">E-nothi Reference<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="enothi_ref" id="enothi_ref" value="<?php if(isset($service_register->enothi_ref)){echo $service_register->enothi_ref;}?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">E-nothi Reference Date<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="enothi_ref_date" id="enothi_ref_date" value="<?php if(isset($service_register->enothi_ref_date)){echo $service_register->enothi_ref_date;}?>" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endif;?>
                    <div class="row">
                      <table class="table table-bordered" id="children_table">
                        <tr>
                            <td>Attach Document <sup class="error">*</sup></td>
                            <th></th>
                        </tr>
                        <?php $documents = $this->db->where('status',1)->where('service_regi_id',$service_register->id)->get('service_regi_document')->result();
                        $a = 1;
                        foreach($documents as $document):
                        ?>
                        <tr id="uploaded_row_<?= $a;?>">
                          <td>
                            <a href="<?= base_url()?><?= $document->document;?>" target="blank">download here</a>
                          </td>
                          
                          <td>
                            <button class="btn-danger" id="delete_row" onclick="delete_doc('<?= $document->id?>','<?= $service_register->id?>','<?= $a?>')"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                      <?php $a++; endforeach;?>
                      <tr>
                          <td>
                            <input type="file" class="form-control file-upload" name="document[]" id="document" value="">
                          </td>
                          
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
        url:"<?php echo base_url() ?>applicant/service_registration/get_emp/"+emp_id,
        dataType: "JSON",
        success: function(result){
          $('#employee_name').val(result.employee_name);
          $('#designation').val(result.desig_id);
          $('#designation_name').val(result.designation_name);
          $('#salary_scale').val(result.current_scale);
        }
      });
    })
</script>

<script type="text/javascript">
  $(function () {
    $('#dispatch_date').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap'
    });
  })
</script>

<script type="text/javascript">
  var i = 2;
  $(document).on("click", "#add_row", function() {
    
    var $new_row = $('<tr><td><input type="file" class="form-control file-upload" name="document[]" value=""></td><td><button class="btn-danger" id="remove"><i class="fas fa-backspace"></i></button></td></tr>');
    
    $("#children_table").append($new_row);
    i++;   
  });

  $("#children_table").on('click', '#remove', function() {
      $(this).closest('tr').remove();
      i--;
    });
    $("#children_table").on('click', '#delete_row', function() {
      $(this).closest('tr').remove();
      i--;
    });
</script>

<script type="text/javascript">
  function delete_doc(doc_id){
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>applicant/service_registration/delete_doc/' + doc_id,
        success: function (result) {
            
        }
    });
  }
</script>


    
    