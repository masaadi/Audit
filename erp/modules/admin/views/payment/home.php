<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%"><?php echo $this->lang->line('sl'); ?></th>
            <th style="width: 20%"><?php echo $this->lang->line('application_id'); ?></th>
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

          $add_class = '';
          $add_div = '';
          if($data['is_renew']==1){
            $add_class = 'triangle';
            $add_div = '<div></div>';
          }

       ?>
              <tr>
                <td><?php echo ($language=='bn') ? Converter::en_to_bn($count) : $count ?></td>
                  <td class=""><?=$add_div?> <?php echo ($language=='bn') ? Converter::en_to_bn($data['application_id']) : $data['application_id'] ?></td>  
                  <td><?php echo ($language=='bn') ? $data['entre_name_bn'] : $data['entre_name'] ?></td>  
                  <td><?= ($language=='bn') ? Converter::en_to_bn(date("d-m-Y", strtotime($data['created_date']))) : date("d-m-Y", strtotime($data['created_date'])) ?></td>    
                  <td><?php echo ($language=='bn') ? Converter::en_to_bn($data['amount']) : $data['amount'] ?></td> 
                  <td><?php echo ($language=='bn') ? Converter::en_to_bn($data['transaction_no']) : $data['transaction_no'] ?></td>
                  <td>
                 <!--  <?php if($data['status']==2): ?>
                  <button type="button" class="btn btn-sm btn-info mt-1" title="<?php echo $this->lang->line('refund'); ?>"
                          onclick="view_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)"  data-backdrop="static"
                          data-keyboard="false"><?php echo $this->lang->line('refund'); ?></button>
                  <?php else: ?>
                    <span class="badge badge-success">Paid</span>
                  <?php endif; ?> --> 


                  <?php if($data['pay_status']=='pending'): ?>
                    <span class="badge badge-warning">Pending</span>

                  <?php else: ?>
                    <span class="badge badge-success">Paid</span>
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
    <?php if (!empty($total_amount_renew_fee) AND $total_amount_renew_fee->total_amount):?>
      $('#total_renew_amount').text(<?= $total_amount_renew_fee->total_amount ?>) 
    <?php else: ?>  
      $('#total_renew_amount').text('0.00') 
    <?php endif; ?>   
  </script>