<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
      <tr>
        <th style="width: 5%"><?= $this->lang->line('sl')?></th>                            
        <!-- <th style="width: 20%"><?= $this->lang->line('office_category')?></th> -->
        <th style="width: 20%"><?= $this->lang->line('role')." ".$this->lang->line('name')?></th>
        <!-- <th style="width: 10%"><?= $this->lang->line('sorting_order')?></th> -->
        <!-- <th style="width: 20%"><?= $this->lang->line('action')?></th> -->
      </tr>
  </thead>
  <tbody>
		<?php if (!empty($wings)):
	    $count = $loop_start + 1;
	    $language = $this->session->userdata("lang_file");
				foreach ($wings as $data):?>
          <tr>
  					<td><?php echo ($language =="bn") ? Converter::en_to_bn($count) : $count ;?></td>
            <!-- <td><?php echo $data['office_category_wise_role_name'] ?></td>  -->
  					<td><?php echo ($language =="bn") ? $data['name_bn'] : $data['name'] ?></td> 
            <!-- <td><?php echo ($language =="bn") ? Converter::en_to_bn($data['sorting_order']) : $data['sorting_order']?></td>       					 -->
            <td>					
				      <button type="button" class="btn btn-sm btn-warning" title="EDIT" onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static" data-keyboard="false"><?= $this->lang->line('edit')?>     
              </button>      
              <!-- <button type="button" class="btn btn-sm btn-danger" title="EDIT" onclick="delete_master(<?php echo $data['id'] ?>)"  data-backdrop="static" data-keyboard="false"><?= $this->lang->line('delete')?>
              </button> -->  
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