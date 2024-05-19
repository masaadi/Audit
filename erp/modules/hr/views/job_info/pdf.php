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
                                    <?php if($array->emp_photo): ?>
                                    <img src="<?= base_url().$array->emp_photo?>" width='140px'>
                                    <?php else: ?>
                                        <img src="<?= file_url('avatar.jpg') ?>" width='140px'>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <br><br><br><br><br><br>
                                    <table  style='position:absolute;bottom:0;left:0;margin-left:20px'>
                                        <tr>
                                            <td><?= $array->employee_name ?> </td>
                                        </tr>
                                        <tr> 
                                            <td><i class='fa fa-phone text-primary'></i>  <?= $array->phone ?> </td>
                                        </tr>
                                        <tr>
                                            <td> <i class='fa fa-envelope-o text-primary'></i>  <?= $array->email ?> </td>
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
                            <td colspan="4" style="text-align:center"> Joining Job Information</td>
                        </tr>
                       
                        <tr>
                            <td style='font-weight:bold'>Employee Name</td>
                            <td> :  <?= $array->employee_name ?></td>
                            <td style='font-weight:bold'>Employee Id</td>
                            <td> : <?= $array->employee_id ?></td>
                        </tr>
                        
                        <tr>
                            <td style='font-weight:bold'>Joining Date</td>
                            <td> :  <?= $array->joining_date ?></td>
                            <td style='font-weight:bold'>Office Name</td>
                            <td> : <?= $array->joining_office ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Designation</td>
                            <td> :  <?= $array->joining_desig ?></td>
                            <td style='font-weight:bold'>Salary Grade</td>
                            <td> : <?= $array->joining_grade ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Salary Scale</td>
                            <td> :  <?= $array->joining_scale ?></td>
                            <td style='font-weight:bold'>Salary Basic</td>
                            <td> : <?= $array->joining_salary ?></td>
                        </tr>

                        
                    </table> <br>
                    <table class='table table-striped table-bordered' id="list_table">

                        <tr>
                            <td colspan="4" style="text-align:center"> Current Job Information</td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Joining Date</td>
                            <td> :  <?= $array->current_joining ?></td>
                            <td style='font-weight:bold'>Office Name</td>
                            <td> : <?= $array->current_office ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Section Name</td>
                            <td> :  <?= $array->section_name ?></td>
                            <td style='font-weight:bold'>Designation</td>
                            <td> : <?= $array->current_desig ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Posting Status</td>
                            <td> :  <?= $array->posting_status ?></td>
                            <td style='font-weight:bold'>Salary Grade</td>
                            <td> : <?= $array->current_grade ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Salary Scale</td>
                            <td> :  <?= $array->current_scale ?></td>
                            <td style='font-weight:bold'>Basic Salary</td>
                            <td> : <?= $array->current_basic ?></td>
                        </tr>
                        

                    </table> <br>
                    <table class='table table-striped table-bordered' id="list_table">

                        <tr>
                            <td colspan="4" style="text-align:center"> Others Information</td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Employee Type</td>
                            <td> :  <?= $array->type_name ?></td>
                            <td style='font-weight:bold'>Employee Class</td>
                            <td> : <?= $array->emp_class ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Quota</td>
                            <td> :  <?php if($array->quota == '1'){echo "Yes";}else{echo "No";} ?></td>
                            <td style='font-weight:bold'>Quota Information</td>
                            <td> : 
                            <?php
                                if($array->quota == '1'){echo "Freedom Fighter";}
                                elseif($array->quota == '2'){echo "Physically challenged";}
                                elseif($array->quota == '3'){echo "Ethnic";}
                                elseif($array->quota == '4'){echo "Women";}
                                elseif($array->quota == '5'){echo "Others";}
                                else{echo "-";}
                            ?>                                
                            </td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Quota Type</td>
                            <td> : 
                                <?php 
                                    if($array->quota == '1'){echo "Freedom Fighter";}
                                    elseif($array->quota == '2'){echo "Freedom Fighter Son/Daughter ";}
                                    elseif($array->quota == '3'){echo "Freedom Fighter Grandson/Granddaughter ";}
                                    else{echo "-";}
                                ?>                                
                            </td>
                            <td style='font-weight:bold'>District</td>
                            <td> : <?= $array->district_name ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>PRL Date</td>
                            <td> :  <?= $array->prl_date ?></td>
                            <td style='font-weight:bold'>Responsibility Details</td>
                            <td> : <?= $array->detail ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Signature</td>
                            <td><img src="<?= base_url()?><?= $array->signature?>"></td>
                        </tr>
                        
                        
                   </table>
        </div>
			</div>
    </body>
</html>
