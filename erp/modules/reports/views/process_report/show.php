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
                  <?php echo form_open_multipart('', array('id' => '')); ?>

                  <div class="row">                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Service Type<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?= $service_register->service_type?>" readonly>
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
                          <label class="col-sm-4 col-form-label">Employee ID</label>
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
                          <label class="col-sm-4 col-form-label">Dealing Person</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="dealing_person" id="dealing_person" value="<?= $service_register->dealing_person;?>" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Mobile</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="mobile" id="mobile" value="<?= $service_register->mobile;?>" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Email</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" id="email" value="<?= $service_register->email;?>" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Disclose Officer</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="disclose_officer" id="disclose_officer" value="<?= $service_register->disclose_officer;?>" readonly>
                          </div>
                        </div>
                      </div> 
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Dispatch Entry No</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="dispatch_no" id="dispatch_no" value="<?= $service_register->dispatch_no;?>" readonly>
                          </div>
                        </div>
                      </div> 
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Date</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="reg_date" id="reg_date" value="<?= $service_register->date;?>" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <table class="table table-bordered" id="children_table">
                        <tr>
                            <td>Sl. No.</td>
                            <td>Uploaded Document</td>
                        </tr>
                        <?php $documents = $this->db->where('status',1)->where('service_regi_id',$service_register->id)->get('service_regi_document')->result();
                        $a = 1;
                        foreach($documents as $document):
                        ?>
                        <tr id="uploaded_row_<?= $a;?>">
                            <td><?= $a;?>.</td>
                          <td>
                            <a href="<?= base_url()?><?= $document->document;?>" target="blank">download here</a>
                          </td>
                        </tr>
                      <?php $a++; endforeach;?>
                      </table>

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
          $('#designation').val(result.desig_id);
          $('#designation_name').val(result.designation_name);
          $('#salary_scale').val(result.current_scale);
        }
      });
    })
</script>

<script type="text/javascript">
  $(function () {
    $('#reg_date').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap'
    });
  })
</script>


    
    