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
                        <!--    <form action='<?php echo base_url() . 'hr/personal_info/generateListPdf' ?>' method='post'>-->
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
                            <td colspan="4" style="text-align:center"> Employee Information</td>
                        </tr>
                       
                        <tr>
                            <td style='font-weight:bold'>Employee Name</td>
                            <td> :  <?= $array->employee_name ?></td>
                            <td style='font-weight:bold'>Teletalk Number</td>
                            <td> : <?= $array->employee_id ?></td>
                        </tr>
                        
                        <tr>
                            <td style='font-weight:bold'>GPF No.</td>
                            <td> :  <?= $array->cpf_no ?></td>
                            <td style='font-weight:bold'>Date Of Birth</td>
                            <td> : <?= $array->dob ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Father's Name</td>
                            <td> :  <?= $array->f_name ?></td>
                            <td style='font-weight:bold'>Mother's Name</td>
                            <td> : <?= $array->m_name ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Gender</td>
                            <td> :  <?= $array->gender ?></td>
                            <td style='font-weight:bold'>Marrital Status</td>
                            <td> : <?= $array->marital_status ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>National ID Number</td>
                            <td> :  <?= $array->cpf_no ?></td>
                            <td style='font-weight:bold'>National ID</td>
                            <td> <a href="<?= base_url().$array->nid_photo;?>" target="blank">download here</a></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Passport</td>
                            <td> :  <?= $array->passport ?></td>
                            <td style='font-weight:bold'>Driving Licence</td>
                            <td> : <?= $array->driving ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Blood Group</td>
                            <td> :  <?= $array->blood_group ?></td>
                            <td style='font-weight:bold'>E-mail</td>
                            <td> : <?= $array->driving ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Phone</td>
                            <td> :  <?= $array->passport ?></td>
                            <td style='font-weight:bold'>Emergency Contact Person Name</td>
                            <td> : <?= $array->emergency_name ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>Emergency Contact Person Phone</td>
                            <td> :  <?= $array->emergency_phone ?></td>
                            <td style='font-weight:bold'>Relation with Emergency Contact Person</td>
                            <td> : <?= $array->relation ?></td>
                        </tr>
                    </table> <br>
                    <table class='table table-striped table-bordered'>

                        <tr>
                            <td colspan="4" style="text-align:center"> Present Address</td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Address Detail</td>
                            <td> :  <?= $array->pre_address ?></td>
                            <td style='font-weight:bold'>Upazilla</td>
                            <td> : <?= $array->pre_upazila ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>District</td>
                            <td> :  <?= $array->pre_district ?></td>
                            <td style='font-weight:bold'>Division</td>
                            <td> : <?= $array->pre_division ?></td>
                        </tr>
                    </table> <br>
                    <table class='table table-striped table-bordered'>

                        <tr>
                            <td colspan="4" style="text-align:center"> Permanent Address</td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Address Detail</td>
                            <td> :  <?= $array->per_address ?></td>
                            <td style='font-weight:bold'>Upazilla</td>
                            <td> : <?= $array->per_upazila ?></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold'>District</td>
                            <td> :  <?= $array->per_district ?></td>
                            <td style='font-weight:bold'>Division</td>
                            <td> : <?= $array->per_division ?></td>
                        </tr>
                        
                        
                   </table>

                  

                </div>
              </div>
            </div>
          </div>
          
        </div>
		