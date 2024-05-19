<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%"><?php echo $this->lang->line('sl'); ?></th>
            
            <th style=""><?php echo $this->lang->line('title'); ?></th>
            <th style=""><?php echo $this->lang->line('date'); ?></th>
            <th style=""><?php echo $this->lang->line('status'); ?></th>
            <th style=""><?php echo $this->lang->line('action'); ?></th>
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
                <td>
                  <?php echo text_format($data['notice_title_bn'],100) ?>( 
                  <span class='text-primary'><?=  time_ago($data['created_date']); ?></span> )
                </td>   
                <td><?= date("d-m-Y", strtotime($data['created_date']))  ?></td>   
                  
          <?php else:?>

                <td><?php echo $count;?></td>
                <td>
                  <?php echo text_format($data['notice_title'],100) ?><br>
                  <span class='text-primary'><?=  time_ago($data['created_date']); ?></span>
                </td>   
                <td width='15%'><?= date("d-m-Y", strtotime($data['created_date']))  ?></td>   

              
          
          <?php endif;?>   
          
                 <td>
                   <?php
                      if($data['status']==0){
                        echo "<span class='badge badge-danger ml-1'>".$this->lang->line('pending')."</span>";
                      } elseif($data['status']=='1'){
                        echo "<span class='badge badge-success ml-1'>".$this->lang->line('active')."</span>";
                      }
                     
                      if($data['publish_status']==1){
                        echo "<span class='badge badge-success mt-2 ml-1'>".$this->lang->line('publish')."</span>";
                      }

                      ?>
                  </td>   
                  <td>
                       <button type="button" class="btn btn-sm btn-info mt-1" title="<?php echo $this->lang->line('view'); ?>"
                          onclick="view_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('view'); ?></button>
                        
                        <?php if($data['publish_status'] ==0 ): ?>    
                       <button type="button" class="btn btn-sm btn-warning mt-1" title="<?php echo $this->lang->line('edit'); ?>"
                          onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('edit'); ?></button>
                        <?php endif; ?>       
                          
                        <?php if($data['publish_status'] ==0 && $data['status'] ==1): ?>
                          <button type="button" class="btn btn-sm btn-success mt-1" title="<?php echo $this->lang->line('edit'); ?>"
                            onclick="publish_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                            data-keyboard="false"><?php echo $this->lang->line('publish'); ?></button>
                        <?php endif; ?>       



                        <?php if($data['status']==0): ?>
                            <button type="button" class="btn btn-sm btn-success mt-1" title="<?php echo $this->lang->line('edit'); ?>"
                              onclick="active_inactive_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                              data-keyboard="false"><?php echo $this->lang->line('active'); ?></button>
                        <?php  else:  ?>        
                          <button type="button" class="btn btn-sm btn-danger mt-1" title="<?php echo $this->lang->line('edit'); ?>"
                              onclick="active_inactive_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                              data-keyboard="false"><?php echo $this->lang->line('pending'); ?></button>         
                        <?php endif; ?>       
                                  
                               
                              
                         
                  </td>
          </tr>
						<?php 
                         $count++;
          endforeach;
		   else:
          ?>
          <tr>
            <td colspan="6" style="text-align: center;"><b><?php echo $this->lang->line('no_data_found'); ?></b></td>
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