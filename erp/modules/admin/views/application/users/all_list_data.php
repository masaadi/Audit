<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
      <tr>
          <th style="width: 30px;"><?= $this->lang->line('sl')?></th>
          <th style="width: 240px;"><?= $this->lang->line('name')?></th>
          <th style="width: 140px;"><?= $this->lang->line('phone_no')?></th>
          <th style="width: 140px;"><?= $this->lang->line('email')?></th>
          <th style="width: 240px;"><?= $this->lang->line('user_name')?></th>
          <th style="width: 140px;"><?= $this->lang->line('status')?></th>
          <th style="width: 140px;"><?= $this->lang->line('date')?></th>
          <th style="width: 200px;"><?= $this->lang->line('action')?></th>
      </tr>
  </thead>
  <tbody>
    <?php
    // echo '<pre>';
    // print_r($posts);
    // echo '</pre>'; 
    $count=1;
    $language = $this->session->userdata('lang_file');
    if(!empty($posts)){
      foreach ($posts as $value) {
        $status=($value['status_id']==1)?'Active':'Inactive';
        echo '<tr>';
        echo '<td>'.($offset+$count).'</td>';
        echo '<td>'.$value['full_name'].'</td>';
        echo '<td>'.$value['mobile'].'</td>';
        echo '<td>'.$value['email'].'</td>';
        echo '<td>'.$value['username'].'</td>';
        echo '<td>'.$status.'</td>';
        echo '<td>'.explode(' ',$value['created'])[0].'</td>';
        
        echo '<td class="pr-0">';
        echo '<button type="button" onclick="show_user('.$value['id'].')" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#userModal" title="'.$this->lang->line('view_info').'"><i class="mdi mdi-view-list"></i></button>&nbsp';
        // echo '<button type="button" class="btn btn-sm btn-warning btn-rounded btn-icon" onclick="show_id('. $value['id'].')" data-toggle="modal" data-target="#openModal">'.'<i class="mdi mdi-view-list" title="'.$this->lang->line('review').'">'.'</button>';
        echo '<button type="button" onclick="change_password('.$value['id'].')" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal"  title="'.$this->lang->line('change_password').'"><i class="mdi mdi-textbox-password"></i></button>&nbsp';

        echo '</td>';
        echo '</tr>';
        $count++;
      }
    }else{
      echo '<tr>';
      echo '<td colspan="8" class="text_center">'.$this->lang->line('no_data_found').'</td>';
      echo '</tr>';
    }
    ?>
      
  </tbody>
</table>
<input type="hidden" name="conditions[]" value='<?php echo isset($conditions) ? $conditions : "" ?>' id="conditions" />

<?php echo $this->ajax_pagination->create_links(); ?>

<script type="text/javascript">
  function show_id(id){
    $('#contact_id').val(id);
  }
</script>