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
                            <input class="form-control" type="text" value="<?= $service_document[0]->service_type;?>" readonly>
                            <input type="hidden" name="service_type" value="<?= $service_document[0]->service_type_id;?>">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <table class="table table-bordered" id="children_table">
                        <tr>
                            <td>Serial</td>
                            <td>Document Name</td>
                            <td><button class="btn-primary" id="add_row" type="button"><i class="fas fa-plus"></i></button></td>
                        </tr>
                        <?php $a=1; foreach($service_document as $value):?>
                        <tr>
                        <input type="hidden" name="id[]" value="<?= $value->id;?>">
                          <td><?= $a++;?></td>
                          <td><input class="form-control" type="text" name="doc_name[]" id="doc_name" value="<?= $value->document_name;?>"></td>
                          <td>
                            <button class="btn-danger" id="delete_row" type="button" onclick="delete_data('<?= $value->id;?>')"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                      <?php endforeach;?>
                      <input type="hidden" value="<?= $a;?>" id="row_count">
                      </table>

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
  var i = $('#row_count').val();
  $(document).on("click", "#add_row", function() {
    
    var $new_row = $('<tr><td>'+i+'</td><td><input class="form-control" type="text" name="doc_name[]"></td><td><button class="btn-danger" id="remove"><i class="fas fa-backspace"></i></button></td></tr>');
    
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

  function delete_data(id){
    //alert(id)
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>service/service_document/delete/' + id,
        success: function (result) {
            
        }
    });
  }
</script>

    
    