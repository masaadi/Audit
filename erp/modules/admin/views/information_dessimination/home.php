<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
    <tr>
      <th style="width: 5%"><?= $this->lang->line('sl')?></th>
      <th style="width: 10%"><?= $this->lang->line('category')?></th>
      <th style="width: 20%"><?= $this->lang->line('name')?></th>
			<th style="width: 20%"><?= $this->lang->line('contact_no')?></th>
			<th style="width: 10%"><?= $this->lang->line('address')?></th>
			<th style="width: 20%"><?= $this->lang->line('reg_off_name')?></th>
      <th style="width: 20%"><?= $this->lang->line('district')?></th>                             
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
              <td><?php echo $data['office_category_name_bn'] ?></td>                           
              <td><?php echo $data['office_name_bn'] ?></td> 
							<td><?php echo Converter::en_to_bn($data['contact_no']) ?></td> 
							<td><?php echo $data['address_bn'] ?></td> 
							<!-- <td><?php //echo $data['regional_office_name_bn'] ?></td>  -->
              <td>
                <?php 
                  if($data['region_id']){
                    echo getRegionName($data['region_id']);
                  }
                ?>
              </td>
              <td><?php echo $data['district_name_bn'] ?></td> 
						<?php else:?>
						  <td><?php echo $count;?></td>
              <td><?php echo $data['office_category_name'] ?></td>                           
              <td><?php echo $data['office_name'] ?></td> 
							<td><?php echo $data['contact_no'] ?></td> 
							<td><?php echo $data['address'] ?></td> 
							<!-- <td><?php echo $data['regional_office_name'] ?></td>  -->
              <td>
                <?php 
                  if($data['region_id']){
                    echo getRegionName($data['region_id']);
                  }
                ?>
              </td> 
              <td><?php echo $data['district_name'] ?></td> 
						<?php endif;?>          
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