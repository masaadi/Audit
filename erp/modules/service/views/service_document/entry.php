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
                  <?php echo form_open_multipart('', array('id' => 'personal_info_add')); ?>

                    <div class="row">                      
					            <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Service Type<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('service_type', getServiceType(), '', 'id="service_type" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <table class="table table-bordered" id="children_table">
                        <tr>
                            <td>Serial</td>
                            <td>Document Name</td>
                            <td>Action</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td><input class="form-control" type="text" name="doc_name[]" id="doc_name"></td>
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
  var i = 2;
  $(document).on("click", "#add_row", function() {
    
    var $new_row = $('<tr><td>'+i+'</td><td><input class="form-control" type="text" name="doc_name[]"></td><td><button class="btn-danger" id="remove"><i class="fas fa-backspace"></i></button></td></tr>');
    
    $("#children_table").append($new_row);
    i++;   


  });
    $("#children_table").on('click', '#remove', function() {
      $(this).closest('tr').remove();
      i--;
    });
</script>

		
		