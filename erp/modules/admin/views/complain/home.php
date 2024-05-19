<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%"><?php echo $this->lang->line('sl'); ?></th>
            <th style="width: 40%"><?php echo $this->lang->line('title'); ?></th>
            <th style="width: 20%"><?php echo $this->lang->line('name'); ?></th>
            <th style="width: 20%"><?php echo $this->lang->line('mobile'); ?></th>
            <th style="width: 20%"><?php echo $this->lang->line('date'); ?></th>
            <th style="width: 20%"><?php echo $this->lang->line('status'); ?></th>
            <th style="width: 20%"><?php echo $this->lang->line('action'); ?></th>
        </tr>
    </thead>
    <tbody>
		<?php if (!empty($wings)):
       $count = $loop_start + 1;
        foreach ($wings as $data):
            $this->load->model('applicant/complain_model');
            $completed_pending=$this->complain_model->ongoing_completed_check($data['id']);
            $seen_unseen=$this->complain_model->seen_unseen_check($data['id']);
        ?>

          <tr class="<?= ($seen_unseen==true)? 'bg-secondary text-light': ''?>">
                  <td><?php echo $count;?></td>
                  <td><?php echo text_format($data['complain_title'],200) ?></td>   
                  <td><?php echo $data['full_name'] ?></td>   
                  <td><?php echo $data['mobile'] ?></td>   
                  <td><?php echo $data['created_date'] ?></td>   
                 
                  <td>
                   
                    <?php if($completed_pending==true ): ?>
                      <span class="badge badge-danger"><?= $this->lang->line('ongoing') ?></span>
                    <?php else: ?>
                      <span class="badge badge-success"><?= $this->lang->line('completed') ?></span>
                    <?php endif; ?>
                  </td>   
                  <td>
                       <button type="button" class="btn btn-sm btn-info ml-1 btn-sm" title="<?php echo $this->lang->line('view'); ?>"
                          onclick="view_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('view'); ?></button>
                          <?php 
                            $this->load->model('admin/complain_model');
                            $reply_check=$this->load->complain_model->reply_check($data['id']);
                          ?>
                          <?php if($reply_check==false): ?>
                          <button type="button" class="btn btn-sm btn-warning mt-1 ml-1  btn-sm" title="<?php echo $this->lang->line('reply'); ?>"
                          onclick="replay_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('reply'); ?></button>
                          <?php endif; ?>
                    	 <!-- <button type="button" class="btn btn-sm btn-danger  btn-sm" title="<?php echo $this->lang->line('delete'); ?>"
                          onclick="delete_master(<?php echo $data['id'] ?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('delete'); ?></button> -->
                  </td>
          </tr>
						<?php 
                         $count++;
          endforeach;
		   else:
          ?>
          <tr>
            <td colspan="7" style="text-align: center;"><b><?php echo $this->lang->line('no_data_found'); ?></b></td>
          </tr>
        <?php endif; ?>
		
                    </tbody>
                    
                </table>
				<?php echo $this->ajax_pagination->create_links(); ?>
                <!-- table -->
                <div class="row p-3">
                  <div class="col-md-9">
                    
                  </div>
                  <div class="col-md-3">
                    <nav aria-label="Page navigation example" class="">
                      <ul class="pagination justify-content-center">
					  
                        
                        <li class="page-item"></li>
                        
                      </ul>
                    </nav>
                  </div>
                </div>