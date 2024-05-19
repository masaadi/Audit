<table id="examplee" class="table table-striped table-bordered " style="width:100%">
    <thead>
        <tr>
            <th style="width: 10%"><?php echo $this->lang->line('sl'); ?></th>
            
            <th style="width: 10%"><?php echo $this->lang->line('star'); ?></th>
            <th style="width: 30%"><?php echo $this->lang->line('review'); ?></th>
            <th style="width: 15%"><?php echo $this->lang->line('name'); ?></th>
            <th style="width: 15%"><?php echo $this->lang->line('mobile'); ?></th>
            <th style="width: 20%"><?php echo $this->lang->line('action'); ?></th>
        </tr>
    </thead>
    <tbody>
		<?php if (!empty($wings)):
       $count = $loop_start + 1;
        foreach ($wings as $data):?>
          <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $data['star'] ?></td>   
                <td><?php echo text_format($data['review_content'],100) ?></td>   
                <td><?php echo $data['full_name'] ?></td>   
                <td><?php echo $data['mobile'] ?></td>   
                
                <td>
                      <button type="button" class="btn btn-sm btn-success" title="<?php echo $this->lang->line('show'); ?>"
                        onclick="see_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                        data-keyboard="false"><?php echo $this->lang->line('show'); ?></button>

                      <?php if($data['status']==0): ?> 
                          <button type="button" class="btn btn-sm btn-success" title="<?php echo $this->lang->line('active'); ?>"
                          onclick="active_inactive_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('active'); ?></button>
                      <?php else: ?>
		                   <button type="button" class="btn btn-sm btn-danger" title="<?php echo $this->lang->line('inactive'); ?>"
                          onclick="active_inactive_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('inactive'); ?></button>
                      <?php endif;  ?>

                        <button type="button" class="btn btn-sm btn-warning mt-1" title="<?php echo $this->lang->line('feedback'); ?>"
                        onclick="feedback_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                        data-keyboard="false"><?php echo $this->lang->line('feedback'); ?></button>
                </td>
              
          </tr>
						<?php 
                         $count++;
          endforeach;
		   else:
          ?>
          <tr>
            <td colspan="3" style="text-align: center;"><b><?php echo $this->lang->line('no_data_found'); ?></b></td>
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