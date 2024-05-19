<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
    <tr>
      <th style="width: 5%">Sl.</th>
      <th style="width: 20%">Teletalk Number</th>
			<th style="width: 20%">Employee Name</th>
			<th style="width: 10%">Training Titile</th>
      <th style="width: 20%">Training Institute</th>
      <th style="width: 20%">Training Start Date</th>
      <th style="width: 20%">Training End Date</th>
      <th style="width: 20%">Training Duration</th>
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
              <td><?php echo $data['employee_id'] ?></td> 
              <td><?php echo $data['employee_name'] ?></td>
              <td><?php echo $data['title'] ?></td>
              <td><?php echo $data['institute'] ?></td>
              <td><?php echo $data['start_date'] ?></td>
              <td><?php echo $data['end_date'] ?></td>
              <td><?php echo $data['duration'] ?></td>

              <td>
                <button type="button" class="btn btn-sm btn-warning mt-1" title="EDIT"
                      onclick="show_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                      data-keyboard="false">Show</button>
							  <button type="button" class="btn btn-sm btn-warning mt-1" title="EDIT"
                      onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                      data-keyboard="false">Edit</button>
              </td>
      </tr>
		<?php 
      $count++;
      endforeach;
		  else:
    ?>
      <tr>
        <td colspan="9" style="text-align: center;"><b><?php echo $this->lang->line('no_data_found'); ?></b></td>
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