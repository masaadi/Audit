<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%"><?php echo $this->lang->line('sl'); ?></th>
            
            <th style="width: 40%"> <?php echo $this->lang->line('subscriber_name'); ?></th>
            <th style="width: 40%"> <?php echo $this->lang->line('subscriber_email'); ?></th>
           
            <th style="width: 40%"><?php echo $this->lang->line('action'); ?></th>
        </tr>
    </thead>
    <tbody>
		<?php if (!empty($wings)):
       $count = $loop_start + 1;
        foreach ($wings as $data):?>

         
              <tr>
                  <td><?php echo $count ?></td>
                  <td><?php echo $data['subscriber_name'] ?></td>   
                  <td><?php echo $data['subscriber_email'] ?></td>   
                  <td>

                    
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