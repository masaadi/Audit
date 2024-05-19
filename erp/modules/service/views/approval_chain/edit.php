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
                          <label class="col-sm-4 col-form-label">Service Type<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('service_types', getServiceType(), $approval_chain[0]->service_type_id, 'id="service_types" class="form-control"'); ?>

                            <input type="hidden" name="service_type" value="<?= $approval_chain[0]->service_type_id;?>">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    
                      <table class="table table-bordered" id="children_table">
                        <tr>
                            <td>Step</td>
                            <td>Designation</td>
                            <td>Employee</td>
                            <td>Message</td>
                            <th><button class="btn-primary" id="add_row" type="button"><i class="fas fa-plus"></i></button></th>
                        </tr>
                        <?php $a = 1 ; foreach($approval_chain as $chain_value):?>
                        <input type="hidden" name="chain_id[]" value="<?= $chain_value->id;?>">
                        <tr>
                          <td><?= $a;?></td>
                          <td>
                            <select class="form-control desig_sec" name="designation[]" id="designation_<?= $a;?>" required="required" onchange="get_emps('<?= $a;?>')">
                              <option>--select--</option>
                              <?php foreach($designations as $designation):?>
                                <option value="<?php echo $designation->id;?>" <?php if($designation->id == $chain_value->current_desig){echo "selected";}?> > <?php echo $designation->designation_name;?> </option>
                              <?php endforeach;?>
                            </select>
                          </td>
                          <td>
                            <select class="form-control emp_sec" name="employee[]" id="employee_<?= $a;?>" required="required">                            

                              <option value="<?= $chain_value->employee_id;?>" selected><?= $chain_value->employee_name.' ('.$chain_value->employee_id.')';?></option>

                            
                            </select>
                          </td>
                          <td><input class="form-control" type="text" name="message[]" id="message" value="<?=$chain_value->message ;?>"></td>
                          <td>
                            
                          </td>
                        </tr>
                        <?php $a++; endforeach;?>
                      </table>
                      <input type="hidden" value="<?= $a;?>" id="row_count">

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
  var i = $('#row_count').val();
  $(document).on("click", "#add_row", function() {
    
    var $new_row = $('<tr><td>'+i+'</td><td><select class="form-control" name="designation[]" id="designation_'+i+'" onchange="get_emp('+i+')" required="required"><option>--select--</option><?php foreach($designations as $designation):?><option value="<?php echo $designation->id;?>"> <?php echo $designation->designation_name;?> </option><?php endforeach;?></select></td><td><select class="form-control" name="employee[]" id="employee_'+i+'" required="required"><option>--select--</option></select></td><td><input class="form-control" type="text" name="message[]" id="message"></td><td><button class="btn-danger" id="remove"><i class="fas fa-backspace"></i></button></td></tr>');

    $("#children_table").append($new_row);

    //get_emp();
      
    i++; 

  });

  $("#children_table").on('click', '#remove', function() {
      $(this).closest('tr').remove();
      i--;
    });
  
    function get_emp(s){
      var key = "#designation_"+s;
      //console.log(key);
      var designation_id = $(key).val();
      //alert(designation_id)
        $.ajax({
          type:"Post",
          url:"<?php echo base_url() ?>service/approval_chain/get_emp_by_desig/"+designation_id,
          dataType: "html",
          success: function(result){
            $('#employee_'+s).html(result);
          }
        });
    }
</script>

<script type="text/javascript">

function get_emps(a){
    var designation_id = $('#designation_'+a).val();
    //alert(designation_id)
      $.ajax({
        type:"Post",
        url:"<?php echo base_url() ?>service/approval_chain/get_emp_by_desig/"+designation_id,
        dataType: "html",
        success: function(result){
          $('#employee_'+a).html(result);
        }
      });
}
  
</script>
    
    