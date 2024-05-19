<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%"><?php echo $this->lang->line('sl'); ?></th>
            
            <th style=""><?php echo $this->lang->line('username'); ?></th>
            <th style=""><?= $this->lang->line('ip_address')?></th>
            <th style=""><?= $this->lang->line('description')?></th>
            <th style=""><?= $this->lang->line('url')?></th>
            <th style=""><?= $this->lang->line('date_time')?></th>
        </tr>
    </thead>
    <tbody>
		<?php if (!empty($wings)):
       $count = $loop_start + 1;
        foreach ($wings as $data):?>

          <?php
              $language = $this->session->userdata('lang_file');
          ?>
              <tr>
                  <td><?php echo $count;?></td>
                  <td><?php echo $data['username'] ?></td>   
                  <td><?php echo $data['ip_address'] ?></td>   
                  <td><?php echo $data['description'] ?></td>   
                  <td>
                    <a class="btn btn-sm btn-warning" href="<?php echo $data['url'] ?>">Details</a>
                  </td>   
                  <td><?php echo $data['date_time'] ?></td>   
                
              </tr>
          

						<?php 
                         $count++;
          endforeach;
		   else:
          ?>
          <tr>
            <td colspan="7" style="text-align: center;"><b><?php echo $this->lang->line('no_data_found'); ?></b></td>
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