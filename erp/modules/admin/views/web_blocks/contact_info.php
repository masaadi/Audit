
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"><?= $this->lang->line('office_information') ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
        
 <?php
  $language = $this->session->userdata('lang_file');
  if ($language == "bn"){
      ?>

        
    <table class='table table-bordered' >
      <tr>
        <td width='30%'><?= $this->lang->line('office_name') ?></td>
        <td width='70%'><?php echo $office[0]->office_name_bn;?></td>
      </tr>

      <tr>
        <td><?= $this->lang->line('address') ?></td>
        <td><?php echo $office[0]->address_bn;?></td>
      </tr>

      <tr>
        <td><?= $this->lang->line('contact_no') ?></td>
        <td><?php echo $office[0]->contact_no;?></td>
      </tr>

      <tr>
        <td><?= $this->lang->line('regional_office_name') ?></td>
        <td><?php echo $office[0]->regional_office_name_bn;?></td>
      </tr>

    </table>

  <?php }else{ ?>


    <table class='table table-bordered' >
      <tr>
        <td width='30%'><?= $this->lang->line('office_name') ?></td>
        <td width='70%'><?php echo $office[0]->office_name;?></td>
      </tr>

      <tr>
        <td><?= $this->lang->line('address') ?></td>
        <td><?php echo $office[0]->address;?></td>
      </tr>

      <tr>
        <td><?= $this->lang->line('contact_no') ?></td>
        <td><?php echo $office[0]->contact_no;?></td>
      </tr>

      <tr>
        <td><?= $this->lang->line('regional_office_name') ?></td>
        <td><?php echo $office[0]->regional_office_name;?></td>
      </tr>

    </table>


  <?php } ?>


  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>







