<?php

    $language = $this->session->userdata("lang_file");
?>
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
                            <form action='<?php echo base_url() . 'admin/profile/generateListPdf' ?>' method='post'>
                                <input type="hidden" name="id" value="<?php echo $array[0]->id ?>">
                                <input type="submit" class="btn btn-success btn-sm pull-right mr-1" value="<?= $this->lang->line('download') ?>">
                            </form> 
                        </div>
                    <div class='row'>
                        <div class='col-md-3'>
                            <div class='text-left'>
                                <?php if($array[0]->photo): ?>
                                    <img src="<?= file_url($array[0]->photo) ?>" width='140px'>
                                <?php else: ?>
                                    <img src="<?= file_url('avatar.jpg') ?>" width='140px'>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class='col-md-9'>
                            <table  style='position:absolute;bottom:0;left:0'>
                                <tr>
                                    <td><?= $array[0]->full_name ?> </td>
                                </tr>
                                <tr> 
                                    <td><i class='fa fa-phone text-primary'></i>  <?= $array[0]->mobile ?> </td>
                                </tr>
                                <tr>
                                    <td> <i class='fa fa-envelope-o text-primary'></i>  <?= $array[0]->email ?> </td>
                                </tr>
                              
                            </table>
                        </div>
                    </div>
                    
                
                   <div class='mt-4'>
                    <p class='bg-secondary text-light' style='border:1px solid gray;padding: 2px;padding-left: 10px;font-weight: bold;'><?= $this->lang->line('personal_information') ?></p>
                   </div>
                   <table class='table table-striped table-bordered'>
                       
                        <tr>
                            <td style='font-weight:bold'>Username</td>
                            <td> :  <?= $array[0]->username ?></td>
                            <td style='font-weight:bold'>Employee Id</td>
                            <td> : <?= $array[0]->employee_id ?></td>
                        </tr>
                        
                        <tr>
                            <td style='font-weight:bold'>Office Name</td>
                            <td> :  <?= $array[0]->office_name ?></td>
                            <td style='font-weight:bold'>Designation</td>
                            <td> : <?= $array[0]->designation_name ?></td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold'>Phone</td>
                            <td> :  <?= $array[0]->mobile ?></td>
                            <td style='font-weight:bold'>E-mail</td>
                            <td> : <?= $array[0]->email ?></td>
                        </tr>
                        
                        <tr>
                            <td style='font-weight:bold'><?= $this->lang->line('address') ?></td>
                            <td colspan='3'> :  <?= ($language=='bn')? $array[0]->address_bn : $array[0]->address ?></td>
                        </tr>
                   </table>

                  

                </div>
              </div>
            </div>
          </div>
          
        </div>
		