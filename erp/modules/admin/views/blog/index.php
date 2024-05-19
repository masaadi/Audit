<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body " >
                    <h4 class="text-center"><?php echo $this->lang->line('blog'); ?></h4>
                    <div class="row p-3">
                      <div class="card bg-success" style="width: 100%; color: #fff;">
                       
                      </div>
                        
                    </div>
					
                <div class="card search_form">
                  <div class="card-body">
				  <?php echo form_open_multipart('', array('id' => 'blog_search')); ?>
                     
                    <div class="row " >
                        <div class="col-md-3">
                            <div class="form-group">
                              <label><?php echo $this->lang->line('blog'); ?></label>
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
				 <div  id="blogList">
                    <?php
                    $this->load->view('admin/blog/home');
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
		
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/blog/paginate_data/' + page_num,
            data: 'page=' + page_num + '&div_name=' + div_name,
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            }, 
            success: function (html) {
				$("#blog_search").trigger("reset");
                $('#blogList').html(html);
            }
        });
    }
	
	 function add_master() {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/blog/add/',
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
            $('#blogList').html(result);

            return false;
        } else {
            return false;
        }
		}
	});
		  return false;
  }
  
  function confirm_master(id,page_no) {
    var a = confirm("Are you sure you want to confirm this record");
    if(a){ 

      $.ajax({
        type: "POST",
		url: '<?php echo base_url() ?>admin/blog/confirm/' + id+'/'+page_no,
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (response) {
          if (response) {

            var result = $.parseJSON(response);

            window.onload = searchFilter(0);
            toastr.success(result.message);

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
        url: '<?php echo base_url() ?>admin/blog/see/' + id+'/'+page_no,
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
            $('#blogList').html(result);
            return false;
        } else {
            return false;
        }
    }
    });
      return false;
  }
  
  function delete_master(id) {
       var a = confirm("Are you sure you want to delete this record");
       if(a){ 
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/blog/delete/' + id,
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (result) {
          if (result) {
            //$('#blogList').html(result);
			window.onload = searchFilter(0);
            return false;
        } else {
            return false;
        }
    }
	  });
	   }
      return false;
  }
      
 


</script>

<script type="text/javascript">


    $(function () {
        $('body').on('click', '#submit', function () {
            
                $('#blog_add').validate({
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
                        var currentForm = $('#blog_add')[0];
                        var formData = new FormData(currentForm);                        
                        $.ajax({
                            url: "<?php echo base_url() ?>admin/blog/added",
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
           
        $('#blog_edit').validate({
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
            var currentForm = $('#blog_edit')[0];
            var formData = new FormData(currentForm);                        
            $.ajax({
                url: "<?php echo base_url() ?>admin/blog/update",
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
