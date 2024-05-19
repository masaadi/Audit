<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 5%"><?= $this->lang->line('sl')?></th>                            
                            <th style="width: 40%"><?= $this->lang->line('module_name')?></th>
							              <th style="width: 40%"><?= $this->lang->line('sorting_order')?></th>                           
                            <th style="width: 40%"><?= $this->lang->line('icon')?></th>                           
                            <th style="width: 40%"><?= $this->lang->line('status')?></th>                           
                            <th style="width: 40%"><?= $this->lang->line('action')?></th>
                        </tr>
                    </thead>
                    <tbody>
					<?php if (!empty($wings)):
       $count = $loop_start + 1;
    foreach ($wings as $data):
	$language = $this->session->userdata("lang_file");
	?>
          <tr>
						<?php
 						   if($language =="bn"):?>
                            <td><?php echo Converter::en_to_bn($count);?></td>
                            <td><?php echo $data['module_name_bn'] ?></td> 
                            <td><?php echo Converter::en_to_bn($data['sorting_order']) ?></td>	
                            <td>
                                <img src="<?php echo file_url('module_icon/'. $data['icon'])?>" style="width: 100% !important; border-radius: 0 !important;">
                                <!-- <i class="<?php echo $data['icon']; ?> menu-icon"></i> -->
                            </td>

              <?php else:?>
                            <td><?php echo $count;?></td>
                            <td><?php echo $data['module_name']; ?></td> 
                            <td><?php echo $data['sorting_order']; ?></td>
                            <td>
                                <img src="<?php echo file_url('module_icon/'. $data['icon'])?>" style="width: 100% !important; border-radius: 0 !important;">
                                <!-- <i class="<?php echo $data['icon']; ?> menu-icon"></i> -->
                            </td>
							<?php endif;?>
                            <td>
                              <?php if($data['status']==1): ?>
                                    <span class="btn btn-xs btn-success"><?= $this->lang->line('active')?></span>
                                <?php elseif($data['status']==2): ?>
                                    <span class="btn btn-xs btn-danger"><?= $this->lang->line('inactive')?></span>
                                <?php endif; ?>
                            </td>
                            <td>          
              
                                 <button type="button" class="btn btn-sm btn-warning" title="EDIT"
                                    onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                                    data-keyboard="false"><?= $this->lang->line('edit')?></button>

                                <?php if($data['status']==1): ?>
                                    <button type="button" class="btn btn-sm btn-danger" title="EDIT"
                                      onclick="delete_master(<?php echo $data['id'].',2' ?>)"  data-backdrop="static"
                                      data-keyboard="false"><?= $this->lang->line('inactive')?>
                                    </button>
                                <?php elseif($data['status']==2): ?>
                                    <button type="button" class="btn btn-sm btn-success" title="EDIT"
                                      onclick="delete_master(<?php echo $data['id'].',1' ?>)"  data-backdrop="static"
                                      data-keyboard="false"><?= $this->lang->line('active')?>
                                <?php endif; ?>
                        
                            </td>
                            <!-- <td>					
							                <button type="button" class="btn btn-sm btn-warning" title="EDIT"
                                    onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                                    data-keyboard="false"><?= $this->lang->line('edit')?></button>
                              <button type="button" class="btn btn-sm btn-danger" title="EDIT"
                                    onclick="delete_master(<?php echo $data['id'] ?>)"  data-backdrop="static"
                                    data-keyboard="false"><?= $this->lang->line('delete')?></button>
                            </td> -->
          </tr>
					<?php 
            $count++;
          endforeach;
		   else:
          ?>
          <tr>
            <td colspan="4" style="text-align: center;"><b><?php echo $this->lang->line('no_data_found'); ?></b></td>
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