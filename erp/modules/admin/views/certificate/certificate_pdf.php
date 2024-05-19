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
          font-size: 13px;
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
                          <h5><?= $this->lang->line('certificate')." ".$this->lang->line('report') ?> </h5>

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
      <th style="width: 5%"><?php echo $this->lang->line('sl'); ?></th>
      <th style="width: 20%"><?php echo $this->lang->line('application_id'); ?></th>
      <th style="width: 20%"><?php echo $this->lang->line('certificate_id'); ?></th>
      <th style="width: 20%"><?php echo $this->lang->line('name'); ?></th>
      <th style="width: 20%"><?php echo $this->lang->line('paid_date'); ?></th>
      <th style="width: 20%"><?php echo $this->lang->line('amount'); ?></th>
      <th style="width: 20%"><?php echo $this->lang->line('transaction_no'); ?></th>
      <th style="width: 20%"><?php echo $this->lang->line('status'); ?></th>
  </tr>
  <tbody>
    <?php if (!empty($posts)):
       $language = $this->session->userdata('lang_file');
       $count = $loop_start + 1;
       $total = 0;
        foreach ($posts as $data): 
           $total += $data['amount'];

       ?>
              <tr>
                <td><?php echo ($language=='bn') ? Converter::en_to_bn($count) : $count ?></td>
                  <td><?php echo ($language=='bn') ? Converter::en_to_bn($data['application_id']) : $data['application_id'] ?></td>  
                  <td><?php echo  $data['certificate_no'] ?></td>  
                  
                  <td><?php echo ($language=='bn') ? $data['entre_name_bn'] : $data['entre_name'] ?></td>  
                  <td><?= ($language=='bn') ? Converter::en_to_bn(date("d-m-Y", strtotime($data['created_date']))) : date("d-m-Y", strtotime($data['created_date'])) ?></td>    
                  <td><?php echo ($language=='bn') ? Converter::en_to_bn($data['amount']) : $data['amount'] ?></td> 
                  <td><?php echo ($language=='bn') ? Converter::en_to_bn($data['transaction_no']) : $data['transaction_no'] ?></td> 
                  <td>
                    
                      <?php if(isset($data['process_status']) && $data['certificate_status']!=1): ?>
                        <span class="text-warning" 
                            ><?= $this->lang->line('certificate_ready')?></span>
                      <?php elseif(isset($data['process_status']) && ($data['process_status']==7  || $data['process_status']==8 || $data['is_renew']==1) && isset($data['certificate_status']) && $data['certificate_status']==1): ?>
                        <span class="text-success" 
                            ><?= $this->lang->line('delivered')?></span>
                    <?php endif; ?>

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

</body>
</html>
