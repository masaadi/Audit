 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

 <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
              <h2 class="add_button">
                      <button onclick="javascript:location.reload(true)" type="button"
                      class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
                      data-backdrop="static"
                      data-keyboard="false"><i class="fa fa-chevron-left" style='font-size:15px;color:green' aria-hidden="true"></i> <?= $this->lang->line('back')?></button>
                    </h2> 
                <div class="card-body p-5">
                  

                      <table class="table table-bordered" id="children_table">
                        <tr>
                            <td colspan="6">
                                <span style="font-weight: bold;">Employee Name:</span> <?php echo $education_info[0]->employee_name;?>
                                <br>
                                <br>
                                <span style="font-weight: bold;">Teletalk Number:</span> <?php echo $education_info[0]->employee_id;?>
                            </td>
                        </tr>
                        <tr>
                            <th>Examination Name</th>
                            <th>Subject</th>
                            <th>Institute Name</th>
                            <th>Passing Year</th>
                            <th>Result</th>
                            <th>Board</th>
                        </tr>
                        <?php foreach($education_info as $edu_info):?>
                        <tr>
                          <td>
                            <?= $edu_info->exam_name;?>
                          </td>
                          <td>
                            <?= $edu_info->subject;?>
                          </td>
                          <td>
                            <?= $edu_info->institute;?>
                          </td>
                          <td>
                            <?= $edu_info->passing_year;?>
                          </td>
                          <td>
                            <?= $edu_info->result;?>
                          </td>
                          <td>
                            <?= $edu_info->board;?>
                          </td>
                        </tr>
                        <?php endforeach;?>
                      </table>

                    </div>
                  

                </div>
              </div>
            </div>
          </div>          
        </div>

<script type="text/javascript">
    $(document).ready(function(){
      var emp_id = $('#employee_id').val();
      $.ajax({
        type:"Post",
        url:"<?php echo base_url() ?>hr/job_info/get_emp/"+emp_id,
        dataType: "JSON",
        success: function(result){
          $('#employee_name').val(result.employee_name);
          $('#login_id').val(emp_id);
        }
      });
    });
</script>


    