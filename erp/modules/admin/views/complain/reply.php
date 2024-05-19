 <?php


$complain_content = array(
    'name'  => 'complain_content',
    'id'    => 'complain_content',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);


?>
 
 <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"><?= $this->lang->line('reply') ?></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body ">
  <?php echo form_open_multipart('', array('id' => 'reply_add')); ?>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="count1" value="<?= $count1 ?>">
        <textarea name='reply' id='reply' rows='5' style="width: 100%; padding: 10px; border-radius: 3px;" placeholder="<?= $this->lang->line('write_your_reply') ?>..."></textarea>
        <?php if(count($next_users)>0): ?>
            <div class="form-group mt-2">
                <label><?= $this->lang->line('select_next_user') ?></label>
                <select id='next_user' name="next_user" class='form-control'>
                    <option value="">Select One</option>
                    <?php foreach($next_users as $user): ?>
                        <option value="<?= $user->id ?>"><?= $user->full_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endif; ?>

        <div class="form-group text-right" style="margin-top:10px">
            <?php if(count($next_users)>0): ?>
            <button type="submit"  id="submit" class="btn btn-sm btn-primary"><?= $this->lang->line('send') ?></button>
            <?php endif; ?>
            <button type="submit"  id="submit_closed" class="btn btn-sm btn-danger"> <?= $this->lang->line('close') ?></button>
        </div>
    </form>
  </div>


  <script type="text/javascript">
      

    $(function () {
        $('body').on('click', '#submit', function () {
                $('#reply_add').validate({
                    rules: {
                        reply: {
                            required: true,
                        },                   
                        next_user: {
                            required: true,
                        },                   
                    },
                    messages: {
                       
                    
                        reply: {
                            required: 'Reply is required.',
                        },
                        next_user: {
                            required: 'Next user is required.',
                        },
                    },
                    submitHandler: function (form) {
                        $("label.error").remove();
                        var form = $(this);
                        var currentForm = $('#reply_add')[0];
                        var formData = new FormData(currentForm);                        
                        $.ajax({
                            url: "<?php echo base_url() ?>admin/complain/repled",
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                var result = $.parseJSON(response);
                                if (result.status != 'success') {
                                    $.each(result, function (key, value) {
                                      $('[name="' + key + '"]').addClass("error");
                                      $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                                  });
                                }else {
                                    $('#reply_modal').modal('hide');

                                      window.onload = searchFilter(0);
                                      toastr.success(result.message);
                                      
                                  }
                                }
                        });
                    }
                });
            
        });
    });

    $(function () {
        $('body').on('click', '#submit_closed', function () {
            
                $('#reply_add').validate({
                    rules: {
                      
                        reply: {
                            required: true,
                        },                   
                    },
                    messages: {
                       
                    
                        reply: {
                            required: 'Reply is required',
                        },
                    },
                    submitHandler: function (form) {
                        $("label.error").remove();
                        var form = $(this);
                        var currentForm = $('#reply_add')[0];
                        var formData = new FormData(currentForm);                        
                        $.ajax({
                            url: "<?php echo base_url() ?>admin/complain/closed_complain",
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                var result = $.parseJSON(response);
                                if (result.status != 'success') {
                                    $.each(result, function (key, value) {
                                      $('[name="' + key + '"]').addClass("error");
                                      $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                                  });
                                }else {
                                    $('#reply_modal').modal('hide');

                                      window.onload = searchFilter(0);
                                      toastr.success(result.message);
                                      
                                  }
                                }
                        });
                    }
                });
            
        });
    });



</script>
