<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12">
         <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
            <div class="card-body " >
               <h4 class="text-center"><?php echo $this->lang->line('users_log'); ?></h4>
               <div class="row p-3">
                  <div class="card bg-success" style="width: 100%; color: #fff;">
                  </div>
               </div>
               <div class="card search_form">
                  <div class="card-body">
                     <?php echo form_open_multipart('', array('id' => 'user_log_search')); ?>
                     <div class="row " >
                        <div class="col-md-3">
                            <div class="form-group">
                              <label><?php echo $this->lang->line('category'); ?></label>
                              <?php echo form_dropdown("office_category_id",office_category(),'',"id='office_category_id' class='form-control office_category_id'"); ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label><?php echo $this->lang->line('office'); ?></label>
                              <?php echo form_dropdown("office_id",office(),'',"id='office_id' class='form-control office_id'"); ?>
                            </div>
                          </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label><?php echo $this->lang->line('username'); ?></label>
                              <input type="text" name="username" id="username" placeholder="<?php echo $this->lang->line('username'); ?>" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label><?php echo $this->lang->line('ip_address'); ?></label>
                              <input type="text" name="ip_address" id="ip_address" placeholder="<?php echo $this->lang->line('ip_address'); ?>" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label><?php echo $this->lang->line('url'); ?></label>
                              <input type="text" name="url" id="url" placeholder="<?php echo $this->lang->line('url'); ?>" class="form-control">
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
               <div  id="user_logList">
                  <?php
                     $this->load->view('admin/user_log/home');
                  ?>
               </div>
               <!-- table -->
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">

      $(document).on('change', '.office_category_id', function () {
         var id = $(this).val();

         $.ajax({
            url: "<?php echo base_url() ?>common/getOfficeByCat",
            type: 'POST',
            data: {id: id},
            success: function (response) {
               $('.office_id').html(response);
            }
         });
      });

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

     var username = $('#username').val();	
     var from_date = $('#from_date').val();	
     var to_date = $('#to_date').val();	
     var url = $('#url').val();
     var ip_address = $('#ip_address').val();	
     var office_id = $('#office_id').val();	
     var office_category_id = $('#office_category_id').val();	
   
    // alert(off_name);
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>admin/user_log/paginate_data/' + page_num,
        data: 'page=' + page_num + '&username=' + username+ '&from_date=' +
         from_date + '&to_date=' + to_date+ '&url=' + url+ '&ip_address=' + ip_address+
        '&office_category_id=' + office_category_id + '&office_id=' + office_id,
         beforeSend: function () {
            $('.crud_load').show()
        },
        complete: function () {
            $('.crud_load').hide();
        }, 
        success: function (html) {
			$("#user_log_search").trigger("reset");
				$('#user_logList').html(html);
			}
    });
   }
 
   
   
   
   function delete_master(id,action) {
		var a = '';
		if(action==2){
			a = confirm("Are you sure you want to inactive this record?");
		}else{
			a = confirm("Are you sure you want to active this record?");
		}
		if(a){ 
			$.ajax({
				type: "POST",
				url: '<?php echo base_url() ?>admin/user_log/delete/' + id + '/' +action,
				beforeSend: function () {
				$('.crud_load').show()
			},
			complete: function () {
				$('.crud_load').hide();
			},
			success: function (result) {
				if (result) {
					//$('#user_logList').html(result);
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
