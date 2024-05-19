<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%"><?php echo $this->lang->line('sl'); ?></th>
            
            <th style="width: 40%"><?php echo $this->lang->line('title'); ?></th>

            <th style="width: 40%"><?php echo $this->lang->line('image'); ?></th>

            <th style="width: 40%"><?php echo $this->lang->line('status'); ?></th>
           
            <th style="width: 40%"><?php echo $this->lang->line('action'); ?></th>
        </tr>
    </thead>
    <tbody>
		<?php if (!empty($wings)):
       $count = $loop_start + 1;
        foreach ($wings as $data):?>

          <?php
              $language = $this->session->userdata('lang_file');
              if ($language == "bn"):
          ?>
              <tr>
                  <td><?php echo Converter::en_to_bn($count);?></td>
                  <td><?php echo $data['image_title_bn'] ?></td>   
                  <td>
                    <img width="50px" src="<?php echo base_url('public/uploads/').$data['image_url'] ?>">
                  </td>   
                  <td>
                      <?php 
                        $status = $data['status']; 
                        if($status == 1){
                          echo $this->lang->line('active');
                        }else{
                          echo $this->lang->line('inactive');
                        }
                      ?>
                  </td>
                  <td>
                      <?php if($data['status']==1):?>
                          <button type="button" class="btn btn-sm btn-warning" title="<?php echo $this->lang->line('inactive'); ?>"
                          onclick="inactive_master(<?php echo $data['id'] ?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('inactive'); ?></button>
                      <?php else: ?>
                          <button type="button" class="btn btn-sm btn-success" title="<?php echo $this->lang->line('active'); ?>"
                          onclick="active_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('active'); ?></button>  
                      <?php endif;?>                          

		                   <button type="button" class="btn btn-sm btn-info" title="<?php echo $this->lang->line('edit'); ?>"
                          onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('edit'); ?></button>
                    
                    	 <button type="button" class="btn btn-sm btn-danger" title="<?php echo $this->lang->line('delete'); ?>"
                          onclick="delete_master(<?php echo $data['id'] ?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('delete'); ?></button>
              
                  </td>
              </tr>
          <?php else:?>

              <tr>
                  <td><?php echo $count;?></td>
                  <td><?php echo $data['image_title'] ?></td>   
                  <td><img width="50px" src="<?php echo base_url('public/uploads/').$data['image_url'] ?>"></td>
                  <td>
                      <?php 
                        $status = $data['status']; 
                        if($status == 1){
                          echo $this->lang->line('active');
                        }else{
                          echo $this->lang->line('inactive');
                        }
                      ?>
                  </td>
                  <td>
                    <div class="btn-group">
                       <?php if($data['status']==1):?>
                          <button type="button" class="btn btn-sm btn-warning" title="<?php echo $this->lang->line('inactive'); ?>"
                          onclick="inactive_master(<?php echo $data['id'] ?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('inactive'); ?></button>
                      <?php else: ?>
                          <button type="button" class="btn btn-sm btn-success" title="<?php echo $this->lang->line('active'); ?>"
                          onclick="active_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('active'); ?></button>  
                      <?php endif;?>                          

                       <button type="button" class="btn btn-sm btn-info" title="<?php echo $this->lang->line('edit'); ?>"
                          onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('edit'); ?></button>
                    
                       <button type="button" class="btn btn-sm btn-danger" title="<?php echo $this->lang->line('delete'); ?>"
                          onclick="delete_master(<?php echo $data['id'] ?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('delete'); ?></button>
                    </div>
                  </td>
              </tr>
          
          <?php endif;?>    

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