<h5 class="font-weight-light" style="text-align: center;">Forget Your Password</h5> <br>
<p id='not_send_msg' class='alert alert-danger d-none'></p>
<form class="pt-3 mt-3">
    <div class="form-group">
	    <input type="radio"" class="rad" name="user_type" id="employee" value="2" onclick="hide_msg1()" required>
	    <label for="employee">Employee</label>
	    <input type="radio" class="rad" name="user_type" id="user" value="1" onclick="hide_msg1()" required>
	    <label for="user">Software User</label> <br>
	    <span style="font-size:10px; color:red; display:none" id="msg1">You must select one</span>
    </div>
    <div class="form-group">
	    <input type="text" class="form-control form-control-sm" name="username" id="username" onkeyup="hide_msg2()" placeholder="Enter Username" value="">
	    <span style="font-size:10px; color:red; display:none" id="msg2">You must input username</span>
    </div>
    <div class="mt-3">
        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="button" onclick="get_password()">GET PASSWORD</button>

        <a class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn" href="<?php echo base_url();?>siteadmin/login">SING IN</a>
    </div>
</form>

<script type="text/javascript">
    function hide_msg1(){
        $('#msg1').hide();
    }
    function hide_msg2(){
        $('#msg2').hide();
    }
	function get_password(){
		var user_type = $('input[name="user_type"]:checked').val();
		var username = $('#username').val();

    if(($('input[name="user_type"]').is(':checked')) && (username != '')){
      $.ajax({
          url: "<?php echo base_url() ?>siteadmin/get_password",
          type: 'POST',
          data: {user_type:user_type,username:username},
          success: function (response) {
            alert('New password is sent your registered mobile number.')
            location.reload();
          }
      });
    }else{
      if(!$('input[name="user_type"]').is(':checked')){
        $('#msg1').show();
      }
      else if(username == ''){
        $('#msg2').show();
      }
    }

		      
	}
</script>