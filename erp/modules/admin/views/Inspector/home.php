<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
      <tr>
          <th style="width: 40px;">SL</th>
          <th><?php echo $this->lang->line('employee_id') .'/'.$this->lang->line('name'); ?></th>
          <th style="width: 240px;"><?php echo $this->lang->line('contact_no'); ?></th>
          <th style="width: 240px;"><?php echo $this->lang->line('category'); ?></th>
          <th style="width: 240px;"><?php echo $this->lang->line('office'); ?></th>
          <th style="width: 240px;"><?php echo $this->lang->line('business_type'); ?></th>
          <th style="width: 240px;">Action</th>
      </tr>
  </thead>
  <tbody>
    <?php 
        if (!empty($wings)):
            $count = $loop_start + 1;
            foreach ($wings as $data):?>
                <?php
                $language = $this->session->userdata('lang_file');
                if ($language == "bn"):
                ?>
                    <tr>
                        <td><?php echo Converter::en_to_bn($count);?></td>
                        <td><?php echo $data['inspector_name_id'] ?></td>
                        <td><?php echo $data['contact_no'] ?></td>
                        <td><?php echo $data['office_category_name_bn'] ?></td>
                        <td><?php echo $data['office_name_bn'] ?></td>
                        <td><?php echo str_replace(",","; ",$data['business_type_name_bn']); ?></td>
                        <td>              
                            <button type="button" class="btn btn-sm btn-warning" title="<?php echo $this->lang->line('edit'); ?>" 
                            onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static" 
                            data-keyboard="false"><?php echo $this->lang->line('edit'); ?>
                            </button>
                    
                            <button type="button" class="btn btn-sm btn-danger" title="<?php echo $this->lang->line('delete'); ?>" 
                            onclick="delete_master(<?php echo $data['id'] ?>)"  data-backdrop="static" 
                            data-keyboard="false"><?php echo $this->lang->line('delete'); ?>
                            </button>
                        </td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td><?php echo$count;?></td>
                        <td><?php echo $data['inspector_name_id'] ?></td>
                        <td><?php echo $data['contact_no'] ?></td>
                        <td><?php echo $data['office_category_name'] ?></td>
                        <td><?php echo $data['office_name'] ?></td>
                        <td><?php echo str_replace(",","; ",$data['business_type_name']); ?></td>
                        <td>              
                            <button type="button" class="btn btn-sm btn-warning" title="<?php echo $this->lang->line('edit'); ?>" 
                            onclick="edit_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static" 
                            data-keyboard="false"><?php echo $this->lang->line('edit'); ?>
                            </button>
                    
                            <button type="button" class="btn btn-sm btn-danger" title="<?php echo $this->lang->line('delete'); ?>" 
                            onclick="delete_master(<?php echo $data['id'] ?>)"  data-backdrop="static" 
                            data-keyboard="false"><?php echo $this->lang->line('delete'); ?>
                            </button>
                        </td>
                    </tr>
                <?php endif; ?>    

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