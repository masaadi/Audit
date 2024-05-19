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
  <?php
    $language = $this->session->userdata('lang_file');
  ?>
  <div class="modal-body">
   <h4 style="cursor:pointer;" data-toggle="collapse" data-target="#basic_info" class="text-center card-inside-title bg-info boxbdr"><?php echo $this->lang->line('event_info'); ?> +</h2>


  <div id="basic_info" class="collapse in" style="border: 1px #8c8c8c;padding: 10px;box-shadow: 3px 8px 10px #ccc;">
       <div class="row clearfix">
        <div class="col-md-6 col-sm-6">
         <table class="table table-bordered table-striped table-hover">
              <tr>
                  <td>
                      <label><?php echo $this->lang->line('event_type')?></label>
                  </td>
                  <td>
                      <?php if($language=='bn'){echo $event['TYPE_NAME_BN'];}else{echo $event['TYPE_NAME'];}?>
                  </td>
              </tr>
              <tr>
                  <td>
                      <label><?php echo $this->lang->line('event_title')?></label>
                  </td>
                  <td>
                      <?php echo $event['EVENT_TITLE']; ?>
                  </td>
              </tr>

              <tr>
                  <td>
                      <label><?php echo $this->lang->line('event_title_bn')?></label>
                  </td>
                  <td>
                      <?php echo $event['EVENT_TITLE_BN']; ?>
                  </td>
              </tr>
             
                <tr>
                  <td>
                      <label><?php echo $this->lang->line('venue'); ?></label>
                  </td>
                  <td>
                      <?php echo $event['VENUE']; ?>
                  </td>
              </tr>
              <tr>
                  <td>
                      <label><label for="" class=""><?php echo $this->lang->line('attached_document'); ?></label></label>
                  </td>
                  <td>
                   
                    <!-- if(substr($file['mime_type'],0,5)=='image') -->
                    
                  <?php $ext = pathinfo($event['ATTACHMENT'], PATHINFO_EXTENSION); if(strtolower($ext)=='pdf'){ ?>
                    <a href="<?php echo base_url().'public/uploads/event_management/'.$event['ATTACHMENT']; ?>" class="btn btn-success external" target="_blank" title="<?php echo $event['ATTACHMENT']?>"><?php echo $this->lang->line('read_the_pdf'); ?></a>
                  <?php }elseif(strtolower($ext)=='doc' || strtolower($ext)=='docx' || strtolower($ext)=='xls' || strtolower($ext)=='xlsx'){?>
                   <a href="<?php echo base_url().'public/uploads/event_management/'.$event['ATTACHMENT']; ?>" class="btn btn-info external" target="_blank" title="<?php echo $event['ATTACHMENT']?>"><?php echo $this->lang->line('download_file'); ?></a>
                 <?php }else{ ?>
                  <a href="<?php echo base_url().'public/uploads/event_management/'.$event['ATTACHMENT']; ?>" class="external" target="_blank"><img class="img img-thumbnail img-responsive img-rounded" style="max-width: 120px;max-height:100px" src="<?php echo base_url().'public/uploads/event_management/'.$event['ATTACHMENT']; ?>" title="<?php echo $event['ATTACHMENT']?>"></a>
                  <?php } ?>
                  </td>
              </tr>
                                  
          </table>
        </div>
        <div class="col-md-6 col-sm-6">
         <table class="table table-bordered table-striped table-hover">
              <tr>
                  <td>
                      <label><?php echo $this->lang->line('event_time')?></label>
                  </td>
                  <td>

                      <?php if($language=='bn'){echo Converter::en_to_bn($event['EVENT_TIME']);}else{echo $event['EVENT_TIME'];} ?>
                  </td>
              </tr>
              <tr>
                  <td>
                      <label><?php echo $this->lang->line('start_date')?></label>
                  </td>
                  <td>
                      <?php if($language=='bn'){echo Converter::en_to_bn($event['START_DATE']);}else{echo $event['START_DATE'];} ?>
                  </td>
              </tr>
               <tr>
                  <td>
                      <label><?php echo $this->lang->line('end_date')?></label>
                  </td>
                  <td>
                      <?php if($language=='bn'){echo Converter::en_to_bn($event['END_DATE']);}else{echo $event['END_DATE'];} ?>
                  </td>
              </tr>
              
              <tr>
                  <td>
                      <label class="" for=""><?php echo $this->lang->line('organizer'); ?></label>
                  </td>
                  <td>
                      <?php echo $event['ORGANIZER']; ?>
                  </td>
              </tr>
                                  
          </table>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col-md-11 col-sm-11 view_event_td">
         <table class="table table-bordered table-striped table-hover">

              <tr>
                  <td width="25%">
                      <label for="" class=""><?php echo $this->lang->line('brief_description')?></label>
                  </td>
                  <td width="75%">
                      <?php echo $event['DESCRIPTION']; ?>
                  </td>
              </tr>                   
          </table>
        </div>
      </div>
  </div>
 

