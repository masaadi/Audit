<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                    <thead>
                        <tr>
                             <th style="width: 5%"><?= $this->lang->line('sl')?></th>
                            
                            <th style="width: 40%"><?= $this->lang->line('name')?></th>
                           
                            <!-- <th style="width: 40%"><?= $this->lang->line('action')?></th> -->
                        </tr>
                    </thead>
                    <tbody>
					<?php if (!empty($wings)):
						   $count = $loop_start + 1;
						   $language = $this->session->userdata("lang_file");
						foreach ($wings as $data):?>
                        <tr>
                            <?php
 						    if($language =="bn"):?>
                            <td><?php echo Converter::en_to_bn($count);?></td>
                            <td><?php echo $data['office_category_name_bn'] ?></td>                           
                            <?php else:?>
							<td><?php echo $count;?></td>
                            <td><?php echo $data['office_category_name'] ?></td>  
							<?php endif;?>                        
                            
                            <td>
							
							 <button type="button" class="btn btn-sm btn-warning" title="EDIT"
                                    onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                                    data-keyboard="false"><?= $this->lang->line('edit')?></button>
                              
                              	 <button type="button" class="btn btn-sm btn-danger" title="EDIT"
                                    onclick="delete_master(<?php echo $data['id'] ?>)"  data-backdrop="static"
                                    data-keyboard="false"><?= $this->lang->line('delete')?></button>
                        
                            </td>
                        </tr>
						<?php 
                         $count++;
          endforeach;
		   else:
          ?>
          <tr>
            <td colspan="3" style="text-align: center;"><b>No data found</b></td>
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