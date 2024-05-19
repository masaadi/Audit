 <?php
 $image_title = array(
    'name'  => 'image_title',
    'id'    => 'image_title',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);

 $image_title_bn = array(
    'name'  => 'image_title_bn',
    'id'    => 'image_title_bn',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
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
                  
                  <?php echo form_open_multipart('', array('id' => 'slider_image_add')); ?>
                    <p class="card-description">
                      
                    </p>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('image_title'); ?></label>
                          <div class="col-sm-10">
                            <?php echo form_input($image_title); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('image_title_bn'); ?></label>
                          <div class="col-sm-10">
                            <?php echo form_input($image_title_bn); ?>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">

                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('image_upload'); ?></label>
                          <div class="col-sm-10">
                            <input type="file" name="image_url" id="image_url">
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
          
        </div>
<!--   <script src="<?php echo base_url(); ?>public/js/editor.js"></script>
  <link href="<?php echo base_url(); ?>public/css/editor.css" type="text/css" rel="stylesheet"/>
  <script>
    $(document).ready(function() {
      $("#post_content").Editor();
      $("#post_content_bn").Editor();
    });
  </script> -->

<script>
$(document).ready(function(){
    tinymce.init({
        selector: "textarea#post_content",
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
        selector: "textarea#post_content_bn",
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
</script>  