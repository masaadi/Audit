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
                <div class="card-body ">
             
                <?php
                    $language = $this->session->userdata('lang_file');
                ?>
                    <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label class="col-form-label" style="font-weight: bold"><u><?php echo $this->lang->line('notice'); ?> <?php echo $this->lang->line('title'); ?></u></label>
                            <br>
                            <?= ($language=='bn')? $array[0]->notice_title_bn :$array[0]->notice_title ?>
                          </div>
                          <div class="col-sm-12 mt-3">
                            <label class=" col-form-label " style="font-weight: bold"><u><?php echo $this->lang->line('notice'); ?> <?php echo $this->lang->line('description'); ?></u></label><br>
                            <?= ($language=='bn')? $array[0]->notice_content_bn : $array[0]->notice_content  ?>
                          </div>
                          <?php if(!empty($array[0]->document)):?>
                          <div class="col-sm-12 mt-3">
                            <label class="col-form-label" style="font-weight: bold"><u><?php echo $this->lang->line('document'); ?></u></label><br>

                            <a download target="_blank" href="<?php echo base_url('public/uploads/notice/').$array[0]->document;?>" class="btn btn-success btn-sm"> <i class="fa fa-download"></i> <?= $this->lang->line('download') ?></a>

                          </div>
                          <?php endif; ?>
                    </div>
                 

                </div>
              </div>
            </div>
          </div>
          
        </div>
