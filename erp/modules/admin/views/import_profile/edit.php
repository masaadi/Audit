 <?php

 $image_title = array(
    'name'  => 'image_title',
    'id'    => 'image_title',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);

 $image_title_bn = array(
    'name'  => 'image_title_bn',
    'id'    => 'image_title_bn',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' => '',
);

?>
 <div class="">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <?php echo form_open_multipart('', array('id' => 'import_edit')); ?>
                    <p class="card-description">
                      <input type="hidden" name="id" value="<?php echo 1 ?>" />
                    </p>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('upload_file'); ?></label>
                          <div class="col-sm-10">
                            <input type="file" name="import_file" id="import_file"><br><br>
                            <button type="submit" class="btn btn-primary btn-sm" id="edit_submit"><?php echo $this->lang->line('update'); ?></button>
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
<script>
  
  //update
  $(function () {
      $('body').on('click', '#edit_submit', function () {
           
        $('#import_edit').validate({
          rules: {
            
              import_file: {
                  required: true,
              }                   
          },
          messages: {
             
            import_file: {
                  required: 'import file is required',
              }
          },
          submitHandler: function (form) {
     
            $("label.error").remove();
            // e.preventDefault();
            var form = $(this);
            //debugger;
            var currentForm = $('#import_edit')[0];
            var formData = new FormData(currentForm);                        
            $.ajax({
                url: "<?php echo base_url() ?>admin/import_profile/import",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var result = $.parseJSON(response);
                    if (result.success == true) {
                      toastr.success(result.message);
                      setTimeout(function(){
                        location.reload();
                      },500);                     
                    }else {
                      toastr.error('Import failed.');
                      setTimeout(function(){
                        location.reload();
                      },500);
                    }
                      
                    }
            });
          }
      });
    });
  });
		    
</script>  