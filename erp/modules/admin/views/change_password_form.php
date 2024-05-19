<?php
    $old_password = array(
    	'name'	=> 'old_password',
    	'id'	=> 'old_password',
        'class' => 'form-control',
    	'value' => set_value('old_password')
    );
    $new_password = array(
    	'name'	=> 'new_password',
    	'id'	=> 'new_password',
        'class' => 'form-control',
    );
    $confirm_new_password = array(
    	'name'	=> 'confirm_new_password',
    	'id'	=> 'confirm_new_password',
        'class' => 'form-control',
    );
    
    ?>
<style>
    .required{
    color:red;
    }
</style>
<div class="content-wrapper">
<div class="row">
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body p-5">
            <?php echo form_open_multipart('', array('id' => 'update_password')); ?>
            <p class="card-description">
            </p>
            <div class="row">
                <div class="col-md-12">
                    <div class="row" style="margin: 20px 0px;">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h5><?= $this->lang->line('change_password') ?></h5>
                            </div>
                            <table width="93%" border="0" class="mt-5">
                                <tr>
                                    <td scope="row"><label class="title"><?php echo form_label($this->lang->line('old_password'), $old_password['id']); ?><em class="required">*</em></label></th>
                                    <td>
                                        <?php echo form_password($old_password); ?>
                                        <span class="notification-input ni-error"> <?php echo ucwords(form_error($old_password['name'])); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row"><label class="title"><?php echo form_label($this->lang->line('new_password'), $new_password['id']); ?><em class="required">*</em></label></th>
                                    <td>
                                        <?php echo form_password($new_password); ?>
                                        <span class="notification-input ni-error"> <?php echo ucwords(form_error($new_password['name'])); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" align="left" width="32%"><label class="title"><?php echo form_label($this->lang->line('confirm_new_password'), $confirm_new_password['id']); ?><em class="required">*</em></label></th>
                                    <td>
                                        <?php echo form_password($confirm_new_password); ?>
                                        <span class="notification-input ni-error"> <?php echo ucwords(form_error($confirm_new_password['name'])); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">&nbsp;</th>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td scope="row"></th>
                                    <td>
                                        <button type="submit" class="btn btn-primary" id="update_submit"><?php echo $this->lang->line('update'); ?></button>                                    
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    $(function () {
      $('body').on('click', '#update_submit', function () {
    
        $('#update_password').validate({
          rules: {
              old_password: {
              required: true,
              }, 
              new_password: {
              required: true,
              }, 
              confirm_new_password: {
              required: true,
              }
          },
          messages: {      
              old_password: {
                  required: 'Old password is required.',
              }, 
              new_password: {
                  required: 'New password is required.',
              }, 
              confirm_new_password: {
                  required: 'Confirm new password is required.',
              }
          },
       
    
       submitHandler: function (form) {
        $("label.error").remove();
        var frm = $('#update_password');
            var form = $(this);
            $.ajax({
              url: "<?php echo base_url() ?>admin/change_password/change_password",
              type: 'POST',
              data: frm.serialize(),
              success: function (response) {
                var result = $.parseJSON(response);
                if (result.status == 'error') {
                  toastr.error(result.message);
                }
                if (result.status != 'success') {
    
                  $.each(result, function (key, value) {
                    $('[name="' + key + '"]').addClass("error");
                    $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                  });
                }
                else {
                  toastr.success(result.message);
                  setTimeout(function () {
                    window.location.href = "<?php echo base_url() ?>admin/change_password";
                  }, 500);
                }
              }
            });
          }
        }); 
    
      });
    });
    
    
    
</script>