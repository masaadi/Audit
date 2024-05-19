 <?php

 $notice_title = array(
    'name'  => 'notice_title',
    'id'    => 'notice_title',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  $array[0]->notice_title,
);

 $notice_title_bn = array(
    'name'  => 'notice_title_bn',
    'id'    => 'notice_title_bn',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  $array[0]->notice_title_bn,
);

$notice_content = array(
    'name'  => 'notice_content',
    'id'    => 'notice_content',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  $array[0]->notice_content,
);

 $notice_content_bn = array(
    'name'  => 'notice_content_bn',
    'id'    => 'notice_content_bn',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  $array[0]->notice_content_bn,
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
                  
                  <?php echo form_open_multipart('', array('id' => 'notice_edit')); ?>
                    <p class="card-description">
                      <input type="hidden" name="id" value="<?php echo $array[0]->id ?>" />
					             <input type="hidden" name="page_no" value="<?php echo $count1;?>"/>
                    </p>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('notice'); ?> <?php echo $this->lang->line('title'); ?></label>
                          <div class="col-sm-10">
                            <?php echo form_input($notice_title); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('notice'); ?> <?php echo $this->lang->line('title'); ?> <?php echo $this->lang->line('bangla'); ?></label>
                          <div class="col-sm-10">
                            <?php echo form_input($notice_title_bn); ?>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('notice'); ?> <?php echo $this->lang->line('description'); ?></label>
                          <div class="col-sm-10">
                            <?php echo form_textarea($notice_content); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('notice'); ?><?php echo $this->lang->line('description'); ?> <?php echo $this->lang->line('bangla'); ?></label>
                          <div class="col-sm-10">
                            <?php echo form_textarea($notice_content_bn); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('document'); ?></label>
                          <div class="col-sm-10">
                            <input type="file" name="document" id="document"><br><br>
                            <?php if(!empty($array[0]->document)):?>
                              <a download target="_blank" href="<?php echo base_url('public/uploads/notice/').$array[0]->document;?>" class="btn btn-success btn-sm"> <i class="fa fa-download"></i> <?= $this->lang->line('download') ?></a>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('select_recipient'); ?> </label>
                          <div class="col-sm-10">
                            <table class="table table-bordered">
                                <tr>
                                  <td width='50%'>
                                      <input type="checkbox" onchange="selectUser(2)" id='select_2' value='2'> Applicant <br><br>                   
                                      <input type="checkbox" onchange="selectUser(3)" id='select_3' value='3'> Entrepreneur     <br> <br>                
                                      <input type="checkbox" onchange="selectUser(4)" id='select_4' value='4'> Inspector  
                                  </td>
                                  <td>
                                    <div id='selected_user'>
                                        <?php
                                          $total_roles=$this->db->query("select * ,roles.name from notice_user  LEFT JOIN roles
                                          ON notice_user.role_id = roles.id where notice_id = " .$array[0]->id )->result_array();

                                          foreach($total_roles as $role):
                                        ?>
                                        <div id='user_<?= $role['role_id'] ?>'><input type='checkbox' checked value='<?= $role['role_id'] ?>' name='roles[]' > <?= $role['name'] ?> <button class='btn-danger' type="button" onclick="remove_user(<?= $role['role_id'] ?>)">X</button><br><br></div>
                                        <?php endforeach; ?>
                                      </div>
                                  </td>
                                </tr>
                            </table>
                            
                           
                          </div>
                        </div>
                      </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-primary pull-right" id="edit_submit"><?php echo $this->lang->line('update'); ?></button>
                        </div>
                    </div>
                   
                  </form>

                  

                </div>
              </div>
            </div>
          </div>
          
        </div>
		
<script>
$(document).ready(function(){
    tinymce.init({
        selector: "textarea#notice_content",
        theme: "modern",
        width: '100%',
        height: 300,
        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
             "save table contextmenu directionality emoticons template paste textcolor"
       ],
       content_css: "css/content.css",
       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
       style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
    }); 
});  
$(document).ready(function(){
    tinymce.init({
        selector: "textarea#notice_content_bn",
        theme: "modern",
        width: '100%',
        height: 300,
        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
             "save table contextmenu directionality emoticons template paste textcolor"
       ],
       content_css: "css/content.css",
       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
       style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
    }); 
});     



    function selectUser(user_id){

        var name='';
        if(user_id==2){
          var name='Applicant';
        }else if(user_id==3){
          var name='Entrepreneur';
        }else{
          var name='Inspector';
        }

          if ($('#select_'+user_id).is(':checked')) {

          var user_input="<div id='user_"+user_id+"'><input type='checkbox' checked value='"+user_id+"' name='roles[]' > "+ name +" <button type='button' class='btn-danger' onclick='remove_user("+user_id+")'>X</button><br><br></div>";
          $('#selected_user').append(user_input);
        }else{
          $('#user_'+user_id).remove();
        
        }




    }

     function remove_user(id){

        $('#user_'+id).remove();
     }



</script>  