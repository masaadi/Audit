<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%"><?php echo $this->lang->line('sl'); ?></th>
            
            <th style="width: 25%"><?php echo $this->lang->line('topic'); ?></th>
            <th style="width: 25%"><?php echo $this->lang->line('title'); ?></th>
            <th style="width: 10%"><?php echo $this->lang->line('status'); ?></th>
           
            <th style="width: 40%"><?php echo $this->lang->line('action'); ?></th>
        </tr>
    </thead>
    <tbody>
		<?php if (!empty($wings)):
       $count = $loop_start + 1;
        foreach ($wings as $data):?>
          <tr>
          <?php
              $language = $this->session->userdata('lang_file');
              if ($language == "bn"):
          ?>
             
                <td><?php echo Converter::en_to_bn($count);?></td>
                <td><?php echo text_format($data['topic_name_bn'],100) ?></td>   
                <td><?php echo text_format($data['post_title_bn'],100) ?></td>   
                  
          <?php else:?>

                  <td><?php echo $count;?></td>
                  <td><?php echo text_format($data['topic_name'],100) ?></td>   
                  <td><?php echo  text_format($data['post_title'],100) ?></td>   
                 
              
          
          <?php endif;?>   
          
                 <td>
                   <?php
                    if($data['status']=='0'){
                      echo "<span class='badge badge-danger'>".$this->lang->line('pending')."</span>";
                    } else{
                      echo "<span class='badge badge-success'>".$this->lang->line('success')."</span>";
                    }

                      ?>
                  </td>   
                  <td>
                       <button type="button" class="btn btn-sm btn-info " title="<?php echo $this->lang->line('view'); ?>"
                          onclick="view_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('view'); ?></button>
                          <?php
                            if($data['status']=='0'){

                              ?>

                            <button type="button" class="btn btn-sm btn-success" title="<?php echo $this->lang->line('edit'); ?>"
                              onclick="confirm_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                              data-keyboard="false"><?php echo $this->lang->line('confirm'); ?></button>
                              
                              <?php
                            } else{
                              ?>
                              <button type="button" class="btn btn-sm btn-warning" title="<?php echo $this->lang->line('edit'); ?>"
                                onclick="confirm_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                                data-keyboard="false"><?php echo $this->lang->line('inactive'); ?></button>
                                <?php
                              }
                          ?>
		                  
                    
                    	 <button type="button" class="btn btn-sm btn-danger" title="<?php echo $this->lang->line('delete'); ?>"
                          onclick="delete_master(<?php echo $data['id'] ?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('delete'); ?></button>
              
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