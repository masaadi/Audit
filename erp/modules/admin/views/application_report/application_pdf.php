<!DOCTYPE html>
<html lang="en">
<head>
  <?php
      $language = $this->session->userdata("lang_file");
      $this->load->model('admin/report_heading_model');
      $con = "id = 1";
      $report_head= $this->Shows->getThisValue($con, "master_report_heading");  
  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <style>
      #header_table tr td{
          font-size: 12px;
      }
      #header_table tr th{
          font-size: 14px;
      }
      #list_table td, th {  
        border: 1px solid #ddd;
        text-align: left;
      }

      #list_table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
      }

      #list_table th {
        padding: 1px;
        <?php if($language =="bn"): ?>
          font-size: 12px !important;
        <?php else: ?>
          font-size: 10px !important;
        <?php endif; ?>
        font-weight: bold;
      }
      #list_table td {
        padding: 5px;
        <?php if($language =="bn"): ?>
          font-size: 14px !important;
        <?php else: ?>
          font-size: 11px !important;
        <?php endif; ?>
      }
      /*new*/
      .row {
          /*display: -ms-flexbox;*/
          display: flex;
          /*-ms-flex-wrap: wrap;*/
          flex-wrap: wrap;
          margin-right: -15px;
          margin-left: -15px;
      }
      .text-center {
          text-align: center!important;
      }
      .col-12 {
          -ms-flex: 0 0 100%;
          flex: 0 0 100%;
          max-width: 100%;
      }
      h5 {
          font-size: 18px;
      }
      h1, h2, h3, h4, h5, h6 {
          margin: 0;
          color: #111111;
          font-weight: 500;
          <?php if($language !="bn"): ?>
            font-family: "PT Sans", sans-serif;
          <?php endif; ?>
      }

      .p_lcass{
          font-size: 16px;
          color: #858585;
          <?php if($language !="bn"): ?>
            font-family: "PT Sans", sans-serif;
          <?php endif; ?>
          font-weight: 400;
          line-height: 28px;
          margin: 0 0 15px 0;
      }
  </style>
</head>
<body>

  <div class="row" style='margin-top:-100px'>
      <div class="col-12 text-center">
          <table width='100%' id="header_table" style='border: none !important;'>
              <tr>
                  <td class='text-right'>
                    <img width='60px' src='<?= pdf_path().$report_head[0]->logo_url ?>'>
                  </td>
                  <td class='text-center' >
                      <br><br><br>
                      <div style='line-height:30px' >
                          <?php if($language =="bn"): ?>

                          <h1 class="mb-0"><?= $report_head[0]->report_heading_name_bn ?></h1>
                          <p class="p_lcass" style="font-size: 15px;"><?= $report_head[0]->address_bn ?></p>   

                          <?php else: ?>

                          <h5 class="mb-0"><?= $report_head[0]->report_heading_name ?></h5>
                          <p class="p_lcass"><?= $report_head[0]->address ?></p>

                          <?php endif ?>
                          <br>
                          <h5><?= $this->lang->line('application_report') ?> </h5>

                      </div>
                  </td>
                  <td class='text-left'>
                      <img width='60px' src='<?= pdf_path().$report_head[0]->right_logo ?>'>
                  </td>
              </tr>
          </table>
      </div>
  <div>  

<table id="list_table">
  <tr>
      <th style="width: 30px;"><?= $this->lang->line('sl')?></th>
      <th style="width: 240px;"><?= $this->lang->line('application_id')?></th>
      <th style="width: 240px;"><?= $this->lang->line('date')?></th>
      <th style="width: 240px;"><?= $this->lang->line('name')?></th>
      <th style="width: 140px;"><?= $this->lang->line('organization_name')?></th>
      <th style="width: 140px;"><?= $this->lang->line('industry_type')?></th>
      <th style="width: 140px;"><?= $this->lang->line('status')?></th>
      <th style="width: 140px;"><?= $this->lang->line('type')?></th>
  </tr>
  <tbody>
    <?php
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
      echo '<td colspan="10" class="text_center">'.$this->lang->line('no_data_found').'</td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>

</body>
</html>
