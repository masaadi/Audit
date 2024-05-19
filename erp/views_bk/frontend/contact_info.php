
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
        <td><?php echo Converter::en_to_bn($office[0]->contact_no);?></td>
      </tr>

      <?php if($office_category_id==3): ?>
        <tr>
          <td><?= $this->lang->line('regional_office_name') ?></td>
          <td>
            <?php 
              if($office[0]->region_id){
                echo getRegionName($office[0]->region_id);
              }
            ?>
          </td>
        </tr>
      <?php endif; ?>

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

      <?php if($office_category_id==3): ?>
        <tr>
          <td><?= $this->lang->line('regional_office_name') ?></td>
          <td>
            <?php 
              if($office[0]->region_id){
                echo getRegionName($office[0]->region_id);
              }
            ?>
          </td>
        </tr>
      <?php endif; ?>

    </table>


  <?php } ?>


  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $this->lang->line('close') ?></button>
  </div>







