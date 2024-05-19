<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body " >
                    <h4 class="text-center"><?php echo $this->lang->line('review'); ?></h4>
                    <div class="row p-3">
                      <div class="card bg-success" style="width: 100%; color: #fff;">
                       
                      </div>
                        
                    </div>
					
                <div class="card search_form">
                  <div class="card-body">
				  <?php echo form_open_multipart('', array('id' => 'review_search')); ?>
                     
                    <div class="row " >
                        <div class="col-md-3">
                            <div class="form-group">
                              <label><?php echo $this->lang->line('review'); ?></label>
                              <input type="text" name="div_name" id="div_name" placeholder="<?php echo $this->lang->line('review'); ?>" class="form-control">
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
				 <div  id="reviewList">
                    <?php
                    $this->load->view('admin/review/home');
                    ?>
                </div>
                <!-- table -->
                
                </div>
              </div>

            </div>
            
          </div>
          
        </div>
    
        	 <!-- Modal -->
          <div class="modal" id="reply_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id='modal_content'>

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
            url: '<?php echo base_url(); ?>admin/review/paginate_data/' + page_num,
            data: 'page=' + page_num + '&div_name=' + div_name,
            /* beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            }, */
            success: function (html) {
				$("#review_search").trigger("reset");
                $('#reviewList').html(html);
            }
        });
    }
	
  function active_inactive_master(id,page_num) {
    var a = confirm("Are you sure you want to change status this record");

    if(a){ 
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admin/review/activeInactive/' + id+'/'+ page_num,
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


  function feedback_master(id,page_no) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admin/review/feedback/' + id +'/' + page_no,
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            },
            success: function (result) {
                if (result) {
                    $('#modal_content').html(result);
                    $('#reply_modal').modal('show');
                    return false;
                } else {
                    return false;
                }
            }
        });
        
        return false;
  }



  function see_master(id,page_no) {

      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/review/see/' + id+'/'+page_no,
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
            $('#reviewList').html(result);
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
        url: '<?php echo base_url() ?>admin/review/delete/' + id,
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (result) {
          if (result) {
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

		
