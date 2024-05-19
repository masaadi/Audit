<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
        <div class="card-body">
          <h4 class="text-center"><?= $this->lang->line('user_registration')?></h4>
          <div class="row p-3">
            <div class="card bg-success" style="width: 100%; color: #fff;">
              <div class="card-body text-center">
                <h3 style="text-shadow: 1px 1px 3px rgb(122, 119, 119); margin-bottom: 0px;"><?= $this->lang->line('total_registered_user')?> : <?= $total_rows?></h3>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h4 class="pb-1"><?= $this->lang->line('search_for_user')?></h4>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label><?= $this->lang->line('user_name')?></label>
                    <input type="text" name="user_name" id="user_name" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label><?= $this->lang->line('email')?></label>
                    <input type="email" name="user_email" id="user_email" class="form-control">
                  </div> 
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label><?= $this->lang->line('phone_no')?></label>
                    <input type="text" class="form-control" name="user_phone" id="user_phone">
                  </div>
                </div>

                <div class="col-md-3 ">
                  <div class="form-group">
                    <label><?php echo $this->lang->line('from_date'); ?></label>
                    <input type="text" name="start_date" id="start_date" placeholder="yyyy-mm-dd" class="form-control from_date">
                  </div>
                </div>

                <div class="col-md-3 ">
                  <div class="form-group">
                    <label><?php echo $this->lang->line('to_date'); ?></label>
                    <input type="text" name="end_date" id="end_date" placeholder="yyyy-mm-dd" class="form-control to_date">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label></label>
                    <input type="button" onclick="searchFilter()" value="<?= $this->lang->line('search')?>" class="btn btn-sm btn-primary mt-4">
                  </div>
                </div>

                <div class="col-md-6 text-right mt-4">
                    <form action="<?php echo base_url() . 'admin/application/retisterUserPdf'?>" method="post">
                      <input type="hidden" name="pdf_conditions" value='' id="get_condition">
                      <input type="submit" class="btn btn-success btn-sm mt-4" onclick="generate_report_pdf()" value="<?= $this->lang->line('download') ?>">
                    </form> 
                </div>


              </div>
            </div>
          </div>
          <div id="postList">
            <?php $this->load->view('application/users/all_list_data');?>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- pass chabge modal -->

<div class="modal" id="passModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $this->lang->line('change_password')?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div id="pass_data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('close') ?></button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $this->lang->line('preview')?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div id="user_data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('close') ?></button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $this->lang->line('review')?></h5>
        <button type="button" class="close btn btn-warning" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        <h4><?= $this->lang->line('review')?></h4>
        <span class="error" id="data_error"></span>
        <br>
        <input type="hidden" name="contact_id" id="contact_id">
        <div class="row">
          <div class="col-sm-4">
            <input id="rev_type_1" name="rev_type" value="1" type="radio" checked="">
            <label for="rev_type_1"><?= $this->lang->line('approved')?></label>
          </div>
          <div class="col-sm-4">
            <input id="rev_type_2" name="rev_type" value="2" type="radio">
            <label for="rev_type_2"><?= $this->lang->line('revised')?></label>
          </div>
        </div>
        <div class="row">   
          <div class="col-sm-12 form-group" style="text-align:left;">
            <label > <?= $this->lang->line('note')?><sup class="error">*</sup></label>
            <textarea name="rev_note" id="rev_note" rows="3" class="form-control"></textarea>
            <span class="error" id="rev_note_error"></span>
          </div> 

        </div>
        <input type="button" onclick="review()" value="<?= $this->lang->line('review')?>" class="btn btn-lg btn-primary mt-2">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

function generate_report_pdf(){
     var conditions = $("#conditions").val();
     $("#get_condition").val(conditions); //return false;
     preventDefault();
  }



$(function () {

$('.from_date').datepicker({ 
  format: 'yyyy-mm-dd' ,
  uiLibrary: 'bootstrap4'
});

$('.to_date').datepicker({ 
  format: 'yyyy-mm-dd' ,
  uiLibrary: 'bootstrap4'
});
})

function change_password_submit(id) {
    var new_pass=$('#password').val();
    $.ajax({
        url: "<?php echo base_url() ?>admin/application/change_password_submit/"+id+'/'+new_pass,
        type: 'GET',
        beforeSend: function () {
            $('.preloader').show();
        },
        complete: function () {
            $('.preloader').hide();
        },
        success: function (response) {
            result= $.parseJSON(response);
            if (result) {
                $('#passModal').modal('hide')
                toastr.success(result.message);
                return false;
            } else {
                return false;
            }
        }
    });
}




  function searchFilter(page_num) {
    page_num = page_num ? page_num : 0;
    var user_name = $('#user_name').val();
    var user_phone = $('#user_phone').val();
    var user_email = $('#user_email').val();
    var start_date = $('#start_date').val(); 
    var end_date = $('#end_date').val();

    //if ($err_count == 1)  {
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>admin/users/page_data/' + page_num,
        data: 'page=' + page_num + '&user_name=' + user_name + '&user_phone=' + user_phone + '&user_email=' + user_email+ '&start_date=' + start_date+ '&end_date=' + end_date,
        beforeSend: function () {
          $('.preloader').show();
        },
        success: function (html) {
          console.log(html);

          $('#postList').html(html);
          $('.preloader').fadeOut("slow");
        }
      });
  //}
}
function show_user(id) {
  $.ajax({
    url: "<?php echo base_url() ?>admin/application/user_preview/"+id,
    type: 'GET',
    beforeSend: function () {
      $('.preloader').show();
    },
    success: function (response) {
      $('#user_data').html(response);
      $('.preloader').fadeOut("slow");
    }
  });
}
function change_password(id) {
  $.ajax({
    url: "<?php echo base_url() ?>admin/application/change_pass/"+id,
    type: 'GET',
    beforeSend: function () {
      $('.preloader').show();
    },
    success: function (response) {
      $('#passModal').modal('show');

      $('#pass_data').html(response);
      $('.preloader').fadeOut("slow");
    }
  });
}

function review(){
  $('#rev_note_error').html('');
  $('#data_error').html('');
  var contact_id=$('#contact_id').val();
  var rev_note=$('#rev_note').val();
  if(contact_id!=''){
    if (rev_note!='') {
      var rev_type = $('[name^="rev_type"]:checked').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>admin/application/review_new_application',
        data: 'contact_id=' + contact_id + '&rev_note=' + rev_note + '&rev_type=' + rev_type,
        beforeSend: function () {
          $('.preloader').show();
        },
        success: function (response) {
          console.log(response);
          if(response==2){
            toastr.success('Review Successfully Added');
            $('#openModal').modal('toggle');
            window.onload = searchFilter(0);
          }
          $('.preloader').fadeOut("slow");
        }
      });
    }else{
      $('#rev_note_error').html('Note Field is required');
    }
  }else{
    $('#data_error').html('Application Not Found');
  }
}



</script>