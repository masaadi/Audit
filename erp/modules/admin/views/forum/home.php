<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%"><?php echo $this->lang->line('sl'); ?></th>
            
            <th style="width: 40%"><?php echo $this->lang->line('title'); ?></th>
            <th style="width: 10%"><?php echo $this->lang->line('status'); ?></th>
           
            <th style="width: 40%"><?php echo $this->lang->line('action'); ?></th>
        </tr>
    </thead>
    <tbody>
    <?php
     
    $language = $this->session->userdata('lang_file');
      
    if (!empty($wings)):
       $count = $loop_start + 1;
        foreach ($wings as $data):?>

        
              <tr>
                  <td><?=  $count ?></td>
                  <td><?=  text_format($data['post_title'],150)  ?></td>
                  <td>
                   <?php
                    if($data['status']=='0'){
                      echo "<span class='badge badge-danger'>".$this->lang->line('inactive')."</span>";
                    } else{
                      echo "<span class='badge badge-success'>".$this->lang->line('active')."</span>";
                    }
                      ?>
                  </td>   
                  <td>
                       <button type="button" class="btn btn-sm btn-info" title="<?php echo $this->lang->line('view'); ?>"
                          onclick="view_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('view'); ?></button>

                      <?php if($data['status']==0): ?> 
                          <button type="button" class="btn btn-sm btn-success" title="<?php echo $this->lang->line('active'); ?>"
                          onclick="active_inactive_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('active'); ?></button>
                      <?php else: ?>
		                   <button type="button" class="btn btn-sm btn-danger" title="<?php echo $this->lang->line('inactive'); ?>"
                          onclick="active_inactive_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('inactive'); ?></button>
                    
                      <?php endif;  ?>
                     
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