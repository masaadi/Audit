<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body " >
                    <h4 class="text-center">Excel Import Application</h4>
                    <div class="row p-3">
                      <div class="card bg-success" style="width: 100%; color: #fff;">
                      </div>
                    </div>
                    <?php
                        $this->load->view('admin/import/edit');
                    ?>


				</form>
                <h6 class = 'mt-3'>Error Log List</h6>
				 <div  id="importList">
                    <?php
                    $this->load->view('admin/import/home');
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
            url: '<?php echo base_url(); ?>admin/excel_import/paginate_data/' + page_num,
            data: 'page=' + page_num + '&div_name=' + div_name,
            success: function (html) {
                $('#importList').html(html);
            }
        });
    }
	
  
  function delete_master(id) {
    var a = confirm("Are you sure you want to delete this record");
    if(a){ 
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/excel_import/delete/' + id,
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (result) {
        if (result) {
			window.onload = searchFilter(0);
            toastr.success("Log Delete Success.");

            return false;
        } else {
            toastr.success("Log Delete failed.");

            return false;
        }
        }
	});
	}
      return false;
  }
      

</script>
