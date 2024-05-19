<?php  if(isset($renew_allow_from)) { var_dump($renew_allow_from); } ?>
<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%"><?php echo $this->lang->line('sl'); ?></th>
            <th style="width: 20%"><?php echo $this->lang->line('application_id'); ?></th>

            <?php if(isset($wings[0]['certificate_no'])): ?>
              <th style="width: 20%"><?php echo $this->lang->line('certificate_id'); ?></th>
              <th style="width: 20%"><?php echo $this->lang->line('view'); ?></th>
            <?php endif; ?>

            <th style="width: 20%"><?php echo $this->lang->line('name'); ?></th>
            <th style="width: 20%"><?php echo $this->lang->line('paid_date'); ?></th>
            <th style="width: 20%"><?php echo $this->lang->line('amount'); ?></th>
            <th style="width: 20%"><?php echo $this->lang->line('transaction_no'); ?></th>
            
            <th style="width: 20%"><?php echo $this->lang->line('action'); ?></th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($wings)):
       $language = $this->session->userdata('lang_file');
       $count = $loop_start + 1;
       $total = 0;
        foreach ($wings as $data): 
           $total += $data['amount'];

       ?>
              <tr>
                <td><?php echo ($language=='bn') ? Converter::en_to_bn($count) : $count ?></td>
                  <td><?php echo ($language=='bn') ? Converter::en_to_bn($data['application_id']) : $data['application_id'] ?></td>  
                 
                  <?php if(isset($data['certificate_no'])): ?>
                    <td><?php echo  $data['certificate_no'] ?></td>  
                    <td>

                      <?php if(isset($data['certificate_status']) && $data['certificate_status']==1): 
                        echo '<a href="'. base_url().'public/uploads/certificates/'.$data['ren_certificate_name_pdf'].'" class="btn btn-sm btn-info mt-1" onclick="window.open(this.href,'. "'name','left=200,top=150,width=800,height=500,toolbar=1,resizable=0'); return false;".'" title="'.$this->lang->line("view").'">'.$this->lang->line('view').'</a>';
                      ?>
                      <?php else: ?>
                        <button type="button" class="btn btn-sm btn-info mt-1" title="<?php echo $this->lang->line('view'); ?>"
                      onclick="preview_master(<?php echo $data['certificate_id'] ?>)"><?php echo $this->lang->line('view'); ?></button>
                      <?php endif; ?>

                    
                  </td>
                  <?php endif; ?>
                  <td><?php echo ($language=='bn') ? $data['entre_name_bn'] : $data['entre_name'] ?></td>  
                  <td><?= ($language=='bn') ? Converter::en_to_bn(date("d-m-Y", strtotime($data['created_date']))) : date("d-m-Y", strtotime($data['created_date'])) ?></td>    
                  <td><?php echo ($language=='bn') ? Converter::en_to_bn($data['amount']) : $data['amount'] ?></td> 
                  <td><?php echo ($language=='bn') ? Converter::en_to_bn($data['transaction_no']) : $data['transaction_no'] ?></td> 
                  <td>
                    <?php if(isset($data['process_status']) && ($data['process_status']==7  || $data['process_status']==8 || $data['is_renew']==1) && isset($data['certificate_status']) && $data['certificate_status']==0): ?>

                      <!-- <button type="button" class="btn btn-sm btn-warning mt-1" title="<?php echo $this->lang->line('delivery'); ?>"
                            onclick="view_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                            data-keyboard="false"><?php echo $this->lang->line('delivery'); ?></button> -->
                            <button type="button" class="btn btn-sm btn-warning deliver-model" onclick="deliver_approve_model(<?php echo $data['id'] ?>,<?php echo $data['payment_id'];?>,<?php echo $data['certificate_id'];?>)" 
                            ><?= $this->lang->line('delivery')?></button>

                      <?php elseif(isset($data['process_status']) && $data['process_status']==6): ?>

                      <?php if(isset($data['certificate_status']) && $data['certificate_status']==1): ?>

                          <span class="text-success" 
                            ><?= $this->lang->line('delivered')?></span>
                        <?php else: ?>

                          <button type="button" class="btn btn-sm btn-warning mt-1" title="<?php echo $this->lang->line('verify'); ?>"
                            onclick="verify_master(<?php echo $data['payment_id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                            data-keyboard="false"><?php echo $this->lang->line('verify'); ?></button>

                        <?php endif; ?>


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
            <td colspan="7" style="text-align: center;"><b><?php echo $this->lang->line('no_data_found'); ?></b></td>
          </tr>
        <?php endif; ?>
		
                    </tbody>
                    
                </table>
        <input type="hidden" name="conditions[]" value='<?php echo isset($conditions) ? $conditions : "" ?>' id="conditions" />
				<?php echo $this->ajax_pagination->create_links(); ?>
                <!-- table -->
                <div class="row p-3">
                  <div class="col-md-9">
                    
                  </div>
                  <div class="col-md-3">
                    <nav aria-label="Page navigation example" class="">
                      <ul class="pagination justify-content-center">
					  
                        
                        <li class="page-item"></li>
                        
                      </ul>
                    </nav>
                  </div>
                </div>

  <script>
    <?php if (!empty($total_amount_form_fee) AND $total_amount_form_fee->total_amount):?>
      $('#total_applicant_amount').text(<?= $total_amount_form_fee->total_amount ?>) 
    <?php else: ?>  
      $('#total_applicant_amount').text('0.00') 
    <?php endif; ?>  
    <?php if (!empty($total_amount_regi_fee) AND $total_amount_regi_fee->total_amount):?>
      $('#total_registration_amount').text(<?= $total_amount_regi_fee->total_amount ?>) 
    <?php else: ?>  
      $('#total_registration_amount').text('0.00') 
    <?php endif; ?>  
  </script>