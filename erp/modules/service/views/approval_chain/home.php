<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
    <tr>
      <th style="width: 5%">Sl.</th>
      <th style="width: 20%">Service Type Name</th>
			<th style="width: 20%">Approval Step</th>
      <th style="width: 15%">Action</th>
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
              <td><?php echo $data['service_type'];?></td> 
              <td><?php echo $data['total'];?></td> 
              <td>
                <button type="button" class="btn btn-sm btn-warning" title="<?php echo $this->lang->line('edit'); ?>"
                    onclick="edit_master(<?php echo $data['service_type_id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                    data-keyboard="false"><?php echo $this->lang->line('edit'); ?>
                </button>
                <button type="button" class="btn btn-sm btn-warning" title="Show"
                    onclick="show_master(<?php echo $data['service_type_id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                    data-keyboard="false">Show
                </button>
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