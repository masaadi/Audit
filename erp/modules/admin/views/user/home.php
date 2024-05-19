<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
      <tr>
          <th style="width: 5%"><?= $this->lang->line('sl')?></th>                            
          <th style="width: 20%"><?= $this->lang->line('name')?></th>
					<th style="width: 20%"><?= $this->lang->line('username')?></th>
					<th style="width: 10%"><?= $this->lang->line('email')?></th>
          <th style="width: 20%"><?= $this->lang->line('usertype')?></th>             
          <th style="width: 20%"><?= $this->lang->line('current_status')?></th>             
          <th style="width: 20%"><?= $this->lang->line('user_privilege')?></th>							
          <th style="width: 20%"><?= $this->lang->line('action')?></th>
      </tr>
  </thead>
  <tbody>
		<?php 
      if (!empty($wings)):
				$count = $loop_start + 1;
				$language = $this->session->userdata("lang_file");
				foreach ($wings as $data):
    ?>
          <tr>
            	<td><?php echo ($language =="bn") ? Converter::en_to_bn($count) : $count ;?></td>
              <td><?php echo $data['full_name'] ?></td>
              <td><?php echo $data['username'] ?></td>
              <td><?php echo $data['email'] ?></td>
              <td><?php echo $data['role_name'] ?></td>
              <td>
                <?php  if($data['status_id']==0): ?>
                  <span class="btn btn-xs btn-danger">Inactive</span>
                <?php  elseif($data['status_id']==1): ?>
                  <span class="btn btn-xs btn-success">Active</span>
                <?php  elseif($data['status_id']==2): ?>
                  <span class="btn btn-xs btn-warning">Verify email</span>
                <?php endif; ?>
              </td>
              <td><?php echo $data['user_privilege'] ?></td>
              <td>
                <button type="button" class="btn btn-sm btn-warning" title="EDIT" onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static" data-keyboard="false"><?= $this->lang->line('edit')?>
                </button>
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