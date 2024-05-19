<table id="examplee" class="table table-striped table-bordered " style="width:100%">
    <thead>
        <tr>
            <th style="width: 20%"><?php echo $this->lang->line('sl'); ?></th>
            
            <th style="width: 40%"><?php echo $this->lang->line('topic'); ?> <?php echo $this->lang->line('name'); ?></th>
           
            <th style="width: 20%"><?php echo $this->lang->line('status'); ?></th>
            <th style="width: 20%"><?php echo $this->lang->line('action'); ?></th>
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
                  <td><?php echo $data['topic_name_bn'] ?></td>  
                  <td>

                    <?php if($data['status']==1): ?>
                      <span class="badge badge-success"><?= $this->lang->line('active') ?></span>
                      <?php else: ?>
                        <span class="badge badge-danger"><?= $this->lang->line('inactive') ?></span>
                      <?php endif; ?>
                  </td> 
                  <td>
		                   <button type="button" class="btn btn-sm btn-warning" title="<?php echo $this->lang->line('edit'); ?>"
                          onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('edit'); ?></button>
                  </td>
              </tr>
          <?php else:?>

              <tr>
                  <td><?php echo $count;?></td>
                  <td><?php echo $data['topic_name'] ?></td>   
                  <td>
                    <?php if($data['status']==1): ?>
                      <span class="badge badge-success"><?= $this->lang->line('active') ?></span>
                      <?php else: ?>
                        <span class="badge badge-danger"><?= $this->lang->line('inactive') ?></span>
                      <?php endif; ?>
                  </td> 
                  <td>
                       <button type="button" class="btn btn-sm btn-warning" title="<?php echo $this->lang->line('edit'); ?>"
                          onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('edit'); ?></button>
                   
              
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