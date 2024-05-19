<div class='col-md-2 pull-right' style="margin-bottom:5px">
    <form action='<?php echo base_url() . 'reports/process_report/generateListPdf' ?>' method='post'>
      <input type="submit" class="btn btn-success btn-sm pull-right mr-1 mt-4" value="Download">
    </form> 
</div>
<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
    <tr>
      <th style="width: 5%">Sl.</th>
      <th style="width: 10%">Registration No.</th>
			<th style="width: 10%">Service Type</th>
      <th style="width: 10%">Teletalk Number</th>
			<th style="width: 10%">Employee Name</th>
      <th style="width: 10%">Registration Date</th>
    </tr>
  </thead>
  <tbody>
		<?php if (!empty($wings)):
      $count = $loop_start + 1;
      foreach ($wings as $data):
		?>
      <tr>
				      <td><?php echo $count;?></td>
              <td><?php echo $data['registration_id'] ?></td> 
              <td><?php echo $data['service_type'] ?></td> 
              <td><?php echo $data['employee_id'] ?></td>  
              <td><?php echo $data['employee_name'] ?></td>
              <td><?php echo $data['created_date'] ?></td>

              <!-- <td>
                <?php if($data['status'] == '0'): ?>
                  <span class="badge badge-pill badge-secondary">Pending</span>
                <?php elseif($data['status'] == 'processing'):?>
                  <span class="badge badge-pill badge-info">Processing</span>
                <?php elseif($data['status'] == 'deny'):?>
                  <span class="badge badge-pill badge-danger">Denied</span>
                <?php elseif($data['status'] == 'completed'):?>
                  <span class="badge badge-pill badge-success">Completed</span>
                <?php endif;?>                  
              </td> -->
              <!-- <td>
                <button type="button" class="btn btn-sm btn-warning mt-1" title="EDIT"
                      onclick="show_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                      data-keyboard="false">Show</button>
                <?php if($this->session->userdata('DX_user_id') == ($data['created_by']) && ($data['status'] == 'deny')):?>
							  <button type="button" class="btn btn-sm btn-warning mt-1" title="EDIT"
                      onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                      data-keyboard="false">Edit</button>
                <?php endif;?>
              </td> -->
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