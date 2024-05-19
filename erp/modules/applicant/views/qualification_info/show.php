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
                                <span style="font-weight: bold;">Employee Name:</span> <?php echo $qualification_info[0]->employee_name;?>
                                <br>
                                <br>
                                <span style="font-weight: bold;">Teletalk Number:</span> <?php echo $qualification_info[0]->employee_id;?>
                            </td>
                        </tr>
                        <tr>
                            <th>Qualification</th>
                            <th>Details</th>
                        </tr>
                        <?php foreach($qualification_info as $quali_info):?>
                        <tr>
                          <td>
                            <?= $quali_info->qualification;?>
                          </td>
                          <td>
                            <?= $quali_info->detail;?>
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


    