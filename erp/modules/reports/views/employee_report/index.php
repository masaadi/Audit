<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                    <h4 class="text-center">Employee Report</h4>
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
                                                <label>Teletalk Number</label>
                                                <input type="text" class="form-control" name="employee_id" id="employee_id">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Employee Name</label>
                                                <input type="text" class="form-control" name="employee_name" id="employee_name">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <?php echo form_dropdown('designation', getOptionDesignation(), '', 'id="designation" class="form-control"'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Office</label>
                                                <?php echo form_dropdown('office', office(), '', 'id="office" class="form-control"'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender" id="gender">
                                                  <option value="">---select---</option>
                                                  <option value="male">Male</option>
                                                  <option value="female">Female</option>
                                                  <option value="others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Date Of Birth</label>
                                                <input type="text" class="form-control" name="dob" id="dob" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>PRL Date</label>
                                                <input type="text" class="form-control" name="prl_date" id="prl_date" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Quota</label>
                                                <select class="form-control" name="quota" id="quota">
                                                  <option value="">---select---</option>
                                                  <option value="1">Yes</option>
                                                  <option value="2">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Marital Status</label>
                                                <select class="form-control" name="marital_status" id="marital_status">
                                                  <option value="">---select---</option>
                                                  <option value="single">Single</option>
                                                  <option value="married">Married</option>
                                                  <option value="unmarried">Unmarried</option>
                                                  <option value="devorced">Devorced</option>
                                                  <option value="widow">Widow</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Blood Group</label>
                                                <select class="form-control" name="blood_group" id="blood_group">
                                                  <option value="">---select---</option>
                                                  <option value="A+">A+</option>
                                                  <option value="A-">A-</option>
                                                  <option value="B+">B+</option>
                                                  <option value="B-">B-</option>
                                                  <option value="O+">O+</option>
                                                  <option value="O-">O-</option>
                                                  <option value="AB+">AB+</option>
                                                  <option value="AB-">AB-</option>                          
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status" id="status">
                                                  <option value="">---select---</option>
                                                  <option value="1">Active</option>
                                                  <option value="2">Inactive</option>
                                                </select>
                                            </div>
                                        </div> -->

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
                        $this->load->view('reports/employee_report/home');
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

    var employee_id = $('#employee_id').val();
    var employee_name = $('#employee_name').val();
    var designation = $('#designation').val();
    var office = $('#office').val();
    var gender = $('#gender').val();
    var dob = $('#dob').val();
    var prl_date = $('#prl_date').val();
    var quota = $('#quota').val();
    var marital_status = $('#marital_status').val();
    var blood_group = $('#blood_group').val();
    var status = $('#status').val();
    //alert(quota)

    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>reports/employee_report/paginate_data/' + page_num,
        data: {employee_id:employee_id,employee_name:employee_name,designation:designation,office:office,gender:gender,dob:dob,prl_date:prl_date,quota:quota,marital_status:marital_status,blood_group:blood_group,status:status},
        success: function(html) {
            $("#office_search").trigger("reset");
            $('#personalInfoList').show();
            $('#personalInfoList').html(html);
        }
    });
}

</script>
<script type="text/javascript">
    function show_master(employee_id,page_no) {

      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>reports/employee_report/show/' + employee_id+'/'+page_no,
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
    $('#dob').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap'
    });

    $('#prl_date').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap'
    });

    $('#prl_hdate').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap'
    });
  })
</script>