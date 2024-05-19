 <style type="text/css">
  .file-upload{
    padding: 4px 0px 0px 4px;
   }
 </style>
<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
    <tr>
      <th style="width: 5%">Sl.</th>
      <th style="width: 10%">Registration No.</th>
			<th style="width: 20%">Service Type</th>
      <th style="width: 10%">Teletalk ID</th>
			<th style="width: 10%">Employee Name</th>
      <th style="width: 20%">Status</th>
      <th style="width: 20%">Action Message</th>
      <th style="width: 15%"><?= $this->lang->line('action')?></th>
    </tr>
  </thead>
  <tbody>
		<?php if (!empty($wings)):
      $count = $loop_start + 1;
      foreach ($wings as $data):
				$language = $this->session->userdata("lang_file");
		?>
      <tr>
				      <td><?php echo $count;?></td>
              <td><?php echo $data['registration_id'] ?></td> 
              <td><?php echo $data['service_type'] ?></td> 
              <td><?php echo $data['employee_id'] ?></td>  
              <td><?php echo $data['employee_name'] ?></td>
              <td>
                <?php if($data['status'] == '0'): ?>
                  <span class="badge badge-pill badge-secondary">Pending</span>
                <?php elseif($data['status'] == 'processing'):?>
                  <span class="badge badge-pill badge-info">Processing</span>
                <?php elseif($data['status'] == 'deny'):?>
                  <span class="badge badge-pill badge-danger">Denied</span>
                <?php elseif($data['status'] == 'completed'):?>
                  <span class="badge badge-pill badge-success">Approved</span>
                <?php endif;?>                  
              </td>
              <td>
                <?php $message = $this->db->select('*')->where('service_id',$data['id'])->order_by('id','desc')->get('service_action_message')->row();
                  if(!empty($message)):
                ?>
                    <button style="border: 0px">
                      <span class="badge badge-pill badge-warning message" attr-val="<?php echo $message->id; ?>">Previous</span>
                    </button>
                    <button style="border: 0px">
                      <span class="badge badge-pill badge-warning message" style="padding:.375rem 1.6rem" onclick="show_other_msg('<?php echo $data['id'] ?>')">All</span>
                    </button>
                <?php else:?>
                  <span></span>
                <?php endif;?>
              </td>
              <td>
                <button type="button" class="btn btn-sm btn-secondary mt-1" title="Show" onclick="show_master(<?php echo $data['id'] ?>,<?php echo $count1;?>)">
                    Show
                </button>

              <?php $chain_detail = $this->db->where('service_type_id',$data['service_type_id'])->where('employee_id',$employee_id)->get('approval_chain')->row();
                $chain = count($this->db->where('service_type_id',$data['service_type_id'])->get('approval_chain')->result());
                if($chain_detail->priority != $chain):
              ?>

                <button type="button" class="btn btn-sm btn-success mt-1" title="Forward" data-toggle="modal" data-target="#exampleModal" onclick="load_reason_page('<?php echo $data['id'] ?>','<?php echo $data['service_type_id'] ?>','<?php echo $data['step_id'] ?>','<?php echo $count1;?>','forward')">
                    Forward
                </button>
              <?php else:?>
                <button type="button" class="btn btn-sm btn-success mt-1" title="Approve" data-toggle="modal" data-target="#approval_doc" onclick="load_reason_page1('<?php echo $data['id'] ?>','<?php echo $data['step_id'] ?>')">
                    Approve
                </button>
              <?php endif;?>

              <?php $chain_detail = $this->db->where('service_type_id',$data['service_type_id'])->where('employee_id',$employee_id)->get('approval_chain')->row();
                  if($chain_detail->priority != '1'):
                ?>
                <button type="button" class="btn btn-sm btn-warning mt-1" title="Backward" data-toggle="modal" data-target="#exampleModal" onclick="load_reason_page('<?php echo $data['id'] ?>','<?php echo $data['service_type_id'] ?>','<?php echo $data['step_id'] ?>','<?php echo $count1;?>','backward')">
                    Backward
                </button>
              <?php endif;?>
              
                <!-- <button type="button" class="btn btn-sm btn-danger mt-1" title="Deny" onclick="deny_service('<?php echo $data['id'] ?>','<?php echo $data['step_id'] ?>',<?php echo $count1;?>)" data-toggle="modal" data-target="#exampleModal">
                    Query
                </button> -->
                <button type="button" class="btn btn-sm btn-danger mt-1" title="Deny" data-toggle="modal" data-target="#exampleModal" onclick="load_reason_page('<?php echo $data['id'] ?>','<?php echo $data['service_type_id'] ?>','<?php echo $data['step_id'] ?>','<?php echo $count1;?>','query')">
                    Query
                </button>
              </td>
      </tr>
		<?php 
      $count++;
      endforeach;
		  else:
    ?>
      <tr>
        <td colspan="8" style="text-align: center;"><b><?php echo $this->lang->line('no_data_found'); ?></b></td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>
<!-- table -->
<div class="row p-3">
  <div class="col-md-9">
    <!-- Button trigger modal -->

<!-- Modal start-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Write Here (if any)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php echo form_open_multipart('', array('id' => 'reason_add')); ?>
              <input type="hidden" name="service_id" id="service_id" value="">
              <input type="hidden" name="service_type_id" id="service_type_id" value="">
              <input type="hidden" name="step_id" id="step_id" value="">
              <input type="hidden" name="type" id="type" value="">

              <textarea name="message" cols="40" rows="4" id="message" class="form-control" placeholder=""></textarea>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id="reason_submit">Send</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>        
            </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>

  <div class="modal fade" id="approval_doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
        </div>
        <div class="modal-body3">
            <?php echo form_open_multipart('', array('id' => 'approval_doc_form')); ?>
              <div class="row" style="margin: 20px">
                  <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" name="service_id" id="app_service_id" value="">
                        <input type="hidden" name="step_id" id="app_step_id" value="">

                          <label>Approval Document (image/pdf within 5Mb)</label>
                          <input type="file" name="app_doc" id="app_doc" placeholder="" accept=".jpg,.jpeg,.png,.pdf" class="form-control file-upload">
                      </div>
                  </div>
              </div>
              
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="approval_doc_submit">Send</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>        
              </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>
<!-- Modal end-->

<!-- Modal start-->
  <div class="modal fade" id="action_message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body2">
            <ul class="list-group">
              <li class="list-group-item"><span style="font-weight:bold">Action Type :</span> Forward</li>
              <li class="list-group-item"><span style="font-weight:bold">Action Taken :</span> Jo</li>
              <li class="list-group-item"><span style="font-weight:bold">Designation :</span> Director</li>
              <li class="list-group-item"><span style="font-weight:bold">Description :</span> Director</li>
            </ul>
        </div>        
      </div>
    </div>
  </div>
<!-- Modal end-->

</div>
  <div class="col-md-3">
    <nav aria-label="Page navigation example" class="">
      <ul class="pagination justify-content-center">        
        <li class="page-item"></li>        
      </ul>
    </nav>
  </div>
</div>

<script type="text/javascript">
  function load_reason_page(service_id,service_type_id,step_id,count,type){
    $('#service_id').val('');
    $('#service_type_id').val('');
    $('#step_id').val('');
    $('#type').val('');

    $('#service_id').val(service_id);
    $('#service_type_id').val(service_type_id);
    $('#step_id').val(step_id);
    $('#type').val(type);
  }
  function load_reason_page1(service_id,step_id){
    $('#app_service_id').val('');
    $('#app_step_id').val('');

    $('#app_service_id').val(service_id);
    $('#app_step_id').val(step_id);
  }
</script>

<script type="text/javascript">
$(document).on("click",".message", function(){
    var id = $(this).attr('attr-val');
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>applicant/service_request/view_action_detail/' + id,
        dataType: 'json',
        success: function (result) {
            var action_type = ''
            if(result.message_detail.action_type == '1'){
              action_type = 'Forward'
            }
            if(result.message_detail.action_type == '2'){
              action_type = 'Backward'
            }
            var data = `<ul class="list-group">
              <li class="list-group-item"><span style="font-weight:bold">Action Type : </span>`+action_type+`</li>
              <li class="list-group-item"><span style="font-weight:bold">Action Taken : </span>`+result.emp_name+`</li>
              <li class="list-group-item"><span style="font-weight:bold">Designation : </span>`+result.current_desig+`</li>
              <li class="list-group-item"><span style="font-weight:bold">Description : </span>`+result.message_detail.message+`</li>
            </ul>`;
            $(".modal-body2").html(data);
            $('#action_message').modal({show : true});
        }
    });

});

</script>

<script type="text/javascript">
  function show_other_msg(id) {

      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>reports/tracking_report/show_status/' + id,
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
