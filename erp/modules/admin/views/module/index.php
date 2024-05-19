
<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                    <h4 class="text-center"><?= $this->lang->line('module')?></h4>
                    <div class="row p-3">
                      <div class="card bg-success" style="width: 100%; color: #fff;">
                       
                      </div>
                        
                    </div>
					<h2 class="add_button">

              <button  style="padding-left:0px" onclick="add_master()" type="button"
              class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
               data-backdrop="static"
              data-keyboard="false"><img src="<?php echo base_url();?>public/img/plus.png"/>
			  <?= $this->lang->line('add_new')?></button>
          </h2> 
                <div class="card search_form">
                  <div class="card-body"  style="padding-left:0px">
				  <?php echo form_open_multipart('', array('id' => 'module_search')); ?>
                     
                    <div class="row " >
                        <div class="col-md-3">
                            <div class="form-group">
                              <label><?= $this->lang->line('module_name')?></label>
                              <input type="text" name="mod_name" id="mod_name" placeholder="" class="form-control">
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                              <div class="form-group">
                                <label></label>
                              <button type="button" onclick="searchFilter()"
                    class="btn btn-sm btn-primary mt-4">
					<?= $this->lang->line('search')?></button>
                              </div>
                            </div>
                    </div>
                  </div>
                </div>
				</form>
				 <div  id="moduleList">
                    <?php
                    $this->load->view('admin/module/home');
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
         var mod_name = $('#mod_name').val();	
		
        // alert(off_name);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/module/paginate_data/' + page_num,
            data: 'page=' + page_num + '&mod_name=' + mod_name,
            /* beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            }, */
            success: function (html) {
				$("#module_search").trigger("reset");
                $('#moduleList').html(html);
            }
        });
    }
	
	 function add_master() {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/module/add/',
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
            $('#moduleList').html(result);

            return false;
        } else {
            return false;
        }
		}
	});
		  return false;
  }
  
  //add data
  function edit_master(id,page_no) {

        // alert(id);
      $.ajax({
        type: "POST",
        //url: '<?php echo base_url() ?>admin/module/edit/' + id,
		url: '<?php echo base_url() ?>admin/module/edit/' + id+'/'+page_no,
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
            $('#moduleList').html(result);
            return false;
        } else {
            return false;
        }
    }
	  });
      return false;
  }
  
  function delete_master(id,action) {
      var a = '';
      if(action==2){
        a = confirm("Are you sure you want to inactive this record?");
      }else{
        a = confirm("Are you sure you want to active this record?");
      }
      //var a = confirm("Are you sure you want to delete this record");
      if(a){ 
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/module/delete/' + id + '/' +action,
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (result) {
          if (result) {
            //$('#moduleList').html(result);
            var response = $.parseJSON(result);
            //$('#menuList').html(result);
            toastr.success(response.message);
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
		 
         $('#module_add').validate({
          rules: {
          module_name: {
              required: true,
          },
		  module_name_bn: {
              required: true,
          },
		  sorting_order: {
              required: true,
          },

          },
		  messages: {      
		  module_name: {
			  required: 'Module Name is required',
		  },
		  module_name_bn: {
			  required: 'Module Name(bn) is required',
		  },
		  sorting_order: {
			  required: 'Sorting Order is required',
		  },
      
  }, 

   submitHandler: function (form) {
    $("label.error").remove();

          var frm = $('#module_add');
                    // e.preventDefault();
                    var form = $(this);
                    //debugger;
                    var currentForm = $('#module_add')[0];
                    var formData = new FormData(currentForm);

                    $.ajax({
                      url: "<?php echo base_url() ?>admin/module/added",
                      type: 'POST',
                      processData: false,
                      contentType: false,
                      data: formData,
                        //dataType: "JSON",
                        success: function (response) {
                            //$('.loading').fadeOut("slow");
                            var result = $.parseJSON(response);
                            if (result.status != 'success') {
                              $.each(result, function (key, value) {
                                $('[name="' + key + '"]').addClass("error");
                                $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                            });
                          }
                          else {
                                //$('.statusMsg').html('<span style="color:red;">Data Save Successfully.</span>');
                                // alert('success');
                                // window.location.href = "<?php echo base_url() ?>admin/module";
                               // $("#targetModal").modal("toggle");
							   
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
           
        $('#module_edit').validate({
         rules: {
          module_name: {
              required: true,
          },
		  module_name_bn: {
              required: true,
          },
		  sorting_order: {
              required: true,
          },

          },
		  messages: {      
		  module_name: {
			  required: 'Module Name is required',
		  },
		  module_name_bn: {
			  required: 'Module Name(bn) is required',
		  },
		  sorting_order: {
			  required: 'Sorting Order is required',
		  },
     


  },

  submitHandler: function (form) {
    $("label.error").remove();
     
     var frm = $('#module_edit');
                    // e.preventDefault();
                    var form = $(this);
                    //debugger;
                    var currentForm = $('#module_edit')[0];
                    var formData = new FormData(currentForm);

                    $.ajax({
                      url: "<?php echo base_url() ?>admin/module/update/",
                      type: 'POST',
                      data: formData,
                      processData: false,
                      contentType: false,
                        //dataType: "JSON",
                        success: function (response) {

                            //$('.loading').fadeOut("slow");
                            var result = $.parseJSON(response);
                            if (result.status != 'success') {
                              $.each(result, function (key, value) {
                                $('[name="' + key + '"]').addClass("error");
                                $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                            });
                              // alert('Duplicate Wing Name or Wing ID not allow !');

                          }
                          else {
                                //$('.statusMsg').html('<span style="color:red;">Data Save Successfully.</span>');
                                // alert(result.status);
                                // window.location.href = "<?php echo base_url() ?>hr/wing/index";
                                //$("#targetModal").modal("toggle");
								  $('.search_form').show();
			                      $('.add_button').show();
                                  window.onload = searchFilter(result.page_num);
                                  toastr.success(result.message);
                            }

                        }

                    });


                }
            });

    });
  });
		
		</script>