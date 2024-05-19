
<div class="content-wrapper">  
  <div class="row">
    <div class="col-md-12">
      <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
        <div class="card-body " >
            <h4 class="text-center"><?= $this->lang->line('user')?></h4>
            <div class="row p-3">
              <div class="card bg-success" style="width: 100%; color: #fff;">
               
              </div>
            </div>
  	        <h2 class="add_button">
              <button onclick="add_master()" type="button" class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5" data-backdrop="static" data-keyboard="false"><img src="<?php echo base_url();?>public/img/plus.png"/><?= $this->lang->line('add_new')?></button>
            </h2>

            <div class="card search_form">
              <div class="card-body">
                <?php echo form_open_multipart('', array('id' => 'user_search')); ?>
                  <div class="row">

                      <div class="col-md-3">
                        <div class="form-group">
                          <label><?= $this->lang->line('name')?></label>
                          <input type="text" name="ser_name" id="ser_name" placeholder="" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label><?= $this->lang->line('username')?></label>
                          <input type="text" name="ser_username" id="ser_username" placeholder="" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label><?= $this->lang->line('email')?></label>
                          <input type="text" name="ser_email" id="ser_email" placeholder="" class="form-control">
                        </div>
                      </div>
      	
                      <div class="col-md-3">
                        <div class="form-group">
                          <label><?= $this->lang->line('usertype')?></label>
                          <?php echo form_dropdown("ser_roel_id",getRoles(),'',"id='ser_roel_id' class='form-control'"); ?>
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

            <div  id="userList">
              <?php
              $this->load->view('admin/user/home');
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
    var ser_name = $('#ser_name').val();	
    var ser_username = $('#ser_username').val(); 
    var ser_email = $('#ser_email').val(); 
    var ser_roel_id = $('#ser_roel_id').val(); 

    // alert(off_name);
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>admin/user/paginate_data/' + page_num,
        data: 'page=' + page_num + '&ser_name=' + ser_name + '&ser_username=' + ser_username + '&ser_email=' + ser_email + '&ser_roel_id=' + ser_roel_id,
        beforeSend: function () {
            $('.crud_load').show()
        },
        complete: function () {
            $('.crud_load').hide();
        }, 
        success: function (html) {
		      $("#user_search").trigger("reset");
          $('#userList').html(html);
        }
    });
  }
	
	function add_master() {
    $.ajax({
      type: "POST",
      url: '<?php echo base_url() ?>admin/user/add/',
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
          $('#userList').html(result);
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
    $.ajax({
      type: "POST",
		  url: '<?php echo base_url() ?>admin/user/edit/' + id+'/'+page_no,
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
            $('#userList').html(result);
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
        url: '<?php echo base_url() ?>admin/menu/delete/' + id,
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
      $('#user_add').validate({
        rules: {
          role_id: {
              required: true,
          },
    		  first_name: {
              required: true,
          },
	        last_name: {
            required: true,
          },
	        username: {
            required: true,
          },
	        password: {
            minlength : 6,
          },
          confirm_password: {
              equalTo: "#password"
          },
          email: {
            required: true,
            email: true
          }
        },
		    messages: {      
    		  role_id: {
    			  required: 'Usertype is required',
    		  },
    		  first_name: {
    			  required: 'First Name is required',
    		  },
    		  last_name: {
    			  required: 'Last Name is required',
    		  },
    		  username: {
    			  required: 'Username is required',
    		  },
          password: {
            required: 'Password is required',
            minlength: 'The password must contain at least six character',
          },
          confirm_password: {
            equalTo: "Enter Confirm Password Same as Password",
          },
          email: {
            required: 'Email is required',
            email: 'Enter a valid email address',
          }
    		  
        }, 
        submitHandler: function (form) {
        $("label.error").remove();

        var user_pre = $("#user_prefixe").val();
        var usr_n = $("#username").val();
        var new_username = user_pre+usr_n;
        $("#username").val(new_username);

        var frm = $('#user_add');
        // e.preventDefault();
        var form = $(this);
        //debugger;
          $.ajax({
            url: "<?php echo base_url() ?>admin/user/added",
            type: 'POST',
            data: frm.serialize(),
            //dataType: "JSON",
            success: function (response) {
              //$('.loading').fadeOut("slow");
              var result = $.parseJSON(response);
              if (result.status != 'success') {
                    $("#username").val(new_username.replace(user_pre,''));
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
      $('#user_edit').validate({
         rules: {
          role_id: {
              required: true,
          },
          first_name: {
              required: true,
          },
          last_name: {
            required: true,
          },
          username: {
            required: true,
          },
          confirm_password: {
              equalTo: "#password"
          },
          email: {
            required: true,
            email: true
          }
        },
        messages: {      
          role_id: {
            required: 'Usertype is required',
          },
          first_name: {
            required: 'First Name is required',
          },
          last_name: {
            required: 'Last Name is required',
          },
          username: {
            required: 'Username is required',
          },
          confirm_password: {
            equalTo: "Enter Confirm Password Same as Password",
          },
          email: {
            required: 'Email is required',
            email: 'Enter a valid email address',
          }
          
        },
        submitHandler: function (form) {
          $("label.error").remove();

          var user_pre = $("#user_prefixe").val();
          var usr_n = $("#username").val();
          var new_username = user_pre+usr_n;
          $("#username").val(new_username);

          var frm = $('#user_edit');
          // e.preventDefault();
          var form = $(this);
          //debugger;
          $.ajax({
            url: "<?php echo base_url() ?>admin/user/update/",
            type: 'POST',
            data: frm.serialize(),
            //dataType: "JSON",
            success: function (response) {          
              var result = $.parseJSON(response);
                if (result.status != 'success') {
                  $("#username").val(new_username.replace(user_pre,''));
                  $.each(result, function (key, value) {
                    $('[name="' + key + '"]').addClass("error");
                    $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                  });
                  // alert('Duplicate Wing Name or Wing ID not allow !');
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

  $(function () {

    $(document).on("change","#role_id", function(){
      var selected_val = $(this).val();
      // if(selected_val==1){
      //   $("#user_prefixe").val("AD");
      // }
      // else if(selected_val==2){
      //   $("#user_prefixe").val("AP");
      // }
      // else if(selected_val==3){
      //   $("#user_prefixe").val("EP");
      // }
      if(selected_val==4){
        $("#user_prefixe").val("IS");
      }
      else{
        $("#user_prefixe").val("");
      }
    });

    $(document).on("click","#all_check", function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $(document).on("click",".module_check", function(){
        var all_class = this.className.split(' ');
        var class1 = all_class[1];
        if ($(this).prop('checked')==true){ 
          $('.'+class1).prop('checked', this.checked);
        }
        else if($(this).prop('checked')==false){
          $('.'+class1).prop('checked', false);
        }
        
    });

  });
		
</script>