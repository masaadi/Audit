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
              
                    <p class="card-description">
                      <input type="hidden" name="id" value="<?php echo $array[0]->id ?>" />
					             <input type="hidden" name="page_no" value="<?php echo $count1;?>"/>
                    </p>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('post_title'); ?></label>
                          <div class="col-sm-10">
                            <?php echo $array[0]->post_title; ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('post_title_bn'); ?></label>
                          <div class="col-sm-10">
                            <?php echo $array[0]->post_title_bn; ?>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('post_content'); ?></label>
                          <div class="col-sm-10">
                            <?php echo $array[0]->post_content; ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('post_content_bn'); ?></label>
                          <div class="col-sm-10">
                            <?php echo $array[0]->post_content; ?>
                          </div>
                        </div>
                      </div>
                      <?php if($array[0]->post_img): ?>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('uploaded_image'); ?></label>
                          <div class="col-sm-10">
                            <img width="100%" src="<?php echo base_url('public/uploads/').$array[0]->post_img;?>">
                          </div>
                        </div>
                      </div>
                      <?php endif; ?>
                    </div>
                 

                </div>
              </div>
            </div>
          </div>
          
        </div>
