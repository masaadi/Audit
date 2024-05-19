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
   <h4 style="cursor:pointer;" data-toggle="collapse" data-target="#basic_info" class="text-center card-inside-title bg-info boxbdr"><?php echo $this->lang->line('notice_info'); ?>+</h4>


  <div id="basic_info" class="collapse in" style="border: 1px #8c8c8c;padding: 10px;box-shadow: 3px 8px 10px #ccc;">
       <div class="row clearfix">
        <div class="col-md-6 col-sm-6">
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
             
              
                                  
          </table>
        </div>

        <div class="col-md-6 col-sm-6">
         <table class="table table-bordered table-striped table-hover">
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
        <div class="col-md-11 col-sm-11 view_event_td">
         <table class="table table-bordered table-striped table-hover">
              <tr>
                  <td width="25%">
                      <label for="" class=""><?php echo $this->lang->line('brief_description')?></label>
                  </td>
                  <td class="view_notice_td" width="75%">
                      <?php echo $notice['DESCRIPTION']; ?>
                  </td>
              </tr>                   
          </table>
        </div>
      </div>
    </div>
  
 


