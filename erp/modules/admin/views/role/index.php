
<div class="content-wrapper">
          
  <div class="row">
    <div class="col-md-12">
      <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
        <div class="card-body " >
            <h4 class="text-center"><?= $this->lang->line('role')?></h4>
            <div class="row p-3">
              <div class="card bg-success" style="width: 100%; color: #fff;">
               
              </div>
            </div>
  					<h2 class="add_button">
              <button onclick="add_master()" type="button"
                class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5" data-backdrop="static" data-keyboard="false"><img src="<?php echo base_url();?>public/img/plus.png"/>
  			       <?= $this->lang->line('add_new')?>
  			      </button>
            </h2> 
            <div class="card search_form">
              <div class="card-body">
                <?php echo form_open_multipart('', array('id' => 'role_search')); ?>
                   
                  <div class="row" >
                    <!-- <div class="col-md-3">
                      <div class="form-group">
                        <label><?= $this->lang->line('role')." ".$this->lang->line('office_category')?></label>
                        <?php //echo form_dropdown("s_parent_id",getOfficeCategoryWiseRoles(),'',"id='s_parent_id' class='form-control'"); ?>
                      </div>
                    </div> -->

                    <div class="col-md-3">
                      <div class="form-group">
                        <label><?= $this->lang->line('role')." ".$this->lang->line('name')?></label>
                        <input type="text" name="r_name" id="r_name" placeholder="" class="form-control">
                      </div>
                    </div>
                      
                    <div class="col-md-3">
                      <div class="form-group">
                        <label></label>
                        <button type="button" onclick="searchFilter()" class="btn btn-sm btn-primary mt-4"><?= $this->lang->line('search')?></button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          
            <div id="roleList">
              <?php
                $this->load->view('admin/role/home');
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
    var r_name = $('#r_name').val();	
    var s_parent_id = $('#s_parent_id').val();  
    // alert(off_name);
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url(); ?>admin/role/paginate_data/' + page_num,
      data: 'page=' + page_num + '&r_name=' + r_name + '&s_parent_id=' + s_parent_id,
      beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      }, 
      success: function (html) {
  		$("#role_search").trigger("reset");
        $('#roleList').html(html);
      }
    });
  }
	
	function add_master() {
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/role/add/',
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
          $('#roleList').html(result);
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
        //url: '<?php echo base_url() ?>admin/menu/edit/' + id,
    		url: '<?php echo base_url() ?>admin/role/edit/' + id+'/'+page_no,
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
        $('#roleList').html(result);
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
        url: '<?php echo base_url() ?>admin/role/delete/' + id,
        beforeSend: function () {
          $('.crud_load').show()
        },
        complete: function () {
            $('.crud_load').hide();
        },
        success: function (result) {
          if (result) {
              //$('#menuList').html(result);
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
		 
      $('#role_add').validate({
        rules: {
  	      name: {
              required: true,
          },
  	      role_name_bn: {
              required: true,
          }
        },
        messages: {      
    		  name: {
    			  required: 'Role Name is required',
    		  },
    		  role_name_bn: {
    			  required: 'Role Name(bn) is required',
    		  }
        }, 

        submitHandler: function (form) {
          $("label.error").remove();
          var frm = $('#role_add');
          // e.preventDefault();
          var form = $(this);
          //debugger;
          $.ajax({
            url: "<?php echo base_url() ?>admin/role/added",
            type: 'POST',
            data: frm.serialize(),
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            }, 
            success: function (response) {
                //$('.loading').fadeOut("slow");
                var result = $.parseJSON(response);
                if (result.status != 'success') {
                  $.each(result, function (key, value) {
                    $('[name="' + key + '"]').addClass("error");
                    $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                });
              } else {
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
           
        $('#role_edit').validate({
          rules: {
            name: {
                required: true,
            },
            role_name_bn: {
                required: true,
            }
          },
    		  messages: {      
            name: {
              required: 'Role Name is required',
            },
            role_name_bn: {
              required: 'Role Name(bn) is required',
            }
          },

          submitHandler: function (form) {
            $("label.error").remove();
            var frm = $('#role_edit');
            // e.preventDefault();
            var form = $(this);
            //debugger;
            $.ajax({
              url: "<?php echo base_url() ?>admin/role/update/",
              type: 'POST',
              data: frm.serialize(),
                //dataType: "JSON",
              success: function (response) {
                  var result = $.parseJSON(response);
                  if (result.status != 'success') {
                    $.each(result, function (key, value) {
                      $('[name="' + key + '"]').addClass("error");
                      $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                    });
                  } else {
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