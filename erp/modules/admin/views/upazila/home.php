<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%"><?php echo $this->lang->line('sl'); ?></th>
            
            <th style=""><?php echo $this->lang->line('division'); ?></th>
            <th style=""><?php echo $this->lang->line('district'); ?></th>
            <th style=""><?php echo $this->lang->line('upazila'); ?> <?php echo $this->lang->line('name'); ?></th>
           
            <th style="width: 20%"><?php echo $this->lang->line('code'); ?></th>
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
                  <td><?php echo $data['division_name_bn'] ?></td>                           
                  <td><?php echo $data['district_name_bn'] ?></td>                           
                  <td><?php echo $data['upazila_name_bn'] ?></td>                           
                  <td><?php echo $data['code'] ?></td>                           
                  <td>
                    <?php if($data['status']==1): ?>
                          <span class="btn btn-xs btn-success"><?= $this->lang->line('active')?></span>
                      <?php elseif($data['status']==0): ?>
                          <span class="btn btn-xs btn-danger"><?= $this->lang->line('inactive')?></span>
                      <?php endif; ?>
                  </td>
                  <td>
		                   <button type="button" class="btn btn-sm btn-warning" title="<?php echo $this->lang->line('edit'); ?>"
                          onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('edit'); ?></button>
                    
                    	 <!-- <button type="button" class="btn btn-sm btn-danger mt-1" title="<?php echo $this->lang->line('edit'); ?>"
                          onclick="delete_master(<?php echo $data['id'] ?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('delete'); ?></button> -->
                        <?php if($data['status']==1): ?>
                              <button type="button" class="btn btn-sm btn-danger mt-1" title="<?= $this->lang->line('inactive')?>"
                                onclick="delete_master(<?php echo $data['id'].',2' ?>)"  data-backdrop="static"
                                data-keyboard="false"><?= $this->lang->line('inactive')?>
                              </button>
                          <?php elseif($data['status']==0): ?>
                              <button type="button" class="btn btn-sm btn-success mt-1" title="<?= $this->lang->line('active')?>"
                                onclick="delete_master(<?php echo $data['id'].',1' ?>)"  data-backdrop="static"
                                data-keyboard="false"><?= $this->lang->line('active')?>
                          <?php endif; ?>
              
                  </td>
              </tr>
          <?php else:?>
              <tr>
                  <td><?php echo $count;?></td>
                  <td><?php echo $data['division_name'] ?></td>                           
                  <td><?php echo $data['district_name'] ?></td>                           
                  <td><?php echo $data['upazila_name'] ?></td>  
                  <td><?php echo $data['code'] ?></td>                           
                         
                  <td>
                    <?php if($data['status']==1): ?>
                          <span class="btn btn-xs btn-success"><?= $this->lang->line('active')?></span>
                      <?php elseif($data['status']==0): ?>
                          <span class="btn btn-xs btn-danger"><?= $this->lang->line('inactive')?></span>
                      <?php endif; ?>
                  </td>
                  <td>
                       <button type="button" class="btn btn-sm btn-warning" title="<?php echo $this->lang->line('edit'); ?>"
                          onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('edit'); ?></button>
                    
                       <!-- <button type="button" class="btn btn-sm btn-danger mt-1" title="<?php echo $this->lang->line('edit'); ?>"
                          onclick="delete_master(<?php echo $data['id'] ?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('delete'); ?></button> -->
                          <?php if($data['status']==1): ?>
                              <button type="button" class="btn btn-sm btn-danger mt-1" title="<?= $this->lang->line('inactive')?>"
                                onclick="delete_master(<?php echo $data['id'].',2' ?>)"  data-backdrop="static"
                                data-keyboard="false"><?= $this->lang->line('inactive')?>
                              </button>
                          <?php elseif($data['status']==0): ?>
                              <button type="button" class="btn btn-sm btn-success mt-1" title="<?= $this->lang->line('active')?>"
                                onclick="delete_master(<?php echo $data['id'].',1' ?>)"  data-backdrop="static"
                                data-keyboard="false"><?= $this->lang->line('active')?>
                          <?php endif; ?>
              
                  </td>
              </tr>
          <?php endif;?>


						<?php 
                         $count++;
          endforeach;
		   else:
          ?>
          <tr>
            <td colspan="5" style="text-align: center;"><b><?php echo $this->lang->line('no_data_found'); ?></b></td>
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