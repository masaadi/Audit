
 <?php
 $get_info_title = array(
    'name'  => 'get_info_title',
    'id'    => 'get_info_title',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
);

 $get_info_title_bn = array(
    'name'  => 'get_info_title_bn',
    'id'    => 'get_info_title_bn',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
);

$get_info_content = array(
    'name'  => 'get_info_content',
    'id'    => 'get_info_content',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
);

 $get_info_content_bn = array(
    'name'  => 'get_info_content_bn',
    'id'    => 'get_info_content_bn',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
);

?>

<?php echo form_open_multipart('', array('id' => 'get_info_add')); ?>
    <p class="card-description">
      
    </p>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('get_info_title'); ?></label>
          <div class="col-sm-10">
            <?php echo form_input($get_info_title); ?>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('get_info_title_bn'); ?></label>
          <div class="col-sm-10">
            <?php echo form_input($get_info_title_bn); ?>
          </div>
        </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('get_info_content'); ?></label>
          <div class="col-sm-10">
            <?php echo form_textarea($get_info_content); ?>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('get_info_content_bn'); ?></label>
          <div class="col-sm-10">
            <?php echo form_textarea($get_info_content_bn); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('image_upload'); ?></label>
            <div class="col-sm-10">
              <input type="file" name="image_url1" id="image_url1">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('image_upload'); ?></label>
            <div class="col-sm-10">
              <input type="file" name="image_url2" id="image_url2">
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

  <script>
    $(document).ready(function(){
        tinymce.init({
            selector: "textarea#get_info_content",
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
            selector: "textarea#get_info_content_bn",
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
  <script type="text/javascript">

    $(function () {
        $('body').on('click', '#submit', function () {
            
                $('#get_info_add').validate({
                    rules: {
                        get_info_title: {
                            required: true,
                        },
                        get_info_title_bn: {
                            required: true,
                        },
                        get_info_content: {
                            required: true,
                        },
                        get_info_content_bn: {
                            required: true,
                        },                       
                    },
                    messages: {
                        get_info_title: {
                            required: 'Service title is required',
                        },
                        get_info_title_bn: {
                            required: 'Service title (Bangla) is required',
                        },
                        get_info_content: {
                            required: 'Service content is required',
                        },
                        get_info_content_bn: {
                            required: 'Service content (Bangla) is required',
                        },
                    },
                    submitHandler: function (form) {
                        $("label.error").remove();
                        // e.preventDefault();
                        var form = $(this);
                        //debugger;
                        var currentForm = $('#get_info_add')[0];
                        var formData = new FormData(currentForm);                        
                        $.ajax({
                            url: "<?php echo base_url() ?>admin/web_blocks/added_get_info",
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                // console.log(response);
                                var result = $.parseJSON(response);
                                if (result.status != 'success') {
                                    $.each(result, function (key, value) {
                                      $('[name="' + key + '"]').addClass("error");
                                      $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                                  });
                                }else {
                                      location.reload();
                                      toastr.success(result.message);
                                }
                            }
                        });
                    }
                });
            
        });
    });

</script>