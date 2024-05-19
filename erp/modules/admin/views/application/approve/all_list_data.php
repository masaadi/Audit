<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
      <tr>
          <th style="width: 100px;"><?= $this->lang->line('sl')?></th>
          <th style="width: 240px;"><?= $this->lang->line('id')?></th>
          <th style="width: 340px;"><?= $this->lang->line('name')?></th>
          <th style="width: 240px;"><?= $this->lang->line('view_application')?></th>
          <th style="width: 240px;"><?= $this->lang->line('type')?></th>
          <th style="width: 140px;"><?= $this->lang->line('action')?></th>
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
        $add_class = '';
        $add_div = '';
        if($value['is_renew']==1){
          $add_class = 'triangle';
          $add_div = '<div></div>';
        }
        
        $org_name=($language=='bn')?$value['org_name_bn']:$value['org_name'];
        $destrict_name=getDistrictName($value['pro_district']);
        echo '<tr>';
        echo '<td>'.($offset+$count).'</td>';
        echo '<td class="'.$add_class.'">'.$add_div.' '.$value['application_id'].'</td>';
        echo '<td>'.$org_name.'</td>';
        echo '<td>';
        echo '<button type="button" onclick="show_preview('. $value['id'].')" class="btn btn-sm btn-primary btn-icon" data-toggle="modal" data-target="#previewModal" title="View Info">'.$this->lang->line('view').'</button>';
        echo '</td>';
        echo '<td>';
        foreach ($types as $type) {
          if($value['industry_type']==$type['id']){
            echo ($language=='bn')?$type['type_name_bn']:$type['type_name'];
          }
        }
        echo '</td>';
        echo '<td>';
        echo '<button type="button" class="btn btn-sm btn-warning" onclick="show_id('. $value['id'].')" data-toggle="modal" data-target="#openModal">'.$this->lang->line('inspection').'</button>';
        echo '</td>';
        echo '</tr>';
        $count++;
      }
    }else{
      echo '<tr>';
      echo '<td colspan="7" class="text_center">'.$this->lang->line('no_data_found').'</td>';
      echo '</tr>';
    }
    ?>
      
  </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>

<script type="text/javascript">
  function show_id(id){
    $('#contact_id').val(id);
  }
</script>