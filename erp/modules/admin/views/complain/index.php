<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body " >
                    <h4 class="text-center"><?php echo $this->lang->line('complain'); ?></h4>
                    <div class="row p-3">
                      <div class="card bg-success" style="width: 100%; color: #fff;">
                       
                      </div>
                        
                    </div>
                   
                <div class="card search_form">
                  <div class="card-body">
				  <?php echo form_open_multipart('', array('id' => 'complain_search')); ?>
                     
                    <div class="row" >
                         <div class="col-md-3">
                            <div class="form-group">
                              <label><?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('status'); ?> </label>
                                <select onchange="searchFilter()" class="form-control" name="complain_status" id='complain_status'> 
                                    <option value="">Select One</option>
                                    <option value="pending">Pending</option>
                                    <option value="completed">Replied</option>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label><?php echo $this->lang->line('complain'); ?></label>
                              <input type="text" name="div_name" id="div_name" placeholder="<?php echo $this->lang->line('title'); ?>" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label><?php echo $this->lang->line('from_date'); ?></label>
                              <input type="text" name="from_date" id="from_date" placeholder="yyyy-mm-dd" class="form-control from_date">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label><?php echo $this->lang->line('to_date'); ?></label>
                              <input type="text" name="to_date" id="to_date" placeholder="yyyy-mm-dd" class="form-control to_date">
                            </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                              <button type="button" onclick="searchFilter()"
                                class="btn btn-sm btn-primary mt-4">
                                <?php echo $this->lang->line('search'); ?></button>
                                        </div>
                            </div>
                    </div>
                  </div>
                </div>
				</form>
				 <div  id="complainList">
                    <?php
                    $this->load->view('admin/complain/home');
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
    $(document).ready(function(){
        $('.from_date').datepicker({ 
            format: 'yyyy-mm-dd' ,
            uiLibrary: 'bootstrap4'
        });

        $('.to_date').datepicker({ 
            format: 'yyyy-mm-dd' ,
            uiLibrary: 'bootstrap4'
        });

    });
    function searchFilter(page_num) {
         page_num = page_num ? page_num : 0;
         var complain_title = $('#div_name').val();	
         var from_date = $('#from_date').val();	
         var to_date = $('#to_date').val();	
         var complain_status = $('#complain_status').val();	


        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/complain/paginate_data/' + page_num,
            data: 'page=' + page_num + '&complain_title=' + complain_title+ '&from_date=' + from_date+ '&to_date=' + to_date+ '&complain_status=' + complain_status,
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            },
            success: function (html) {
				//$("#complain_search").trigger("reset");
                $('#complainList').html(html);
            }
        });
    }
	

  


  function view_master(id,page_no) {

        // alert(id);
      $.ajax({
        type: "POST",
        //url: '<?php echo base_url() ?>admin/complain/edit/' + id,
        url: '<?php echo base_url() ?>admin/complain/see/' + id+'/'+page_no,
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
            $('#complainList').html(result);
            return false;
        } else {
            return false;
        }
    }
    });
      return false;
  }
  
  
      
 
  function replay_master(id,page_no) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admin/complain/reply/' + id +'/' + page_no,
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

  function reply_view(id) {
     
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admin/complain/replyView/' + id,
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


</script>
