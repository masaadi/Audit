
<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
    <tr>
      <th style="width: 5%">Sl.</th>
      <th style="width: 10%">Service Reg. No.</th>
      <th style="width: 10%">Present Desk</th>
      <th style="width: 10%">Receive Date</th>
      <!-- <th style="width: 10%">Status</th> -->
      <!-- <th>Action</th> -->
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
              <td><?= $data['registration_id'];?></td> 
              <td><?= $data['employee_name'];?></td> 
              <td><?= $data['created_date'];?></td>
              <!-- <td>
                <?php if($data['status'] == 'pending'): ?>
                  <button style="border: 0px" onclick="show_status('<?php echo $data['id'] ?>')">
                    <span class="badge badge-pill badge-secondary">Pending</span>
                  </button>
                  <?php elseif($data['status'] == 'processing'):?>
                  <button style="border: 0px" onclick="show_status('<?php echo $data['id'] ?>')">
                    <span class="badge badge-pill badge-info">Processing</span>
                  </button>                    
                  <?php elseif($data['status'] == 'deny'):?>
                  <button style="border: 0px" onclick="show_query('<?php echo $data['id'] ?>')">
                    <span class="badge badge-pill badge-danger">Query</span>
                  </button>                    
                  <?php elseif($data['status'] == 'completed'):?>
                  <button style="border: 0px" onclick="show_status('<?php echo $data['id'] ?>')">
                    <span class="badge badge-pill badge-success">Completed</span>
                  </button>
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

<script type="text/javascript">
  function show_status(id) {

      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>reports/tracking_report/show_status/' + id,
      success: function (result) {
          if (result) {
              $('.search_form').hide();
             $('.add_button').hide();
            $('#personalInfoList').html(result);
            return false;
        } else {
            return false;
        }
    }
      });
      return false;
  }
</script>