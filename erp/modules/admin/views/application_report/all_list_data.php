<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
      <tr>
          <th style="width: 30px;"><?= $this->lang->line('sl')?></th>
          <th><?= $this->lang->line('application_id')?></th>
          <th><?= $this->lang->line('date')?></th>
          <th style="width: 240px;"><?= $this->lang->line('name')?></th>
          <th style="width: 140px;"><?= $this->lang->line('organization_name')?></th>
          <th style="width: 140px;"><?= $this->lang->line('industry_type')?></th>
          <th style="width: 240px;"><?= $this->lang->line('attached_doc')?></th>
          <th style="width: 140px;"><?= $this->lang->line('status')?></th>
          <th style="width: 140px;"><?= $this->lang->line('type')?></th>
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

        $sl = ($language=='bn') ? Converter::en_to_bn(($offset+$count)) : ($offset+$count);
        $org_name = ($language=='bn') ? $value['org_name_bn'] : $value['org_name'];
        $entre_name = ($language=='bn') ? $value['entre_name_bn'] : $value['entre_name'];
        $application_id = ($language=='bn') ? Converter::en_to_bn($value['application_id']) : $value['application_id'];
        //$destrict_name = getDistrictName($value['pro_district']);
        $app_date = ($language=='bn') ? Converter::en_to_bn(date("d-m-Y",strtotime($value['application_date']))) : date("d-m-Y",strtotime($value['application_date']));

        echo '<tr>';
        echo '<td>'.$sl.'</td>';
        echo '<td class="'.$add_class.'">'.$add_div.' '.$application_id.'</td>';
        echo '<td>'.$app_date.'</td>';
        echo '<td>'.$entre_name.'</td>';
        echo '<td>'.$org_name.'</td>';
        echo '<td>';
        foreach ($types as $type) {
          if($value['industry_type'] == $type['id']){
            echo ($language=='bn') ? $type['type_name_bn'] : $type['type_name'];
          }
        }
        echo '</td>';
        echo '<td>';
        if($value['photo2']!=''){
          echo '<a href="'. base_url().'public/uploads/'.$value['photo2'].'" onclick="window.open(this.href,'. "'name','left=200,top=150,width=800,height=500,toolbar=1,resizable=0'); return false;".'" >'.$this->lang->line('nid').'</a><br>';
        }
        if($value['photo3']!=''){
          echo '<a href="'. base_url().'public/uploads/'.$value['photo3'].'" onclick="window.open(this.href,'. "'name','left=200,top=150,width=800,height=500,toolbar=1,resizable=0'); return false;".'" >'.$this->lang->line('birth_certificate').'</a><br>';
        }
        if($value['photo4']!=''){
          echo '<a href="'. base_url().'public/uploads/'.$value['photo4'].'" onclick="window.open(this.href,'. "'name','left=200,top=150,width=800,height=500,toolbar=1,resizable=0'); return false;".'" >'.$this->lang->line('trade_license').'</a><br>';
        }
        if($value['photo5']!=''){
          echo '<a href="'. base_url().'public/uploads/'.$value['photo5'].'" onclick="window.open(this.href,'. "'name','left=200,top=150,width=800,height=500,toolbar=1,resizable=0'); return false;".'" >'.$this->lang->line('m_a').'</a><br>';
        }
        if($value['photo6']!=''){
          echo '<a href="'. base_url().'public/uploads/'.$value['photo6'].'" onclick="window.open(this.href,'. "'name','left=200,top=150,width=800,height=500,toolbar=1,resizable=0'); return false;".'" >'.$this->lang->line('incorporation_certificate').'</a><br>';
        }
         if($value['photo7']!=''){
          echo '<a href="'. base_url().'public/uploads/'.$value['photo7'].'" onclick="window.open(this.href,'. "'name','left=200,top=150,width=800,height=500,toolbar=1,resizable=0'); return false;".'" >'.$this->lang->line('partnership_agreement').'</a>';
        }
        $additional_documents = getAdditionalDocument($value['end_id']);
        if($additional_documents){ 
          foreach($additional_documents as $ad){
            if(!empty($ad->file_name) && !empty($ad->title)){
              echo '<a href="'. base_url().'public/uploads/'.$ad->file_name.'" onclick="window.open(this.href,'. "'name','left=200,top=150,width=800,height=500,toolbar=1,resizable=0'); return false;".'" >'.$ad->title.'</a><br>';
            }
          }
        }
        echo '</td>';
        echo '<td>';
        if($value['application_status']==1){
          echo '<b class="text-warning">'.$this->lang->line('pending').'</b>';
        }
        elseif($value['application_status']==2){
          echo '<b class="text-success">'.$this->lang->line('reviewed').'</b>'; 
        }
        elseif($value['application_status']==3){
          echo '<b class="text-warning">'.$this->lang->line('approched_for_inspection').'</b>'; 
        }
        elseif($value['application_status']==4){
          echo '<b class="text-warning">'.$this->lang->line('approched_for_inspection').'</b>'; 
        }
        elseif($value['application_status']==5){
          echo '<b class="text-warning">'.$this->lang->line('inspected').'</b>'; 
        }
        elseif($value['application_status']==6){
          echo '<b class="text-warning">'.$this->lang->line('approve_review').'</b>'; 
        }
        elseif($value['application_status']==7){
          echo '<b class="text-warning">'.$this->lang->line('payment').'</b>'; 
        }
        elseif($value['application_status']==8){
          echo '<b class="text-warning">'.$this->lang->line('delivered').'</b>'; 
        }
        elseif ($value['application_status']==9 && empty($value['approche_insp_date'])) {
          echo '<b class="text-danger">'.$this->lang->line('revised').'</b>';
        }elseif ($value['application_status']==9 && !empty($value['approche_insp_date'])) {
          echo '<b class="text-danger">'.$this->lang->line('revised').'</b>';
        }
        echo '</td>';
        echo '<td>';
        if($value['aps_status']==1){
          echo '<b class="text-success">'.$this->lang->line('new').'</b>'; 
        }
        elseif($value['aps_status']==2){
          echo '<b class="text-warning">'.$this->lang->line('resubmission').'</b>'; 
        }
        elseif($value['aps_status']==3){
          echo '<b class="text-success">'.$this->lang->line('renew').'</b>'; 
        }
        echo "</td>";

        echo '<td class="pr-0">';
        echo '<button type="button" onclick="show_preview('.$value['id'].')" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#previewModal" title="'.$this->lang->line('view_info').'"><i class="mdi mdi-view-list"></i></button>';
        echo '</td>';
        echo '</tr>';
        $count++;
      }
    }else{
      echo '<tr>';
      echo '<td colspan="11" class="text_center">'.$this->lang->line('no_data_found').'</td>';
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