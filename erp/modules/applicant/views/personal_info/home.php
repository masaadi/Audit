<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
    <tr>
      <th style="width: 5%">Sl.</th>
      <th style="width: 20%">Employee Name</th>
			<th style="width: 20%">Teletalk Number</th>
			<th style="width: 10%">GPF No.</th>
      <th style="width: 20%">Gender</th>
      <th style="width: 15%"><?= $this->lang->line('action')?></th>
    </tr>
  </thead>
  <tbody>
		<?php if (!empty($wings)):
      $count = $loop_start + 1;
      foreach ($wings as $data):
				$language = $this->session->userdata("lang_file");
		?>
      <tr>
				      <td><?php echo $count;?></td>
              <td><?php echo $data['employee_name'] ?></td> 
              <td><?php echo $data['employee_id'] ?></td> 
              <td><?php echo $data['cpf_no'] ?></td>  
              <td><?php echo $data['gender'] ?></td>
              <td>
                <button type="button" class="btn btn-sm btn-warning mt-1" title="EDIT"
                      onclick="show_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                      data-keyboard="false">Show</button>
							  <button type="button" class="btn btn-sm btn-warning mt-1" title="EDIT"
                      onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                      data-keyboard="false">Edit</button>
                <!-- <button type="button" class="btn btn-sm btn-danger mt-1" title="EDIT"
                      onclick="delete_master(<?php echo $data['id'] ?>)"  data-backdrop="static"
                      data-keyboard="false"><?= $this->lang->line('delete')?></button> -->
              </td>
      </tr>
		<?php 
      $count++;
      endforeach;
		  else:
    ?>
      <tr>
        <td colspan="8" style="text-align: center;"><b><?php echo $this->lang->line('no_data_found'); ?></b></td>
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