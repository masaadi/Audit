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
        padding: 5px;
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

			<div class="row">
             <div class="col-12 text-center">
                <table width='100%' id="header_table" style='border: none !important;'>
                    <tr>
                            <td class='text-right' style="text-align:right">
                                <img width='70px' src='<?php echo base_url() ?>public/uploads/<?= $report_head[0]->logo_url ?>'>
                            </td>
                            <td class='text-center' style="width:320px">
                                <h5 class="mb-0"><?= $report_head[0]->report_heading_name ?></h5>
                                <p class="p_lcass">
                                      <?= $report_head[0]->address ?>
                                </p>
                                <h5 class="mt-1"><?= $this->lang->line('office_report') ?></h5>
                            </td>
                            <td class='text-left' style="text-align:left">
                                <img width='80px' src='<?php echo base_url() ?>public/uploads/<?= $report_head[0]->right_logo ?>'>
                            </td>
                        </tr>
                </table>
				</div>
      </div>
			<div class="row">
				<div class="col-sm-12 mt-2">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td >
                                    <?php if($spouse_info->emp_photo): ?>
                                    <img src="<?= base_url().$spouse_info->emp_photo?>" width='140px'>
                                <?php else: ?>
                                    <img src="<?= file_url('avatar.jpg') ?>" width='140px'>
                                <?php endif; ?>
                                </td>
                                <td>
                                    <br><br><br><br><br><br>
                                    <table  style='position:absolute;bottom:0;left:0;margin-left:20px'>
                                        <tr>
                                    <td><?= $spouse_info->employee_name ?> </td>
                                </tr>
                                <tr> 
                                    <td><i class='fa fa-phone text-primary'></i>  <?= $spouse_info->phone ?> </td>
                                </tr>
                                <tr>
                                    <td> <i class='fa fa-envelope-o text-primary'></i>  <?= $spouse_info->email ?> </td>
                                </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                
                   <div class='mt-4'>
                    <p class='bg-secondary text-light' style='border:1px solid gray;padding: 2px;padding-left: 10px;font-weight: bold;'><?= $this->lang->line('personal_information') ?></p>
                   </div>
                   <table class='table table-striped table-bordered' id="list_table">
                        <tr>
                            <td colspan="4" style="text-align:center"> Spouse Information</td>
                        </tr>
                       
                        <tr>
                            <td style='font-weight:bold'>Spouse Name</td>
                            <td> :  <?= $spouse_info->spouse_name ?></td>
                            <td style='font-weight:bold'>Gender</td>
                            <td> : <?= $spouse_info->gender ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Contact</td>
                            <td> :  <?= $spouse_info->contact ?></td>
                            <td style='font-weight:bold'>Home District</td>
                            <td> : <?= $spouse_info->gender ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Occupation</td>
                            <td> :  <?= $spouse_info->occupation ?></td>
                            <td style='font-weight:bold'>Organization</td>
                            <td> : <?= $spouse_info->organization ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Designation</td>
                            <td> :  <?= $spouse_info->designation ?></td>
                            <td style='font-weight:bold'>Address of Working Place</td>
                            <td> : <?= $spouse_info->work_address ?></td>
                        </tr>

                        
                    </table> <br>
                    <table class='table table-striped table-bordered' id="list_table">

                        <tr>
                            <td colspan="4" style="text-align:center"> Children Information</td>
                        </tr>

                        <tr>
                            <th>Serial</th>
                            <th>Name of Children</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                        </tr>
                        <?php $s = 1; foreach($child_info as $c_info):?>
                        <tr>
                          <td><?php echo $s;?></td>
                          <td><?php echo $c_info->child_name;?></td>
                          <td><?php echo $c_info->gender;?></td>
                          <td><?php echo $c_info->date_of_birth;?></td>                          
                        </tr>
                      <?php $s++; endforeach;?>
                        

                    </table> <br>
                    
        </div>
			</div>
    </body>
</html>
