
 
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
      

        <div class="form-group text-right" style="margin-top:10px">
            
            <button type="submit"  id="submit" class="btn btn-sm btn-primary"><?= $this->lang->line('send') ?></button>
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
                        }                 
                    },
                    messages: {
                        reply: {
                            required: 'Reply is required.',
                        }
                        
                    },
                    submitHandler: function (form) {
                        $("label.error").remove();
                        var form = $(this);
                        var currentForm = $('#reply_add')[0];
                        var formData = new FormData(currentForm);                        
                        $.ajax({
                            url: "<?php echo base_url() ?>admin/review/feedbackSave",
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
