 <?php
 $topic_name = array(
    'name'  => 'topic_name',
    'id'    => 'topic_name',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  $array[0]->topic_name,
);

  $topic_name_bn = array(
    'name'  => 'topic_name_bn',
    'id'    => 'topic_name_bn',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  $array[0]->topic_name_bn,
);

?>
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
                  
                  <?php echo form_open_multipart('', array('id' => 'topic_edit')); ?>
                    <p class="card-description">
                      <input type="hidden" name="id" value="<?php echo $array[0]->id ?>" />
					            <input type="hidden" name="page_no" value="<?php echo $count1;?>"/>
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('topic'); ?> <?php echo $this->lang->line('name'); ?></label>
                          <div class="col-sm-8">
						                <?php echo form_input($topic_name); ?>                            
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('topic'); ?>  <?php echo $this->lang->line('name'); ?>  <?php echo $this->lang->line('bangla'); ?></label>
                          <div class="col-sm-8">
                            <?php echo form_input($topic_name_bn); ?>                            
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('status'); ?> </label>
                          <div class="col-sm-8">
                            <input type="radio" <?=($array[0]->status==1)? 'checked' : '' ?> value="1" name="status"> <?= $this->lang->line('active') ?>
                            <input type="radio" <?=($array[0]->status==0)? 'checked' : '' ?> value="0" name="status"> <?= $this->lang->line('inactive') ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    
                    <div class="row">
                        <div class="col-md-4">
                           <button type="submit" class="btn btn-primary" id="edit_submit"><?php echo $this->lang->line('update'); ?></button>
                        </div>
                    </div>
                   
                  </form>

                  

                </div>
              </div>
            </div>
          </div>
          
        </div>
		
		