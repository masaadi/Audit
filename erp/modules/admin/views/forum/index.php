<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body " >
                    <h4 class="text-center"><?php echo $this->lang->line('forum'); ?></h4>
                    <div class="row p-3">
                      <div class="card bg-success" style="width: 100%; color: #fff;">
                       
                      </div>
                        
                    </div>
					<h2 class="add_button">

              <button onclick="add_master()" type="button"
              class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
               data-backdrop="static"
              data-keyboard="false"><img src="<?php echo base_url();?>public/img/plus.png"/><?php echo $this->lang->line('add_new'); ?></button>
          </h2> 
                <div class="card search_form">
                  <div class="card-body">
				  <?php echo form_open_multipart('', array('id' => 'forum_search')); ?>
                     
                    <div class="row " >
                        <div class="col-md-3">
                            <div class="form-group">
                              <label><?php echo $this->lang->line('forum'); ?></label>
                              <input type="text" name="div_name" id="div_name" placeholder="<?php echo $this->lang->line('title'); ?>" class="form-control">
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                              <div class="form-group">
                                <label></label>
                              <button type="button" onclick="searchFilter()"
                    class="btn btn-sm btn-primary mt-4">
					<?php echo $this->lang->line('search'); ?></button>
                              </div>
                            </div>
                    </div>
                  </div>
                </div>
				</form>
				 <div  id="forumList">
                    <?php
                    $this->load->view('admin/forum/home');
                    ?>
                </div>
                <!-- table -->
                
                </div>
              </div>

            </div>
            
          </div>
          
        </div>
		
<script type="text/javascript">
       function searchFilter(page_num) {
         page_num = page_num ? page_num : 0;
         var div_name = $('#div_name').val();	
		
        // alert(off_name);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/forum/paginate_data/' + page_num,
            data: 'page=' + page_num + '&div_name=' + div_name,
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            }, 
            success: function (html) {
				$("#forum_search").trigger("reset");
                $('#forumList').html(html);
            }
        });
    }
	
	

  
  
  function active_inactive_master(id,page_num) {
       var a = confirm("Are you sure you want to change status this record");
       if(a){ 
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/forum/activeInactive/' + id+'/'+ page_num,
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (response) {
          result= $.parseJSON(response);

          if (result) {
			window.onload = searchFilter(result.page_num);
            toastr.success(result.message);

            return false;
        } else {
            return false;
        }
    }
	  });
	   }
      return false;
  }
      
 

  function view_master(id,page_no) {

    // alert(id);
    $.ajax({
        type: "POST",
        //url: '<?php echo base_url() ?>admin/blog/edit/' + id,
        url: '<?php echo base_url() ?>admin/forum/see/' + id+'/'+page_no,
        beforeSend: function () {
        $('.crud_load').show()
        },
        complete: function () {
        $('.crud_load').hide();
        },
        success: function (result) {
        if (result) {
        $('.search_form').hide();
        $('.add_button').hide();
            $('#forumList').html(result);
            return false;
        } else {
            return false;
        }
        }
    });
    return false;
}


</script>










<script type="text/javascript">


    $(function () {
        $('body').on('click', '#submit', function () {
            
                $('#forum_add').validate({
                    rules: {
                        post_title: {
                            required: true,
                        },
                        post_title_bn: {
                            required: true,
                        },
                        post_content: {
                            required: true,
                        },
                        post_content_bn: {
                            required: true,
                        },                       
                    },
                    messages: {
                        post_title: {
                            required: 'Post title is required',
                        },
                        post_title_bn: {
                            required: 'Post title (Bangla) is required',
                        },
                        post_content: {
                            required: 'Post content is required',
                        },
                        post_content_bn: {
                            required: 'Post content (Bangla) is required',
                        },
                    },
                    submitHandler: function (form) {
                        $("label.error").remove();
                        // e.preventDefault();
                        var form = $(this);
                        //debugger;
                        var currentForm = $('#forum_add')[0];
                        var formData = new FormData(currentForm);                        
                        $.ajax({
                            url: "<?php echo base_url() ?>admin/forum/added",
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                var result = $.parseJSON(response);
                                if (result.status != 'success') {
                                    $.each(result, function (key, value) {
                                      $('[name="' + key + '"]').addClass("error");
                                      $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                                  });
                                }else {
                                  $('.search_form').show();
                                  $('.add_button').show();
                                      window.onload = searchFilter(0);
                                      toastr.success(result.message);
                                  }
                                }
                        });
                    }
                });
            
        });
    });


	
  
  
  //update
  $(function () {
      $('body').on('click', '#edit_submit', function () {
           
        $('#forum_edit').validate({
          rules: {
              post_title: {
                  required: true,
              },
              post_title_bn: {
                  required: true,
              },
              post_content: {
                  required: true,
              },
              post_content_bn: {
                  required: true,
              },                       
          },
          messages: {
              post_title: {
                  required: 'Post title is required',
              },
              post_title_bn: {
                  required: 'Post title (Bangla) is required',
              },
              post_content: {
                  required: 'Post content is required',
              },
              post_content_bn: {
                  required: 'Post content (Bangla) is required',
              },
          },
          submitHandler: function (form) {
     
            $("label.error").remove();
            // e.preventDefault();
            var form = $(this);
            //debugger;
            var currentForm = $('#forum_edit')[0];
            var formData = new FormData(currentForm);                        
            $.ajax({
                url: "<?php echo base_url() ?>admin/forum/update",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var result = $.parseJSON(response);
                    if (result.status != 'success') {
                        $.each(result, function (key, value) {
                          $('[name="' + key + '"]').addClass("error");
                          $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                      });
                    }else {
                      $('.search_form').show();
                      $('.add_button').show();
                          window.onload = searchFilter(0);
                          toastr.success(result.message);
                      }
                    }
            });
          }
      });
    });
  });
		
		</script>
