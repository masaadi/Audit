<?php
    $this->load->view('frontend/forum/header_forum');
  ?>

  <div class="card title-img mt-5">
    <div class="card-body">
      <div class="container">
        <img src="<?php echo base_url();?>public/dashboard/images/bsic.png" alt="" style="width: 150px;" class="p-3">
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
              <div class="col-md-8">
                <b><h3 class="my-4"><?= $this->lang->line('forum') ?>
                  <small><?= $this->lang->line('details') ?></small>
                </h3></b>
              </div>
            </div>
            <div id='forumList'>

          <!-- Title -->
            <?php 
            $language = $this->session->userdata("lang_file");
            if($language =="bn"):?>
                <h1 class="mt-4"  style='font-size:24px'><?= $data[0]->post_title ?></h1>
            <?php else: ?>
                <h1 class="mt-4"  style='font-size:24px'><?= $data[0]->post_title ?></h1>
            <?php endif; ?>
            <hr>
            <div class='row'>
                <div class='col-md-6'>
                  	<p>
						<span class='text-primary'><?= $this->lang->line('posted_on') ?> : </span><?= $data[0]->post_datetime ?>
                  	</p>
                </div>
                <div class='col-md-6'>
					<p>
						<span class='text-primary'><?= $this->lang->line('posted_by') ?> : </span>
						<?php if($language=='bn'): ?>
							<?php  echo ($data[0]->full_name_bn !='') ?   $data[0]->full_name_bn :  $this->lang->line('guest');  ?>

						<?php else: ?>
							<?php  echo ($data[0]->full_name !='') ?   $data[0]->full_name :  $this->lang->line('guest');  ?>
						<?php endif; ?>
					</p>
				</div>
            </div>

          <?php 
          $language = $this->session->userdata("lang_file");
          if($language =="bn"):?>
              <p><?= $data[0]->post_content ?></p>
          <?php else: ?>
              <p><?= $data[0]->post_content ?></p>
          <?php endif; ?>
			<form action='' id='form_comment' method='post'> 
				<div class='row'> 
						<div class='col-12'> 
							<input name='post_id' id='post_id' type="hidden" value='<?= $data[0]->id ?>'>
							<textarea rows='4' name='comment' id='comment' class='form-control' placeholder='<?php echo $this->lang->line('type_comment') ?>...'></textarea>
							<div class='text-right mt-3'>
								<button type='submit' class='btn btn-primary' id='btn_comment'><?= $this->lang->line('comment') ?></button>
							</div>
					</div>
				</div>
			</form>
        <div id='comments'>
          <?php
            $this->load->view('frontend/forum/comments',['post_id'=>$data[0]->id]);
          ?>
        </div>
        </div>

      </div>
      
        <?php
         $this->load->view('frontend/forum/sidebar');
        ?>
    </div>
  </div>

  <br>



<script>

            
    $(function () {
            $('body').on('click', '#btn_comment', function () {
                
                    $('#form_comment').validate({
                        rules: {
                            comment: {
                                required: true,
                            }              
                        },
                        submitHandler: function (form) {
                            $("label.error").remove();
                            var currentForm = $('#form_comment')[0];
                            var formData = new FormData(currentForm);   

                            $.ajax({
                                url: "<?php echo base_url() ?>forum/comment",
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                beforeSend: function() {
                                    $("#ajaxload").addClass('d-block');
                                },
                                complete: function () {
                                  $("#ajaxload").removeClass('d-block');
                                }, 
                                success: function (response) {
                                    
                                    $("#form_comment").trigger("reset");
                                    $("#comments").html(response);
                                    toastr.success('Your comment success.');                                }
                            });
                        }
                    });
                
            });
        });

       function comment(comment_id,post_id){
            var comment_temp='comment_'+comment_id;
            var comment=$('#'+comment_temp).val();
            if(comment !=''){
                $.ajax({
                    url: "<?php echo base_url() ?>forum/reply",
                    type: 'POST',
                    data: {reply_id:comment_id,comment:comment,post_id:post_id},
                    dataType: 'json',
                    beforeSend: function() {
                        $("#ajaxload").addClass('d-block');
                    },
                    complete: function () {
                      $("#ajaxload").removeClass('d-block');
                    }, 
                    success: function (response) {
                        toastr.success(response.message);
                        location.reload();
                    }
                });
            }
           
        }

        

</script>