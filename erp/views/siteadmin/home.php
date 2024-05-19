
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th><?php echo $this->lang->line('sl');?></th>
<!--      <th>--><?php //echo $this->lang->line('office_id');?><!--</th>-->
      <th><?php echo $this->lang->line('wing');?></th>
      <th><?php echo $this->lang->line('office_type');?></th>
      <th><?php echo $this->lang->line('office_name');?></th>
      <th><?php echo $this->lang->line('status');?></th>
      <th class="center"><?php echo $this->lang->line('action');?></th>
    </tr>
  </thead>
  <tbody id='table_data'>
   <?php
   if (!empty($offices)):
       $count = $loop_start + 1;
    foreach ($offices as $office):

      $language = $this->session->userdata('lang_file');
      if ($language == "bn"){
        ?>
        <tr>
          <td scope="row"><?php echo Converter::en_to_bn($count) ?></td>
          
          <td scope="row"><?php echo $office['WING_NAME_BN'] ?></td>
          <td scope="row"><?php echo $office['OFFICE_TYPE_NAME_BN'] ?></td>

          <td><?php echo $office['OFFICE_NAME_BN']?></td>
          <td>

           <?php if($office['STATUS'] == 1 ): ?>
            <span><?php echo $this->lang->line('active');?></span>
            <?php else: ?>
             <span><?php echo $this->lang->line('inactive');?></span>
           <?php endif; ?>
         </td>

         <td class="center">
          <div class="btn-group" role="group" aria-label="First group">

           <button   type="button" class="btn btn-primary waves-effect" title="EDIT"  onclick="edit_master(<?php echo $office['ID']?>)"  data-toggle="modal" data-target="#targetModal" data-backdrop="static"
            data-keyboard="false"><i class="material-icons" >edit</i></button>
          </div>

          <?php if($office['STATUS'] == 0) { ?>
            <button  type="button" class="btn btn-danger waves-effect" title="INACTIVE"  onclick="delete_master(<?php echo $office['ID']?>)" data-toggle="modal" data-target="#targetModal" data-backdrop="static"
              data-keyboard="false"><i class="glyphicon glyphicon-ok"></i></button>
            <?php } ?>

            <?php if($office['STATUS'] == 1) { ?>
              <button type="button" class="btn btn-info waves-effect" title="ACTIVE" onclick="delete_master(<?php echo $office['ID']?>)" data-toggle="modal" data-target="#targetModal" data-backdrop="static"
                data-keyboard="false"><i class="glyphicon glyphicon-remove"></i></button>
              <?php } ?>
            </td>
          </tr>
        <?php } else { ?>

          <tr>
            <th scope="row"><?php echo $count; ?></th>
<!--            <th scope="row">--><?php //echo $office['OFFICE_ID']?><!--</th>-->
            <td scope="row"><?php echo $office['WING_NAME'] ?></td>
            <td scope="row"><?php echo $office['OFFICE_TYPE_NAME'] ?></td>

            <td><?php echo $office['OFFICE_NAME'];?></td>
            <td>
             <?php if($office['STATUS'] == 1 ): ?>
              <span><?php echo $this->lang->line('active');?></span>
              <?php else: ?>
               <span><?php echo $this->lang->line('inactive');?></span>
             <?php endif; ?>

           </td>
           <td class="center">
            <div class="btn-group" role="group" aria-label="First group">

              <button   type="button" class="btn btn-primary waves-effect"  title="EDIT" onclick="edit_master(<?php echo $office['ID']?>)"  data-toggle="modal" data-target="#targetModal" data-backdrop="static"
                data-keyboard="false"><i class="material-icons">edit</i></button>
                
              </div>
              <?php if($office['STATUS'] == 0) { ?>
                <button  type="button" class="btn btn-danger waves-effect" title="INACTIVE"  onclick="delete_master(<?php echo $office['ID']?>)" data-toggle="modal" data-target="#targetModal" data-backdrop="static"
                  data-keyboard="false"><i class="glyphicon glyphicon-ok"></i></button>
                <?php } ?>

                <?php if($office['STATUS'] == 1) { ?>
                  <button type="button" class="btn btn-info waves-effect" title="ACTIVE" onclick="delete_master(<?php echo $office['ID']?>)" data-toggle="modal" data-target="#targetModal" data-backdrop="static"
                    data-keyboard="false"><i class="glyphicon glyphicon-remove"></i></button>
                  <?php } ?>
                </td>
              </tr>

              <?php
            }
            $count++;
          endforeach;
        else:
          ?>
          <tr>
            <td colspan="5" style="text-align: center;"><b>No data found</b></td>
          </tr>
        <?php endif; ?>



      </tbody>
    </table>
    <div class="clearfix"></div>
    <?php echo $this->ajax_pagination->create_links(); ?>
