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
                        <div class='text-center'>
                            <form action='<?php echo base_url() . 'hr/family_info/generateListPdf' ?>' method='post'>
                                <input type="hidden" name="id" value="<?php echo $spouse_info->id ?>">
                                <input type="submit" class="btn btn-success btn-sm pull-right mr-1" value="Download">
                            </form> 
                        </div>
                    <div class='row'>
                        <div class='col-md-3'>
                            <div class='text-left'>
                                <?php if($spouse_info->emp_photo): ?>
                                    <img src="<?= base_url().$spouse_info->emp_photo?>" width='140px'>
                                <?php else: ?>
                                    <img src="<?= file_url('avatar.jpg') ?>" width='140px'>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class='col-md-9'>
                            <table  style='position:absolute;bottom:0;left:0'>
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
                        </div>
                    </div>
                    
                
                   <div class='mt-4'>
                    <p class='bg-secondary text-light' style='border:1px solid gray;padding: 2px;padding-left: 10px;font-weight: bold;'><?= $this->lang->line('personal_information') ?></p>
                   </div>
                   <table class='table table-striped table-bordered'>
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
                    <table class='table table-striped table-bordered'>

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
            </div>
          </div>
          
        </div>
		