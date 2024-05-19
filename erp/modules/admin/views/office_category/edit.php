 <?php
 $office_category_name = array(
    'name'  => 'office_category_name',
    'id'    => 'office_category_name',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  $array[0]->office_category_name,
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
                  
                  <?php echo form_open_multipart('', array('id' => 'office_category_edit')); ?>
                    <p class="card-description">
                      <input type="hidden" name="id" value="<?php echo $array[0]->id ?>" />
					  <input type="hidden" name="page_no" value="<?php echo $count1;?>"/>
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?= $this->lang->line('category_name')?></label>
                          <div class="col-sm-8">
						   <?php echo form_input($office_category_name); ?>                            
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label"></label>
                              <div class="col-sm-8">
                                
								
								 <button type="submit" class="btn btn-primary" id="edit_submit">
        <?= $this->lang->line('update')?></button>
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
		
		