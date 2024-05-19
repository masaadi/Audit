<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body " >
                    <h4 class="text-center"><?php echo $this->lang->line('notice'); ?></h4>
                    <div class="row p-3">
                      <div class="card bg-success" style="width: 100%; color: #fff;">
                       
                      </div>
                        
                    </div>
					
                    <h2 class="add_button">
                        <button onclick="add_master()" type="button"
                        class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
                        data-backdrop="static"
                        data-keyboard="false"><img src="<?php echo base_url();?>public/img/plus.png"/> <?php echo $this->lang->line('add_new'); ?></button>
                        </h2> 
                <div class="card search_form">
                  <div class="card-body">
				  <?php echo form_open_multipart('', array('id' => 'notice_search')); ?>
                     
                    <div class="row " >
                        <div class="col-md-3">
                            <div class="form-group">
                              <label><?php echo $this->lang->line('notice'); ?> <?php echo $this->lang->line('title'); ?></label>
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
				 <div  id="noticeList">
                    <?php
                    $this->load->view('admin/notice/home');
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
            url: '<?php echo base_url(); ?>admin/notice/paginate_data/' + page_num,
            data: 'page=' + page_num + '&title=' + div_name,
            beforeSend: function () {
                $('.crud_load').show() 
            },
            complete: function () {
                $('.crud_load').hide();
            },
            success: function (html) {
				$("#notice_search").trigger("reset");
                $('#noticeList').html(html);
            }
        });
    }
	
	 function add_master() {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/notice/add/',
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
            $('#noticeList').html(result);

            return false;
        } else {
            return false;
        }
		}
	});
		  return false;
  }
  
function publish_master(id,page_no) {
    var a = confirm("Are you sure you want to publish this notice");
    if(a){ 
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admin/notice/publish/' + id+'/'+page_no,
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
                }else {
                    return false;
                }
            }
        });
    }
    return false;
}

 function active_inactive_master(id,page_no) {
    var a = confirm("Are you sure you want to change status this record");
    if(a){ 
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admin/notice/active_inactive/' + id+'/'+page_no,
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


function edit_master(id,page_no) {

    $.ajax({
    type: "POST",
    url: '<?php echo base_url() ?>admin/notice/edit/' + id+'/'+page_no,
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
        $('#noticeList').html(result);
        return false;
    } else {
        return false;
    }
    }
    });
    return false;
}


  function view_master(id,page_no) {

      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/notice/see/' + id+'/'+page_no,
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
            $('#noticeList').html(result);
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
        url: '<?php echo base_url() ?>admin/notice/delete/' + id,
      beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (result) {
          if (result) {
            //$('#noticeList').html(result);
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
            
                $('#notice_add').validate({
                    rules: {
                        notice_title: {
                            required: true,
                        },
                        notice_title_bn: {
                            required: true,
                        },
                        notice_content: {
                            required: true,
                        },
                        notice_content_bn: {
                            required: true,
                        },
                        "roles[]": {
                            required: true,
                        },                       
                    },
                    messages: {
                        notice_title: {
                            required: 'Notice title is required',
                        },
                        notice_title_bn: {
                            required: 'Notice title (Bangla) is required',
                        },
                        notice_content: {
                            required: 'Notice description is required',
                        },
                        notice_content_bn: {
                            required: 'Notice description (Bangla) is required',
                        },
                        "roles[]": {
                            required: "Pease select minimun one users",
                        }, 
                    },
                    submitHandler: function (form) {
                        $("label.error").remove();
                        // e.preventDefault();
                        var form = $(this);
                        //debugger;
                        var currentForm = $('#notice_add')[0];
                        var formData = new FormData(currentForm);                        
                        $.ajax({
                            url: "<?php echo base_url() ?>admin/notice/added",
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            beforeSend: function () {
                                $('.crud_load').show()
                            },
                            complete: function () {
                                $('.crud_load').hide();
                            },
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
           
        $('#notice_edit').validate({
            rules: {
                        notice_title: {
                            required: true,
                        },
                        notice_title_bn: {
                            required: true,
                        },
                        notice_content: {
                            required: true,
                        },
                        notice_content_bn: {
                            required: true,
                        },                       
                    },
                    messages: {
                        notice_title: {
                            required: 'Notice title is required',
                        },
                        notice_title_bn: {
                            required: 'Notice title (Bangla) is required',
                        },
                        notice_content: {
                            required: 'Notice description is required',
                        },
                        notice_content_bn: {
                            required: 'Notice description (Bangla) is required',
                        },
                    },
          submitHandler: function (form) {
     
            $("label.error").remove();
            // e.preventDefault();
            var form = $(this);
            //debugger;
            var currentForm = $('#notice_edit')[0];
            var formData = new FormData(currentForm);                        
            $.ajax({
                url: "<?php echo base_url() ?>admin/notice/update",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('.crud_load').show()
                },
                complete: function () {
                    $('.crud_load').hide();
                },
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
