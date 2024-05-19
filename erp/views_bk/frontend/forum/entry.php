<?php
 $post_title = array(
    'name'  => 'post_title',
    'id'    => 'post_title',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);



$post_content = array(
    'name'  => 'post_content',
    'id'    => 'post_content',
    'class' => 'form-control',
    'rows' => '6',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);


?>
    <div class="row">
        <div class="col-md-8">
        <h3 class="my-4"><?= $this->lang->line('forum') ?>
            <small><?= $this->lang->line('create') ?></small>
        </h3>
        </div>
    </div>
 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <?php echo form_open_multipart('', array('id' => 'forum_add')); ?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <label class="col-form-label"><?php echo $this->lang->line('post_title'); ?></label>
                            <?php echo form_input($post_title); ?>
                          </div>
                        </div>
                      </div>
                     
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <label class="col-form-label"><?php echo $this->lang->line('post_content'); ?></label>
                            <?php echo form_textarea($post_content); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> 
							<button type="submit" class="btn btn-primary pull-right" id="submit"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </div>
                   
                  </form>
            </div>
        </div>
    </div>
</div>
 