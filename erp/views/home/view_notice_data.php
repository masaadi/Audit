<?php
  $language = $this->session->userdata('lang_file');
?>
<style type="text/css">
   .view_event_td{
    overflow-y:scroll; 
   /* position:relative;
    */
height: 100%;
}
</style>
  <script src="<?= base_url() ?>public/js/editor.js"></script>
  <script src="<?= base_url() ?>public/js/jquery.maskedinput.js"></script>
<link href="<?php echo base_url(); ?>/public/css/editor.css" rel="stylesheet">

<p class="statusMsg"></p>
<div class="container-fluid">
  <!-- Input -->

  <div class="modal-body">

  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="boxbdr">
            <?php echo $this->lang->line('view_notice'); ?>
            </h4>
          </div>

           <div class="row clearfix">
        <div class="col-md-12 col-sm-12">
         <table class="table table-bordered table-striped table-hover">
              <tr>
                  <td width="40%">
                      <label><?php echo $this->lang->line('notice_title')?></label>
                  </td>
                  <td width="60%">
                      <?php echo $notice['NOTICE_TITLE']; ?>
                  </td>
              </tr>

              <tr>
                  <td width="40%">
                      <label><?php echo $this->lang->line('notice_title_bn')?></label>
                  </td>
                  <td width="60%">
                      <?php echo $notice['NOTICE_TITLE_BN']; ?>
                  </td>
              </tr>

              <tr>
                  <td width="40%">
                      <label><?php echo $this->lang->line('notice_date');?></label>
                  </td>
                  <td width="60%">
                      <?php echo $notice['NOTICE_DATE'];?>
                  </td>
              </tr>
             
              <tr>
                  <td width="40%">
                      <label><label for="" class=""><?php echo $this->lang->line('attached_document'); ?></label></label>
                  </td>
                  <td width="60%">
                   
                    <!-- if(substr($file['mime_type'],0,5)=='image') -->
                    
                  <?php $ext = pathinfo($notice['ATTACHMENT'], PATHINFO_EXTENSION); if(strtolower($ext)=='pdf'){ ?>
                    <a href="<?php echo base_url().'public/uploads/notice_management/'.$notice['ATTACHMENT']; ?>" class="btn btn-success external" target="_blank" title="<?php echo $notice['ATTACHMENT']?>"><?php echo $this->lang->line('read_the_pdf'); ?></a>
                  <?php }elseif(strtolower($ext)=='doc' || strtolower($ext)=='docx' || strtolower($ext)=='xls' || strtolower($ext)=='xlsx'){?>
                   <a href="<?php echo base_url().'public/uploads/notice_management/'.$notice['ATTACHMENT']; ?>" class="btn btn-info external" target="_blank" title="<?php echo $notice['ATTACHMENT']?>"><?php echo $this->lang->line('download_file'); ?></a>
                 <?php }else{ ?>
                  <a href="<?php echo base_url().'public/uploads/notice_management/'.$notice['ATTACHMENT']; ?>" class="external" target="_blank"><img class="img img-thumbnail img-responsive img-rounded" style="max-width: 120px;max-height:100px" src="<?php echo base_url().'public/uploads/notice_management/'.$notice['ATTACHMENT']; ?>" title="<?php echo $notice['ATTACHMENT']?>"></a>
                  <?php } ?>
                  </td>
              </tr>
                                  
          </table>
        </div>

      </div>

      <div class="row clearfix">
        <div class="col-md-12 col-sm-12">
         <table class="table table-bordered table-striped table-hover">

              <tr>
                  <td width="30%">
                      <label for="" class=""><?php echo $this->lang->line('brief_description')?></label>
                  </td>
                  <td class="view_notice_td" width="70%">
                      <?php echo $notice['DESCRIPTION']; ?>
                  </td>
              </tr>                   
          </table>
        </div>
      </div>

      <hr>
      <div class="header">
          
            <p class="boxbdr" style="font-weight: bold;">
            <?php echo $this->lang->line('notice_notification'); ?>
            </p>
      </div>

      <div class="row">
        <div class="col-md-12">
    <div class="col-md-6">
      <label class=""><?php echo $this->lang->line('pool'); ?></label>
      <?php if(count($pool_info)){?>
      <?php foreach($pool_info as $key=>$info_pool){?>
      <div class="">
        <label><?php $key=$key+1;echo $key.'.';?></label>
        <?php if($language=='bn'){?>
        <?php echo $info_pool['POOL_NAME_BN']?>
      <?php }else{ ?>
        <?php echo $info_pool['POOL_NAME']?>
      <?php } ?>
      </div>
      <?php } ?>
    <?php }else{if($language=='bn'){echo '<br/>'.'ডাটা পাওয়া যাই নি';}else{echo '<br/>'.'No Data Found';}} ?>

    </div>

    <div class="col-md-6">
      <label class=""><?php echo $this->lang->line('wing'); ?></label>
      <?php if(count($wing_info)){?>
      <?php foreach($wing_info as $key=>$info_wing){?>
      <div class="">
        <label><?php $key=$key+1;echo $key.'.';?></label>
        <?php if($language=='bn'){?>
        <?php echo $info_wing['WING_NAME_BN']?>
      <?php }else{ ?>
        <?php echo $info_wing['WING_NAME']?>
      <?php } ?>
      </div>
      <?php } ?>
    <?php }else{if($language=='bn'){echo '<br/>'.'ডাটা পাওয়া যাই নি';}else{echo '<br/>'.'No Data Found';}} ?>
    </div>
  </div>

  <div class="col-md-12">
    <hr>
  </div>
  <div class="col-md-12">
  <div class="col-md-6">
      <label class=""><?php echo $this->lang->line('office_type'); ?></label>
      <?php if(count($office_type_info)){?>
        <?php foreach($office_type_info as $key=>$type_office){?>
        <div class="">
         <label><?php $key=$key+1;echo $key.'.';?></label>
          <?php if($language=='bn'){?>
          <?php echo $type_office['OFFICE_TYPE_NAME_BN']?>
        <?php }else{?>
          <?php echo $type_office['OFFICE_TYPE_NAME']?>
        <?php } ?>
        </div>
        <?php } ?>
      <?php }else{if($language=='bn'){echo '<br/>'.'ডাটা পাওয়া যাই নি';}else{echo '<br/>'.'No Data Found';}} ?>
    </div>
    <div class="col-md-6">
     <label class=""><?php echo $this->lang->line('office'); ?></label>

      <?php if(count($office_info)){?>
        <?php foreach($office_info as $key=>$info_office){?>
        <div class="">
         <label><?php $key=$key+1;echo $key.'.';?></label>
          <?php if($language=='bn'){?>
          <?php echo $info_office['OFFICE_NAME_BN']?>
        <?php }else{?>
          <?php echo $info_office['OFFICE_NAME']?>
        <?php } ?>
        </div>
        <?php } ?>
     <?php }else{if($language=='bn'){echo '<br/>'.'ডাটা পাওয়া যাই নি';}else{echo '<br/>'.'No Data Found';}} ?>
    </hr>

    </div>



  </div>

    <div class="col-md-12">
    <hr>
  </div>

  <div class="col-md-12">
    <div class="col-md-6">
      <label class=""><?php echo $this->lang->line('office_head'); ?></label>
      <?php if(count($office_head_info)){?>
        <?php foreach($office_head_info as $key=>$info_office_head){?>
        <div class="">
         
          <?php if($language=='bn'){?>
          <?php echo $info_office_head['EMPLOYEE_NAME_BN'].' ('.Converter::en_to_bn($info_office_head['EMPLOYEE_ID']).')';?>
        <?php }else{?>
          <?php echo $info_office_head['EMPLOYEE_NAME'].' ('.$info_office_head['EMPLOYEE_ID'].')';?>
        <?php } ?>
        </div>
        <?php } ?>
      <?php }else{if($language=='bn'){echo '<br/>'.'ডাটা পাওয়া যাই নি';}else{echo '<br/>'.'No Data Found';}} ?>
    </div>
    <div class="col-md-6">
      <label class=""><?php echo $this->lang->line('section_head'); ?></label>
      <?php if(count($section_head_info)){?>
        <?php foreach($section_head_info as $key=>$info_section_head){?>
        <div class="">
         
          <?php if($language=='bn'){?>
          <?php echo $info_section_head['EMPLOYEE_NAME_BN'].' ('.Converter::en_to_bn($info_section_head['EMPLOYEE_ID']).')';?>
        <?php }else{?>
          <?php echo $info_section_head['EMPLOYEE_NAME'].' ('.$info_section_head['EMPLOYEE_ID'].')';?>
        <?php } ?>
        </div>
        <?php } ?>
     <?php }else{if($language=='bn'){echo '<br/>'.'ডাটা পাওয়া যাই নি';}else{echo '<br/>'.'No Data Found';}} ?>

    </div>
  </div>
  <div class="col-md-12">
    <hr>
  </div>

  <div class="col-md-12">
    <div class="col-md-6">
      <label class=""><?php echo $this->lang->line('designation'); ?></label>

     <?php if(count($designation_info)){?>
        <?php foreach($designation_info as $key=>$info_designation){?>
        <div class="">
           <label><?php $key=$key+1;echo $key.'.';?></label>
          <?php if($language=='bn'){?>
          <?php echo $info_designation['DESIGNATION_BN']?>
        <?php }else{?>
          <?php echo $info_designation['DESIGNATION']?>
        <?php } ?>
        </div>
        <?php } ?>
      <?php }else{if($language=='bn'){echo '<br/>'.'ডাটা পাওয়া যাই নি';}else{echo '<br/>'.'No Data Found';}} ?>

    </div>

    <div class="col-md-6">
      <label class=""><?php echo $this->lang->line('employee'); ?></label>

      <?php if(count($employee_info)>0){?>
        <?php foreach($employee_info as $key=>$info_employee){?>
        <div class="">
           <label><?php $key=$key+1;echo $key.'.';?></label>
          <?php if($language=='bn'){?>
          <?php echo $info_employee['EMPLOYEE_NAME_BN'].' ('.Converter::en_to_bn($info_employee['EMPLOYEE_ID']).')';?>
        <?php }else{?>
          <?php echo $info_employee['EMPLOYEE_NAME'].' ('.$info_employee['EMPLOYEE_ID'].')'?>
        <?php } ?>
        </div>
        <?php } ?>
      <?php }else{if($language=='bn'){echo '<br/>'.'ডাটা পাওয়া যাই নি';}else{echo '<br/>'.'No Data Found';}} ?>
    </div>
  </div>



  </div>



      </div>
    </div>
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-default " data-dismiss="modal"><?php echo $this->lang->line('cancel') ?></button>
  </div>
  </div>

  <script type="text/javascript">
    function statusChange(val)
    {
      $('#residence').val("");
      $('#residence_portion').hide();

        if(val == 'yes')
        {
           $('#residence_portion').show();
        }
    }
  </script>
