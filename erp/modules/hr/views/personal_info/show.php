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
                            <form action='<?php echo base_url() . 'hr/personal_info/generateListPdf' ?>' method='post'>
                                <input type="hidden" name="id" value="<?php echo $array->id ?>">
                            </form>
                        </div>
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
                            <td style='font-weight:bold'>Teletalk ID</td>
                            <td> : <?= $array->employee_id ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Gender</td>
                            <td> :  <?= $array->gender ?></td>
							<td style='font-weight:bold'>&nbsp;</td>
							<td> &nbsp;</td>
                        </tr>

                    </table> <br>

                </div>
              </div>
            </div>
          </div>
          
        </div>
