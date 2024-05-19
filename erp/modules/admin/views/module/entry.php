 <?php
 $module_name = array(
    'name'  => 'module_name',
    'id'    => 'module_name',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);

$sorting_order = array(
    'name'  => 'sorting_order',
    'type'  => 'number',
    'id'    => 'sorting_order',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);
$icon = array(
  'name'  => 'pro_icon',
  'id'    => 'pro_icon',
  'required' => 'required',
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
                  
                  <?php echo form_open_multipart('', array('id' => 'module_add')); ?>
                    <p class="card-description">
                      
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?= $this->lang->line('module_name')?></label>
                          <div class="col-sm-8">
                            <?php echo form_input($module_name); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?= $this->lang->line('sorting_order')?></label>
                          <div class="col-sm-8">
                            <?php echo form_input($sorting_order); ?>
                          </div>
                        </div>
                      </div>                    
                      
                    </div>
					          <div class="row">

                      

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">
                            <?= $this->lang->line('icon')." ".$this->lang->line('upload'); //$this->lang->line('icon'); ?></label>
                          <div class="col-sm-8">
                            <?php echo form_upload($icon); //echo form_input($icon); ?>
                          </div>
                        </div>
                      </div>
					 
                    </div>
                    
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label"></label>
                              <div class="col-sm-8">
                                
								
								 <button type="submit" class="btn btn-primary" id="submit">
        <?= $this->lang->line('save')?></button>
                              </div>
                            </div>
                          </div>
                      </div>
                   
                  </form>

                  

                </div>
              </div>
            </div>
          </div>
          
        </div>
		
		