<!-- <div class='col-md-2 pull-right' style="margin-bottom:5px">
    <form action='<?php echo base_url() . 'reports/approved_report/generateListPdf' ?>' method='post'>
      <input type="submit" class="btn btn-success btn-sm pull-right mr-1 mt-4" value="Download">
    </form> 
</div>
 -->
<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
    <tr>
      <th style="width: 5%">Sl.</th>
      <th style="width: 10%">Employee Name</th>
      <th style="width: 10%">Teletalk Number</th>
			<th style="width: 10%">Circular Sl. No.</th>
      <th style="width: 10%">Office</th>
      <th style="width: 10%">Designation</th>
      <th style="width: 10%">Action</th>
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
              <td><?= $data['employee_name'];?></td> 
              <td><?= $data['employee_id'];?></td>
              <td><?= $data['cpf_no'];?></td>
              <td><?= $data['office_name'];?></td>
              <td><?= $data['designation_name'];?></td>
              <td>
                <button type="button" class="btn btn-sm btn-warning" title="Show"
                    onclick="show_master('<?php echo $data['employee_id'] ?>',<?php echo $count1;?>)"  data-backdrop="static"
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