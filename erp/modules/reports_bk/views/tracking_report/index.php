<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                    <h4 class="text-center">Service Tracking Report</h4>
                    <div class="row p-3">
                        <div class="card bg-success" style="width: 100%; color: #fff;">
                        </div>
                    </div>

                    <div class="card search_form">
                        <div class="card-body" style="padding-left:0px">
                            <div class='row'>
                                <div class='col-md-10'>
                                    <?php echo form_open_multipart('', array('id' => 'office_search')); ?>
                                    <div class="row ">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Service Type</label>
                                                <?php echo form_dropdown('service_type', getServiceType(), '', 'id="service_type" class="form-control"'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Service Reg. No.</label>
                                                <input type="text" class="form-control" name="reg_no" id="reg_no">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Service Status</label>
                                                <select class="form-control" name="status" id="status">
                                                  <option value="">--select--</option>
                                                  <option value="pending">Pending</option>
                                                  <option value="processing">Processing</option>
                                                  <option value="completed">Approved</option>
                                                  <option value="deny">Query</option>
                                                  <option value="1">Present Desk</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <input type="text" class="form-control" name="reg_no" id="start_date" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <input type="text" class="form-control" name="reg_no" id="end_date" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label></label>
                                                <button type="button" onclick="searchFilter()" class="btn btn-sm btn-primary mt-4">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div id="personalInfoList" style="display:none">
                    <?php
                        $this->load->view('reports/tracking_report/home');
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

    var service_type = $('#service_type').val();
    var reg_no = $('#reg_no').val();
    var status = $('#status').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    //alert(quota)
    if(status == 1){
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>reports/tracking_report/paginate_data_two/' + page_num,
        data: {page:page_num,service_type:service_type,reg_no:reg_no,status:status,start_date:start_date,end_date:end_date},
        success: function(html) {
            // $("#office_search").trigger("reset");
            $('#personalInfoList').show();
            $('#personalInfoList').html(html);
        }
      });
    }else{
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>reports/tracking_report/paginate_data/' + page_num,
        data: {page:page_num,service_type:service_type,reg_no:reg_no,status:status,start_date:start_date,end_date:end_date},
        success: function(html) {
            // $("#office_search").trigger("reset");
            $('#personalInfoList').show();
            $('#personalInfoList').html(html);
        }
      });
    }
}

</script>
<script type="text/javascript">
    function show_master(id,page_no) {

        // alert(id);
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>reports/tracking_report/show/' + id+'/'+page_no,
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
            $('#personalInfoList').html(result);
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
    $('#start_date').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap4'
    });

    $('#end_date').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap4'
    });
  })
</script>