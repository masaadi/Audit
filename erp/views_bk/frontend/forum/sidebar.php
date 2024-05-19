<div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header"><?= $this->lang->line('search') ?></h5>
          <div class="card-body">

          <?php echo form_open_multipart('', array('id' => 'union_search')); ?>
                <div class="input-group md-form form-sm form-2 pl-0">
                  <input  name="div_name" id="div_name" class="form-control my-0 py-1 red-border" type="text" placeholder="<?= $this->lang->line('search') ?>" aria-label="Search">
                  <div class="input-group-append">
                    <span style='cursor: pointer' onclick="searchFilter()" class="input-group-text red lighten-3" id="basic-text1"><?= $this->lang->line('search') ?></span>
                </div>
        </div>
         </form>

          </div>
        </div>

        <div class="card my-4">
          <h5 class="card-header"><?= $this->lang->line('recent_forums') ?></h5>
          <div class="card-body">
                <?php
                    $this->load->model('forum_model');
                    $recents=$this->load->forum_model->get_user_data(array('limit' => 10));
                    if (!empty($recents)):
                        foreach ($recents as $data):
                            $query = $this->db->query("SELECT * FROM forum_comment where post_id=".$data['id']."");
                        ?>
                        <div class="card mb-1">
                            <div class="card-body p-2">
                                <a href="<?php echo base_url('forum/post').'/'.$data['id'] ?>">
                                <p style='font-size:14px;padding:0;margin:0' class="card-title mt-2 text-primary"><?php echo $data['post_title'] ?> | Reply (<?= $query->num_rows()?>) | Views (<?= $data['views'] ?>)</p>
                                </a>
                                <p style='font-size:13px;padding:0;margin:0'><?= $this->lang->line('posted_on') ?> :  <?php echo $data['post_datetime'] ?> </p>
                            </div>
                        </div>
                        <?php 
                        endforeach;
                    else:
                    ?>
                        <tr>
                            <p class='text-center text-danger'><b><?= $this->lang->line('post_not_found') ?></b></p>
                        </tr>
                <?php endif; ?>
          </div>
        </div>

        <div class="card my-4">
          <h5 class="card-header"><?= $this->lang->line('popular_forums') ?></h5>
          <div class="card-body">
                <?php
                    $param=[];
                    $param['limit']=10;
                    $param['views']='desc';
                    $this->load->model('forum_model');
                    $recents=$this->load->forum_model->get_user_data($param);
                    if (!empty($recents)):
                        foreach ($recents as $data):
                            $query = $this->db->query("SELECT * FROM forum_comment where post_id=".$data['id']."");
                        ?>
                        <div class="card mb-1">
                            <div class="card-body p-2">
                                <a href="<?php echo base_url('forum/post').'/'.$data['id'] ?>">
                                <p style='font-size:14px;padding:0;margin:0' class="card-title mt-2 text-primary"><?php echo $data['post_title'] ?> | Reply (<?= $query->num_rows()?>) | Views (<?= $data['views'] ?>)</p>
                                </a>
                                <p style='font-size:13px;padding:0;margin:0'><?= $this->lang->line('posted_on') ?> :  <?php echo $data['post_datetime'] ?> </p>
                            </div>
                        </div>
                        <?php 
                        endforeach;
                    else:
                    ?>
                        <tr>
                            <p class='text-center text-danger'><b><?= $this->lang->line('post_not_found') ?></b></p>
                        </tr>
                <?php endif; ?>
          </div>
        </div>






        
          

</div>


<script>
     function searchFilter(page_num) {
         page_num = page_num ? page_num : 0;
         var div_name = $('#div_name').val();	
		
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>forum/paginate_data/' + page_num,
            data: 'page=' + page_num + '&div_name=' + div_name,
            beforeSend: function() {
                $("#ajaxload").addClass('d-block');
            },
            complete: function () {
              $("#ajaxload").removeClass('d-block');
            }, 
            success: function (html) {
                $('#forumList').html(html);
            }
        });
    }
</script>