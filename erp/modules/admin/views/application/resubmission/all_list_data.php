<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
      <tr>
          <th style="width: 30px;"><?= $this->lang->line('sl')?></th>
          <th><?= $this->lang->line('id')?></th>
          <th style="width: 240px;"><?= $this->lang->line('name')?></th>
          <th style="width: 140px;"><?= $this->lang->line('address')?></th>
          <th style="width: 140px;"><?= $this->lang->line('type')?></th>
          <th style="width: 240px;"><?= $this->lang->line('attached_doc')?></th>
          <th style="width: 140px;"><?= $this->lang->line('paid')?></th>
          <th style="width: 140px;"><?= $this->lang->line('status')?></th>
          <th style="width: 140px;"><?= $this->lang->line('note')?></th>
          <th style="width: 140px;"><?= $this->lang->line('date')?></th>
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
        $org_name=($language=='bn')?$value['org_name_bn']:$value['org_name'];
        $destrict_name=getDistrictName($value['pro_district']);
        echo '<tr>';
        echo '<td>'.($offset+$count).'</td>';
        echo '<td>'.$value['application_id'].'</td>';
        echo '<td>'.$org_name.'</td>';
        echo '<td>'.$destrict_name.'</td>';
        echo '<td>';
        foreach ($types as $type) {
          if($value['industry_type']==$type['id']){
            echo ($language=='bn')?$type['type_name_bn']:$type['type_name'];
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
        // echo '<td>'.$fees[0]['app_form_fees'].'</td>';
        // echo '<td>'.getFees($value['id'])[0]->amount.'</td>';
        echo '<td>';
        if(isset(getFees($value['id'])[0]->amount))
        { 
          echo getFees($value['id'])[0]->amount;
        } else{
          echo '';
        }
        echo '</td>';
        echo '<td>';
        if($value['process_status']==1&&$value['status']==5){
          echo '<b class="text-warning">'.$this->lang->line('pending').'</b>';
        }elseif ($value['process_status']==9&&$value['status']==5) {
          echo '<b class="text-danger">'.$this->lang->line('revised').'</b>';
        }else if($value['process_status']==2){
          echo '<b class="text-success">'.$this->lang->line('reviewed').'</b>'; 
        }
        echo '</td>';
        echo '<td>';
        $string = strip_tags($value['notes']);
        if (strlen($string) > 100) {
          $stringCut = substr($string, 0, 100);
          $endPoint = strrpos($stringCut, ' ');
          $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
          $string .= '... <a onclick="limitTextLength('.$value['id'].')" class="a-link" data-toggle="modal" data-target="#CommonModal">'.$this->lang->line('read_more').'</a>';
        }
        echo $string;
        echo '</td>';
        echo '<td>'.$value['created_date'].'</td>';

        echo '<td class="pr-0 pl1">';
        echo '<button type="button" onclick="show_preview('.$value['id'].')" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#previewModal" title="'.$this->lang->line('view_info').'"><i class="mdi mdi-view-list"></i></button>';
        if($value['process_status']==1&&$value['status']==5){
           echo '<button type="button" class="btn btn-sm btn-warning btn-rounded btn-icon" onclick="show_id('. $value['id'].')" data-toggle="modal" data-target="#openModal">'.'<i class="mdi mdi-view-list" title="'.$this->lang->line('review').'">'.'</button>';
        }
        echo '</td>';
        echo '</tr>';
        $count++;
      }
    }else{
      echo '<tr>';
      echo '<td colspan="10" class="text_center">'.$this->lang->line('no_data_found').'</td>';
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