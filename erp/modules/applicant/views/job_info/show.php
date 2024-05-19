 <style type="text/css">
     .table td img {
    width: 300px;
    height: 80px;
    border-radius: 0%; 
}
 </style>
 <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
              <h2 class="add_button">
                      <button onclick="javascript:location.reload(true)" type="button"
                      class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
                      data-backdrop="static"
                      data-keyboard="false"><i class="fa fa-chevron-left" style='font-size:15px;color:green' aria-hidden="true"></i> <?= $this->lang->line('back')?></button>
                    </h2> 
                <div class="card-body p-5">
                        <!--<div class='text-center'>-->
                        <!--    <form action='<?php echo base_url() . 'hr/job_info/generateListPdf' ?>' method='post'>-->
                        <!--        <input type="hidden" name="id" value="<?php echo $array->id ?>">-->
                        <!--        <input type="submit" class="btn btn-success btn-sm pull-right mr-1" value="Download">-->
                        <!--    </form> -->
                        <!--</div>-->
                    <div class='row'>
                        <div class='col-md-3'>
                            <div class='text-left'>
                                <?php if($array->emp_photo): ?>
                                    <img src="<?= base_url().$array->emp_photo?>" width='140px'>
                                <?php else: ?>
                                    <img src="<?= file_url('avatar.jpg') ?>" width='140px'>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class='col-md-9'>
                            <table  style='position:absolute;bottom:0;left:0'>
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
                        </div>
                    </div>
                    
                
                   <div class='mt-4'>
                    <p class='bg-secondary text-light' style='border:1px solid gray;padding: 2px;padding-left: 10px;font-weight: bold;'><?= $this->lang->line('personal_information') ?></p>
                   </div>
                   <table class='table table-striped table-bordered'>
                        <tr>
                            <td colspan="4" style="text-align:center"> Joining Job Information</td>
                        </tr>
                       
                        <tr>
                            <td style='font-weight:bold'>Employee Name</td>
                            <td> :  <?= $array->employee_name ?></td>
                            <td style='font-weight:bold'>Teletalk Number</td>
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
                    <table class='table table-striped table-bordered'>

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
                    <table class='table table-striped table-bordered'>

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
            </div>
          </div>
          
        </div>
		