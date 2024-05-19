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
      .list_table td, th {  
        border: 1px solid #ddd;
        text-align: left;
      }

      .list_table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
      }

      .list_table th {
        padding: 5px;
        <?php if($language =="bn"): ?>
          font-size: 12px !important;
        <?php else: ?>
          font-size: 10px !important;
        <?php endif; ?>
        font-weight: bold;
      }
      .list_table td {
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
                                    <?php if($personal_info->emp_photo): ?>
                                    <img src="<?= base_url().$personal_info->emp_photo?>" width='140px'>
                                    <?php else: ?>
                                        <img src="<?= file_url('avatar.jpg') ?>" width='140px'>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <br><br><br><br><br><br>
                                    <table  style='position:absolute;bottom:0;left:0;margin-left:20px'>
                                        <tr>
                                            <td><?= $personal_info->employee_name ?> </td>
                                        </tr>
                                        <tr> 
                                            <td><i class='fa fa-phone text-primary'></i>  <?= $personal_info->phone ?> </td>
                                        </tr>
                                        <tr>
                                            <td> <i class='fa fa-envelope-o text-primary'></i>  <?= $personal_info->email ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                   <table class='table table-striped table-bordered list_table'>
                        <tr>
                            <td colspan="4" style="text-align:center;font-weight:bold"> Personal Information</td>
                        </tr>
                       
                        <tr>
                            <td style='font-weight:bold'>Employee Name</td>
                            <td> :  <?= $personal_info->employee_name ?></td>
                            <td style='font-weight:bold'>Teletalk Number</td>
                            <td> : <?= $personal_info->employee_id ?></td>
                        </tr>
                        
                        <tr>
                            <td style='font-weight:bold'>Circular Sl. No.</td>
                            <td> :  <?= $personal_info->cpf_no ?></td>
                            <td style='font-weight:bold'>Date Of Birth</td>
                            <td> : <?= $personal_info->dob ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Father's Name</td>
                            <td> :  <?= $personal_info->f_name ?></td>
                            <td style='font-weight:bold'>Mother's Name</td>
                            <td> : <?= $personal_info->m_name ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Gender</td>
                            <td> :  <?= $personal_info->gender ?></td>
                            <td style='font-weight:bold'>Marrital Status</td>
                            <td> : <?= $personal_info->marital_status ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>National ID Number</td>
                            <td> :  <?= $personal_info->cpf_no ?></td>
                            <td style='font-weight:bold'>National ID</td>
                            <td> <?php if(isset($personal_info->nid_photo)):?>
                                  <a href="<?= base_url().$personal_info->nid_photo;?>" target="blank">download here</a>
                                <?php endif;?>
                            </td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Passport</td>
                            <td> :  <?= $personal_info->passport ?></td>
                            <td style='font-weight:bold'>Driving Licence</td>
                            <td> : <?= $personal_info->driving ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Blood Group</td>
                            <td> :  <?= $personal_info->blood_group ?></td>
                            <td style='font-weight:bold'>E-mail</td>
                            <td> : <?= $personal_info->driving ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Phone</td>
                            <td> :  <?= $personal_info->passport ?></td>
                            <td style='font-weight:bold'>Emergency Contact Person Name</td>
                            <td> : <?= $personal_info->emergency_name ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Emergency Contact Person Phone</td>
                            <td> :  <?= $personal_info->emergency_phone ?></td>
                            <td style='font-weight:bold'>Relation with Emergency Contact Person</td>
                            <td> : <?= $personal_info->relation ?></td>
                        </tr>
                    </table> <br>
                    <table class='table table-striped table-bordered list_table'>

                        <tr>
                            <td colspan="4" style="text-align:center"> Present Address</td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Address Detail</td>
                            <td> :  <?= $personal_info->pre_address ?></td>
                            <td style='font-weight:bold'>Upazilla</td>
                            <td> : <?= $personal_info->pre_upazila ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>District</td>
                            <td> : <?= $personal_info->pre_district ?></td>
                            <td style='font-weight:bold'>Division</td>
                            <td> : <?= $personal_info->pre_division ?></td>
                        </tr>
                    </table> <br>
                    <table class='table table-striped table-bordered list_table'>

                        <tr>
                            <td colspan="4" style="text-align:center"> Permanent Address</td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Address Detail</td>
                            <td> :  <?= $personal_info->per_address ?></td>
                            <td style='font-weight:bold'>Upazilla</td>
                            <td> : <?= $personal_info->per_upazila ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>District</td>
                            <td> :  <?= $personal_info->per_district ?></td>
                            <td style='font-weight:bold'>Division</td>
                            <td> : <?= $personal_info->per_division ?></td>
                        </tr>
                   </table> <br>

                   <table class='table table-striped table-bordered list_table'>

                        <tr>
                            <td colspan="4" style="text-align:center;font-weight: bold"> Job Information</td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Joining Date</td>
                            <td> :  <?= $job_info->current_joining ?></td>
                            <td style='font-weight:bold'>Office Name</td>
                            <td> : <?= $job_info->current_office ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Section Name</td>
                            <td> :  <?= $job_info->section_name ?></td>
                            <td style='font-weight:bold'>Designation</td>
                            <td> : <?= $job_info->current_desig ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Posting Status</td>
                            <td> :  <?= $job_info->posting_status ?></td>
                            <td style='font-weight:bold'>Salary Grade</td>
                            <td> : <?= $job_info->current_grade ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Salary Scale</td>
                            <td> :  <?= $job_info->current_scale ?></td>
                            <td style='font-weight:bold'>Basic Salary</td>
                            <td> : <?= $job_info->current_basic ?></td>
                        </tr>
                    </table> <br>

                   <table class='table table-striped table-bordered list_table'>
                        <tr>
                            <td colspan="4" style="text-align:center"> Joining Job Information</td>
                        </tr>
                       
                        <tr>
                            <td style='font-weight:bold'>Employee Name</td>
                            <td> :  <?= $job_info->employee_name ?></td>
                            <td style='font-weight:bold'>Employee Id</td>
                            <td> : <?= $job_info->employee_id ?></td>
                        </tr>
                        
                        <tr>
                            <td style='font-weight:bold'>Joining Date</td>
                            <td> :  <?= $job_info->joining_date ?></td>
                            <td style='font-weight:bold'>Office Name</td>
                            <td> : <?= $job_info->joining_office ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Designation</td>
                            <td> :  <?= $job_info->joining_desig ?></td>
                            <td style='font-weight:bold'>Salary Grade</td>
                            <td> : <?= $job_info->joining_grade ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Salary Scale</td>
                            <td> :  <?= $job_info->joining_scale ?></td>
                            <td style='font-weight:bold'>Salary Basic</td>
                            <td> : <?= $job_info->joining_salary ?></td>
                        </tr>
                    </table> <br>
                    
                    <table class='table table-striped table-bordered list_table'>

                        <tr>
                            <td colspan="4" style="text-align:center;"> Others Information</td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Employee Type</td>
                            <td> :  <?= $job_info->type_name ?></td>
                            <td style='font-weight:bold'>Employee Class</td>
                            <td> : <?= $job_info->emp_class ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Quota</td>
                            <td> :  <?php if($job_info->quota == '1'){echo "Yes";}else{echo "No";} ?></td>
                            <td style='font-weight:bold'>Quota Information</td>
                            <td> : 
                            <?php
                                if($job_info->quota == '1'){echo "Freedom Fighter";}
                                elseif($job_info->quota == '2'){echo "Physically challenged";}
                                elseif($job_info->quota == '3'){echo "Ethnic";}
                                elseif($job_info->quota == '4'){echo "Women";}
                                elseif($job_info->quota == '5'){echo "Others";}
                                else{echo "-";}
                            ?>                                
                            </td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Quota Type</td>
                            <td> : 
                                <?php 
                                    if($job_info->quota == '1'){echo "Freedom Fighter";}
                                    elseif($job_info->quota == '2'){echo "Freedom Fighter Son/Daughter ";}
                                    elseif($job_info->quota == '3'){echo "Freedom Fighter Grandson/Granddaughter ";}
                                    else{echo "-";}
                                ?>                                
                            </td>
                            <td style='font-weight:bold'>District</td>
                            <td> : <?= $job_info->district_name ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>PRL Date</td>
                            <td> :  <?= $job_info->prl_date ?></td>
                            <td style='font-weight:bold'>Responsibility Details</td>
                            <td> : <?= $job_info->detail ?></td>
                        </tr>                      
                        
                   </table>


                   <table class='table table-striped table-bordered list_table'>
                        <tr>
                            <td colspan="4" style="text-align:center;"> Seniority Information</td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Seniority Position</td>
                            <td> :  <?= $seniority_info->position ?></td>
                        </tr>                       
                        
                   </table>

                   <table class='table table-striped table-bordered list_table'>

                        <tr>
                            <td colspan="4" style="text-align:center;font-weight:bold"> Family Information</td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Spouse Name</td>
                            <td> :  <?= $family_info->spouse_name ?></td>
                            <td style='font-weight:bold'>Occupation</td>
                            <td> : <?= $family_info->occupation ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Organization</td>
                            <td> :  <?= $family_info->organization ?></td>
                            <td style='font-weight:bold'>Designation</td>
                            <td> : <?= $family_info->designation ?> </td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>qualification</td>
                            <td> :  <?= $family_info->qualification ?></td>
                            <td style='font-weight:bold'>work_address</td>
                            <td> : <?= $family_info->work_address ?> </td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>gender</td>
                            <td> :  <?= $family_info->gender ?></td>
                            <td style='font-weight:bold'>contact</td>
                            <td> : <?= $family_info->contact ?> </td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>district</td>
                            <td> :  <?= $family_info->district ?></td>
                        </tr>
                        
                        
                        
                   </table>

                   <table class='table table-striped table-bordered list_table'>

                        <tr>
                            <td colspan="6" style="text-align:center"> Child Information</td>
                        </tr>
                        <?php foreach($child_info as $ch_info):?>
                        <tr>
                            <td style='font-weight:bold'>Child Name</td>
                            <td> :  <?= $ch_info->child_name ?></td>
                            <td style='font-weight:bold'>Gender</td>
                            <td> : <?= $ch_info->gender ?></td>
                            <td style='font-weight:bold'>Date Of Birth</td>
                            <td> : <?= $ch_info->date_of_birth ?></td>
                        </tr>
                        <?php endforeach;?>
                   </table> <br>

                   <table class='table table-striped table-bordered list_table'>

                        <tr>
                            <td colspan="6" style="text-align:center;font-weight:bold"> Education Information</td>
                        </tr>                        
                        <tr>
                            <td>Exam Name</td>                            
                            <td>Subject</td>                            
                            <td>Institute</td>                            
                            <td>Passing Year</td>                           
                            <td>Result</td>                            
                            <td>Board</td>                            
                        </tr>
                        <?php foreach($education_info as $edu_info):?>
                        <tr>
                            <td><?= $edu_info->exam_name ?></td>
                            <td><?= $edu_info->subject ?></td>
                            <td><?= $edu_info->institute ?></td>
                            <td><?= $edu_info->passing_year ?></td>
                            <td><?= $edu_info->result ?></td>
                            <td><?= $edu_info->board ?></td>
                        </tr>
                        <?php endforeach;?>
                   </table> <br>

                   <table class='table table-striped table-bordered list_table'>

                        <tr>
                            <td colspan="9" style="text-align:center;font-weight:bold"> Training Information</td>
                        </tr>                        
                        <tr>
                            <td>Training Type</td>                            
                            <td>Topics</td>                            
                            <td>Title</td>                           
                            <td>Place</td>                            
                            <td>Institute</td>                            
                            <td>Institute_address</td>                            
                            <td>Start_date</td>                            
                            <td>End_date</td>                            
                            <td>Duration</td>                            
                        </tr>
                        <?php foreach($training_info as $train_info):?>
                        <tr>
                            <td>
                                <?php if($train_info->training_type == '1'){echo "National";}else{
                                    echo "International";}  ?>                                
                            </td>
                            <td><?= $train_info->topics ?></td>
                            <td><?= $train_info->title ?></td>
                            <td><?= $train_info->place ?></td>
                            <td><?= $train_info->institute ?></td>
                            <td><?= $train_info->institute_address ?></td>
                            <td><?= $train_info->start_date ?></td>
                            <td><?= $train_info->end_date ?></td>
                            <td><?= $train_info->duration ?></td>
                        </tr>
                        <?php endforeach;?>
                   </table> <br>

                   <table class='table table-striped table-bordered list_table'>

                        <tr>
                            <td colspan="2" style="text-align:center;font-weight:bold"> Extra Qualification Information</td>
                        </tr>                        
                        <tr>
                            <td>Qualification</td>                            
                            <td>Details</td>                                                        
                        </tr>
                        <?php foreach($qualification_info as $train_info):?>
                        <tr>
                            <td><?= $train_info->qualification ?></td>
                            <td><?= $train_info->detail ?></td>
                        </tr>
                        <?php endforeach;?>
                   </table> <br>

                    <table class="list_table">
                        <tr>
                            <td style='font-weight:bold'>Signature</td>
                            <td><img style="width:300px; height:80px" src="<?= base_url()?><?= $job_info->signature?>"></td>
                        </tr>
                    </table>
        </div>
			</div>
    </body>
</html>
