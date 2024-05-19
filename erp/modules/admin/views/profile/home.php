<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%"><?php echo $this->lang->line('sl'); ?></th>
            <th style=""><?php echo $this->lang->line('username'); ?></th>
            <th style=""><?php echo $this->lang->line('name'); ?></th>
            <th style=""><?php echo $this->lang->line('mobile'); ?></th>
            <th style=""><?php echo $this->lang->line('office'); ?></th>
            <th style=""><?php echo $this->lang->line('designation'); ?></th>
            <th style=""><?= $this->lang->line('status')?></th>
            <th style=""><?php echo $this->lang->line('action'); ?></th>
        </tr>
    </thead>
    <tbody>
		<?php if (!empty($wings)):
       $count = $loop_start + 1;
        foreach ($wings as $data):?>
          <tr>
              <td><?php echo $count;?></td>
              <td><?php echo $data['username'] ?></td>  
              <td><?php echo $data['full_name'] ?></td>   
              <td><?php echo $data['mobile'] ?></td>   
              <td><?php echo $data['office_name'] ?></td>   
              <td><?php echo $data['designation_name'] ?></td>   
              <td>
                  <?php if($data['status_id']==1): ?>
                        <span class="btn btn-xs btn-success"><?= $this->lang->line('active')?></span>
                    <?php elseif($data['status_id']==0): ?>
                        <span class="btn btn-xs btn-danger"><?= $this->lang->line('inactive')?></span>
                    <?php endif; ?>
              </td>
              <td>

                      <button type="button" class="btn btn-sm btn-warning mt-1" title="<?php echo $this->lang->line('show'); ?>"
                          onclick="show_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('show'); ?></button>

		                   <button type="button" class="btn btn-sm btn-warning mt-1" title="<?php echo $this->lang->line('edit'); ?>"
                          onclick="edit_master(<?php echo $data['id'] ?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('edit'); ?></button>
                    
                    	 <!-- <button type="button" class="btn btn-sm btn-danger mt-1" title="<?php echo $this->lang->line('delete'); ?>"
                          onclick="delete_master(<?php echo $data['id'] ?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('delete'); ?></button> -->
                          <?php if($data['status_id']==1): ?>
                              <button type="button" class="btn btn-sm btn-danger mt-1" title="<?= $this->lang->line('inactive')?>"
                                onclick="delete_master(<?php echo $data['id'].',2' ?>)"  data-backdrop="static"
                                data-keyboard="false"><?= $this->lang->line('inactive')?>
                              </button>
                          <?php elseif($data['status_id']==0): ?>
                              <button type="button" class="btn btn-sm btn-success mt-1" title="<?= $this->lang->line('active')?>"
                                onclick="delete_master(<?php echo $data['id'].',1' ?>)"  data-backdrop="static"
                                data-keyboard="false"><?= $this->lang->line('active')?>
                          <?php endif; ?>
              
                  </td>
              </tr>

						<?php 
                         $count++;
          endforeach;
		   else:
          ?>
          <tr>
            <td colspan="10" style="text-align: center;"><b><?php echo $this->lang->line('no_data_found'); ?></b></td>
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